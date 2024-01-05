<?php

use App\Http\Controllers\ChatBoxController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});


Route::group(['prefix'=>'admin'],function(){

    Route::group(['middleware'=>'user.guest'],function(){
        Route::get('/login',[UserController::class,'login'])->name('login');
        Route::post('/login-process',[UserController::class,'attempt'])->name('process');
    });


    Route::group(['middleware'=>'user.auth'],function(){
        Route::get('/dashboard',[UserController::class,'index'])->name('dashboard');
        Route::get('/logout',[UserController::class,'logout'])->name('logout');
        Route::get('/profile/{userId}',[UserController::class,'profile'])->name('profile');
        Route::put('/profile/{userId}',[UserController::class,'profileUpdate'])->name('update.profile');

        //manager
        Route::resource('managers',ManagerController::class);
       // project
        Route::resource('projects',ProjectController::class);

        //chatbox
        Route::get('/chat/{projectId}',[ChatBoxController::class,'index'])->name('chatbox.index');
        Route::post('send-message/{projectId}',[ChatBoxController::class,'sendMessage'])->name('message');
    });

});
