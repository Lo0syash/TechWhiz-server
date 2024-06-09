<?php

namespace App\Http\Controllers;

use Tinify\Tinify;
use Tinify\Source;
use Tinify\AccountException;
use Tinify\ClientException;
use Tinify\ServerException;
use Tinify\ConnectionException;
use App\Http\Requests\Group\CreateGroup;
use App\Http\Requests\Group\UpdateGroup;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Models\ApplicationForMemdership;
use App\Models\Group;
use App\Models\Tasks;
use App\Models\TasksUser;
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

    public function tasks(Group $group)
    {
        $authorCheckGroup = UsersGroups::where('group_id', $group->id)->where('role', 1)->get();
        $author = User::whereIn('id', $authorCheckGroup->pluck('user_id'))->get()->keyBy('id');

        $groupTasks = Tasks::where('group_id', $group->id)->get();


        return view('pages.Group.tasks', compact('group', 'author', 'groupTasks'));
    }

    public function task(Group $group, Tasks $task)
    {
        $task = Tasks::where('group_id', $group->id)->where('id', $task->id)->firstOrFail();
        $someGroup = Group::where('id', $group->id)->firstOrFail();

        return view('pages.Group.task', compact('someGroup', 'task'));
    }

    public function createTask(Group $group)
    {
        return view('pages.Group.createTask', compact('group'));
    }

    public function createSomeTask(CreateTaskRequest $createTaskRequest, Group $group) {
        $data = $createTaskRequest->validated();
        $data['status'] = '1';
        $data['group_id'] = $group->id;
        Tasks::query()->create($data);
        return redirect()->route('tasks', $group->id);
    }

    public function adminGroupTasks(Group $group)
    {
        $tasksUsers = TasksUser::where('groups_id', $group->id)->where('status', 'pending')->get();

        $userIds = $tasksUsers->pluck('user_id')->unique();
        $users = User::whereIn('id', $userIds)->get();

        $userBalances = Transactions::where('groups_id', $group->id)
            ->whereIn('user_id', $userIds)
            ->select('user_id', \DB::raw('SUM(sum) as balance'))
            ->groupBy('user_id')
            ->get()
            ->pluck('balance', 'user_id');

        return view('pages.Group.adminGroupTasks', compact('group', 'users', 'userBalances', 'tasksUsers'));
    }

    public function adminGroupTasksMore(Tasks $task, Group $group)
    {
        $taskData = TasksUser::where('tasks_id', $task->id)->firstOrFail();

        $userId = $taskData->user_id;
        $userCheck = User::where('id', $userId)->firstOrFail();

        $imagePaths = json_decode($taskData->image_paths);

        return view('pages.Group.adminGroupTasksMore', compact('taskData', 'group', 'userCheck', 'imagePaths'));
    }

    public function acceptSubmitTask(TasksUser $task, User $user)
    {
        $taskData = TasksUser::where('id', $task->id)->where('user_id', $user->id)->firstOrFail();
        $taskData->status = 'true';
        $taskData->save();

        $checkTask = Tasks::where('id', $taskData->tasks_id)->firstOrFail();

        $transactions = new Transactions();
        $transactions->user_id = $user->id;
        $transactions->groups_id = $taskData->groups_id;
        $transactions->sum = $checkTask->price;
        $transactions->description = $checkTask->name;
        $transactions->tasks = $taskData->id;

        $transactions->save();

        return redirect()->route('adminGroupTasks', $taskData->groups_id);
    }

    public function closeSubmitTask(TasksUser $task, User $user)
    {
        $taskData = TasksUser::where('id', $task->id)->where('user_id', $user->id)->firstOrFail();
        $taskData->status = 'false';
        $taskData->save();
        return redirect()->route('adminGroupTasks', $taskData->groups_id);
    }

    public function submitTaskAnswer(Request $request, Group $group, Tasks $task)
    {
        $validatedData = $request->validate([
            'images.*' => 'image|max:20480',
            'images' => 'array|max:4',
            'description' => 'required|string|max:255',
        ]);
    
        $taskUser = new TasksUser();
        $taskUser->user_id = auth()->user()->id;
        $taskUser->groups_id = $group->id;
        $taskUser->tasks_id = $task->id;
        $taskUser->status = 'pending';
        $taskUser->description = $request->description;
    
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imagePaths[] = '/images/' . $imageName;
        
                try {
                    Tinify::setKey(env("TINIFY_API_KEY")); // Правильный вызов функции установки ключа
                    $source = Source::fromFile(public_path('images') . '/' . $imageName); // Исправлен путь к файлу
                    $source->toFile(public_path('images') . '/' . $imageName); // Исправлен путь к файлу
                } catch (AccountException $e) {
                    return redirect()->route('ROUTE_NAME_HERE')->with('error', $e->getMessage()); // Исправлено на route()
                } catch (ClientException $e) {
                    return redirect()->route('ROUTE_NAME_HERE')->with('error', $e->getMessage()); // Исправлено на route()
                } catch (ServerException $e) {
                    return redirect()->route('ROUTE_NAME_HERE')->with('error', $e->getMessage()); // Исправлено на route()
                } catch (ConnectionException $e) {
                    return redirect()->route('ROUTE_NAME_HERE')->with('error', $e->getMessage()); // Исправлено на route()
                } catch (Exception $e) {
                    return redirect()->route('ROUTE_NAME_HERE')->with('error', $e->getMessage()); // Исправлено на route()
                }
            }
            $taskUser->image_paths = json_encode($imagePaths);
        }
        
    
        $taskUser->save();
    
        return redirect()->route('tasks', ['group' => $group->id]);
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

        $sortedUsers = $memberGroups->sortByDesc(function ($memberGroup) use ($usersBalances) {
            return $usersBalances->get($memberGroup->user_id, 0);
        });

        $activeUserId = auth()->user()->id;
        $activeUserPosition = $sortedUsers->pluck('user_id')->search($activeUserId) + 1;

        return view('pages.Group.oneGroup', compact('transactions', 'group', 'groupMemberCounts', 'memberGroups', 'users', 'author', 'userApplication', 'balance', 'usersBalances', 'userBalance', 'sortedUsers', 'activeUserPosition'));
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
