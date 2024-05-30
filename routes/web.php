<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\GroupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(IndexController::class)->group(function (){
   Route::get('/', 'index')->name('index');
   Route::get('/profile/', 'profile')->name('profile')->middleware(\App\Http\Middleware\Authenticate::class);
   Route::get('/profile/setting/', 'setting')->name('setting')->middleware(\App\Http\Middleware\Authenticate::class);
   Route::post('/profile/setting/{user}', 'settingUpdate')->name('settingUpdate');
   Route::post('/profile/setting/{user}/password', 'settingPasswordUpdate')->name('settingPasswordUpdate');
   Route::get('/admin/', 'admin')->name('admin')->middleware(\App\Http\Middleware\Authenticate::class);
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login/', 'login')->name('login');
    Route::post('/login/', 'loginPost')->name('loginPost');
    Route::get('/reg/', 'reg')->name('reg');
    Route::post('/reg/', 'regPost')->name('regPost');
    Route::post('/logout/', 'logout')->name('logout');
});

Route::controller(GroupController::class)->group(function () {
    Route::get('/groups/create/', 'create')->name('createGroup')->middleware(\App\Http\Middleware\Authenticate::class);
    Route::post('/groups/create/', 'createGroupPostRequest')->name('createGroupPostRequest')->middleware(\App\Http\Middleware\Authenticate::class);
    Route::get('/groups/', 'groups')->name('groups')->middleware(\App\Http\Middleware\Authenticate::class);
    Route::get('/group/{group}', 'group')->name('group')->middleware(\App\Http\Middleware\Authenticate::class);
    Route::get('/group/{group}/claim', 'claimGroup')->name('claimGroup')->middleware(\App\Http\Middleware\Authenticate::class);
    Route::post('/group/code','inviteCodeGroup')->name('inviteCodeGroup')->middleware(\App\Http\Middleware\Authenticate::class);
    Route::post('/group/accept/{user}/{group}','acceptApplication')->name('acceptApplication')->middleware(\App\Http\Middleware\Authenticate::class);
    Route::post('/group/close/{user}/{group}','closeApplication')->name('closeApplication')->middleware(\App\Http\Middleware\Authenticate::class);
    Route::post('/group/update/{group}','updateGroup')->name('updateGroup')->middleware(\App\Http\Middleware\Authenticate::class);
});

Route::controller(\App\Http\Controllers\TransactionController::class)->group(function () {
    Route::post('/transaction','transactionSend')->name('transactionSend')->middleware(\App\Http\Middleware\Authenticate::class);
});
