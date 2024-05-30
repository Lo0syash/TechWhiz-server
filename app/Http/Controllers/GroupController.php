<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\CreateGroup;
use App\Http\Requests\Group\UpdateGroup;
use App\Models\ApplicationForMemdership;
use App\Models\Group;
use App\Models\Transactions;
use App\Models\User;
use App\Models\UsersGroups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{

    public function create()
    {
        return view('pages.Group.createGroup');
    }

    public function groups(Request $request, UsersGroups $usersGroups, ApplicationForMemdership $applicationForMemdership)
    {
        $query = Group::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%');
        } else if ($request->has('by-name')) {
            $query->orderBy('name', 'asc')->get();
        }

        $groups = $query->get();

        return view('pages.Group.groups', compact('groups', 'usersGroups', 'applicationForMemdership'));
    }

    public function group(Transactions $transactions, Group $group, User $user)
    {
        $groupMemberCounts = UsersGroups::select('group_id', DB::raw('count(*) as member_count'))
            ->groupBy('group_id')
            ->pluck('member_count', 'group_id');

        $memberGroups = UsersGroups::where('group_id', $group->id)->get();
        $users = User::whereIn('id', $memberGroups->pluck('user_id'))->get()->keyBy('id');

        $authorCheckGroup = UsersGroups::where('group_id', $group->id)->where('role', 1)->get();
        $author = User::whereIn('id', $authorCheckGroup->pluck('user_id'))->get()->keyBy('id');

        $userApplication = ApplicationForMemdership::where('groups_id', $group->id)->get();
        $userApplication = User::whereIn('id', $userApplication->pluck('user_id'))->get()->keyBy('id');

        $groupTransactions = Transactions::where('groups_id', $group->id)->get();
        $balance = $groupTransactions->sum('sum');

        $userBalance = Transactions::where('groups_id', $group->id)
            ->where('user_id', auth()->user()->id)
            ->sum('sum');

        $usersBalances = Transactions::whereIn('groups_id', [$group->id])
            ->select('user_id', DB::raw('SUM(sum) as balance'))
            ->groupBy('user_id')
            ->pluck('balance', 'user_id');

            return view('pages.Group.oneGroup', compact('transactions', 'group', 'groupMemberCounts', 'memberGroups', 'users', 'author', 'userApplication', 'balance', 'usersBalances', 'userBalance'));
    }

    public function createGroupPostRequest(CreateGroup $request)
    {
        $date = $request->validated();
        if ($request->hasFile('path')) {
            $date['path'] = $request->file('path')->store('public/product');
        } else {
            $date['path'] = 'product/baseGroupImage.png';
        }

        $group = Group::query()->create($date);

        UsersGroups::query()->create([
            'user_id' => $request->user()->id,
            'group_id' => $group->id,
            'role' => 1,
        ]);

        return redirect()->route('groups');
    }

    public function claimGroup(Group $group, Request $request)
    {
        $existingMembership = ApplicationForMemdership::where('user_id', $request->user()->id)
            ->where('groups_id', $group->id)
            ->exists();

        if (!$existingMembership) {
            ApplicationForMemdership::create([
                'user_id' => $request->user()->id,
                'groups_id' => $group->id
            ]);
        }

        return redirect()->route('groups');
    }

    public function inviteCodeGroup(Request $request)
    {
        if (!$request->has('code')) {
            return redirect()->route('groups');
        }

        $code = $request->input('code');
        $group = Group::where('inviteCode', $code)->first();

        if ($group) {
            $idGroup = $group->id;
            $checkUserToGroupDate = UsersGroups::where('group_id', $idGroup)
                ->where('user_id', auth()->id())
                ->first();
            if ($checkUserToGroupDate) {
                return redirect()->route('groups');
            } else {
                UsersGroups::create([
                    'user_id' => $request->user()->id,
                    'group_id' => $idGroup,
                    'role' => 0,
                ]);
                return redirect()->route('group', $idGroup);
            }
        } else {
            return redirect()->route('groups');
        }
    }

    public function acceptApplication($user, $group)
    {
        ApplicationForMemdership::where('user_id', $user)->delete();
        UsersGroups::create([
            'user_id' => $user,
            'group_id' => $group,
            'role' => 0,
        ]);
        return redirect()->route('group', $group);

    }

    public function closeApplication($user, $group)
    {
        ApplicationForMemdership::where('user_id', $user)->delete();
        return redirect()->route('group', $group);
    }

    public function updateGroup(UpdateGroup $updateGroup, $group)
    {
        $data = $updateGroup->validated();
        if ($updateGroup->hasFile('path')) {
            $data['path'] = $updateGroup->file('path')->store('public/product');
        } else {
            $data['path'] = 'product/baseGroupImage.png';
        }

        if (Group::where('id', $group)->update($data)) {
            return redirect()->route('group', $group);
        } else {
            return redirect()->route('group', $group);
        }
    }

    public function deleteUserGroup($group, $user) {
        UsersGroups::where('user_id', $user)
            ->where('group_id', $group)
            ->delete();
        return redirect()->route('group', $group);
    }
}
