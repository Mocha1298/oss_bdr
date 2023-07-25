<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('form');
});
Route::get('/ex1', function () {
    return view('example1');
});
Route::get('/mail', function () {
    return view('thanks');
});
Route::post('/post-form','App\Http\Controllers\BdrOssController@post');
Route::get('/kirim','App\Http\Controllers\BdrOssController@kirim');

Route::middleware('auth')->group(function (){
    Route::get('/dashboard',function () {
        return view('dashboard');
    });
    Route::get('/signout', 'App\Http\Controllers\CustomAuthController@signout')->name('signout');
    Route::get('/approval','App\Http\Controllers\ApprovalController@index');
    Route::post('/approve/{id}','App\Http\Controllers\ApprovalController@approved');
    Route::get('/dismiss/{id}','App\Http\Controllers\ApprovalController@dismissed');
});

Route::get('/login', 'App\Http\Controllers\CustomAuthController@index')->name('login');
Route::post('/custom-login', 'App\Http\Controllers\CustomAuthController@customLogin');

Route::get('/user',[ProfileController::class, 'show'])->name('user');
Route::get('/newuser',[ProfileController::class, 'create'])->name('create');
Route::post('/newuser',[ProfileController::class, 'store'])->name('store');
Route::get('/profile/{id}', [ProfileController::class, 'edit']);
Route::post('/profile/{id}', [ProfileController::class, 'update']);
Route::get('/profiled/{id}', [ProfileController::class, 'destroy']);
Route::get('/reset/{id}',[ProfileController::class, 'reset'])->name('reset');