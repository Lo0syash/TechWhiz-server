<?php

namespace App\Http\Controllers;
use App\Http\Requests\Profile\SettingRequest;
use App\Http\Requests\Profile\SettingPasswordRequest;
use App\Models\Group;
use App\Models\UsersGroups;
use App\Models\User;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function profile()
    {
        $userApplication = UsersGroups::where('user_id', auth()->user()->id)->get();
        $groups = Group::whereIn('id', $userApplication->pluck('group_id'))->get()->keyBy('id');

        return view('pages.lk.profile', compact('groups'));
    }

    public function admin()
    {
        if (auth()->user()->role_id == 1) {
            return view('pages.admin');
        }
        return redirect()->route('index');
    }

    public function setting()
    {
        return view('pages.lk.setting');
    }

    public function settingUpdate(SettingRequest $request, User $user)
    {
        $data = $request->validated();

        if ($data['surname'] !== $user->surname || $data['name'] !== $user->name || $data['login'] !== $user->login || $data['email'] !== $user->email) {
            $user->update($data);
            return redirect()->back()->with('success', 'Данные успешно обновлены');
        } else {
            return redirect()->back();
        }
    }

    public function settingPasswordUpdate(SettingPasswordRequest $request, User $user) {
        $data = $request->validated();
        if (password_verify($data['old_password'], $user->password)) {
            $user->update($data);
            return redirect()->back()->with(['success' => 'Пароль был изменен', 'success-break' => 'logout']);
        } else {
            return redirect()->back()->with('error', 'Некорректно введенные данные');
        }
    }
}
