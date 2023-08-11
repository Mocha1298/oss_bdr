<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LevelApprovalController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ApprovalController;

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
    return view('home');
});
// Route::get('/', function () {
//     return view('form');
// });
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
    Route::get('/approval',[ApprovalController::class,'index']);
    Route::post('/approve/{id}',[ApprovalController::class,'approved']);
    Route::get('/approve/{id_oss}/{id_user}',[ApprovalController::class,'approved_2nd']);
    Route::get('/dismiss/{id}',[ApprovalController::class,'dismissed']);
    Route::get('/showdoc/{id}',[ApprovalController::class,'showdoc']);
    Route::get('/showpdf/{id}',[ApprovalController::class,'showpdf']);

    Route::get('/level',[LevelApprovalController::class,'index']);
    Route::post('/get_user',[LevelApprovalController::class,'get_user']);
    Route::post('/level',[LevelApprovalController::class,'store']);
    Route::get('/levele/{id}',[LevelApprovalController::class,'edit']);
    Route::post('/levele/{id}',[LevelApprovalController::class,'update']);
    Route::get('/leveld/{id}',[LevelApprovalController::class,'delete']);

    Route::get('/site',[SiteController::class,'index']);
    Route::post('/site',[SiteController::class,'store']);
    Route::get('/sitee/{id}',[SiteController::class,'edit']);
    Route::post('/sitee/{id}',[SiteController::class,'update']);
    Route::get('/sited/{id}',[SiteController::class,'delete']);

    Route::get('/form',[FormController::class,'index']);
    Route::post('/form',[FormController::class,'store']);
    Route::get('/forme/{id}',[FormController::class,'edit']);
    Route::post('/forme/{id}',[FormController::class,'update']);
    Route::get('/formd/{id}',[FormController::class,'delete']);

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