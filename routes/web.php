<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix("user")->group(function (){
    Route::get('/',[Controllers\UserController::class,'index'])->name('user.index');
    Route::get('/Dormitories/{dormitory}',[Controllers\DormitoryController::class,'show'])->name('user.Dormitory.show');
    Route::get('/Requests/{user}',[Controllers\UserController::class,'requests'])->name('user.requests');
    Route::post('Requests',[Controllers\RequestController::class,'store'])->name('user.request.store');
});
Route::middleware(['auth','IsAdmin'])->prefix("admin")->group(function (){
    Route::get('/',[Controllers\AdminController::class,'index'])->name('admin.index');
    Route::get('/Users',[Controllers\UserController::class,'showAll'])->name('showUsers');
    Route::get('/Requests/{user}',[Controllers\UserController::class,'requests'])->name('admin.user.requests');
    Route::get('/Dormitories',[Controllers\DormitoryController::class,'index'])->name('admin.Dormitories');
    Route::get('/Dormitories/create',[Controllers\DormitoryController::class,'create'])->name('Dormitories.create');
    Route::post('/Dormitories/create',[Controllers\DormitoryController::class,'store'])->name('Dormitories.store');
    Route::get('/Dormitories/edit/{dormitory}',[Controllers\DormitoryController::class,'edit'])->name('Dormitories.edit');
    Route::put('/Dormitories/edit/{dormitory}/update',[Controllers\DormitoryController::class,'update'])->name('Dormitories.update');
    Route::delete('/Dormitories/destroy/{dormitory}',[Controllers\DormitoryController::class,'destroy'])->name('Dormitories.destroy');
    Route::get('/Dormitories/{dormitory}/room/create',[Controllers\RoomController::class,'create'])->name('Dormitories.room.create');
    Route::post('/Dormitories/{dormitory}/room/create',[Controllers\RoomController::class,'store'])->name('Dormitories.room.store');
    Route::get('/room/edit/{room}',[Controllers\RoomController::class,'edit'])->name('Dormitories.room.edit');
    Route::put('/room/edit/{room}/update',[Controllers\RoomController::class,'update'])->name('Dormitories.room.update');
    Route::delete('/room/destroy/{room}',[Controllers\RoomController::class,'destroy'])->name('Dormitories.room.destroy');
    Route::get('/Dormitories/{dormitory}',[Controllers\RoomController::class,'show'])->name('admin.Dormitory.show');
    Route::put('/Requests/{req}',[Controllers\RequestController::class,'edit'])->name('change');
    Route::delete('/Requests/{req}',[Controllers\RequestController::class,'destroy'])->name('req.delete');
    Route::get('/Requests',[Controllers\RequestController::class,'index'])->name('All_request');
    Route::delete('/roomItem/{item}/delete',[Controllers\RoomItemController::class,'destroy'])->name('item.delete');
    Route::get('/rooms/{room}',[Controllers\RoomController::class,'show'])->name('roomshow');

});
