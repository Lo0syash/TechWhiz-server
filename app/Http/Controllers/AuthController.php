<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        if (auth()->user()) {
            return redirect()->route('profile');
        }
        return view('pages.Auth.login');
    }

    public function loginPost(LoginRequest $request)
    {
        $date = $request->validated();
        if (!auth()->attempt($date)) {
            return back()->withInput()->withErrors(['Invalid_credential' => 'Неверный логин или пароль']);
        }
        return redirect()->route('profile');
    }

    public function reg()
    {
        if (auth()->user()) {
            return redirect()->route('profile');
        }
        return view('pages.Auth.reg');
    }

    public function regPost(RegRequest $request)
    {
        $date = $request->validated();
        $user = User::query()->create($date);
        auth()->login($user);
        return redirect()->route('profile');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('index');
    }
}
