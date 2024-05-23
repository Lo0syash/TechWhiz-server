<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function profile()
    {
        return view('pages.lk.profile');
    }

    public function admin()
    {
        if (auth()->user()->role_id == 1) {
            return view('pages.admin');
        }
        return redirect()->route('index');
    }
}
