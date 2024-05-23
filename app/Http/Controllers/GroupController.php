<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\CreateGroup;
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

        return view('pages.Group.oneGroup', compact('transactions', 'group', 'groupMemberCounts', 'memberGroups', 'users', 'author'));
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

}
