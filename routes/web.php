<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MotelsController;
use App\Http\Controllers\DistrictsController;

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


//---------------Quan ly user ---------------//

Route::controller(UserController::class)->group(function(){
      Route::get('/manager/user', 'index')->name('manager/user');
    // add user 
      Route::get('/add/user','create')->name('add/user');
    // xu ly add user
      Route::post('/insert/user','store')->name('insert/user');
      //xu edit user
      Route::get('/edit/user/{id}', 'edit')->name('edit/user');
      // xu ly cap nhat user se edit
      Route::post('/update/user/{id}', 'update')->name('update/user');
      // xu ly xoa user
      Route::get('/delete/user/{id}', 'destroy')->name('delete/user');
});

Route::controller(MotelsController::class)->group(function(){
      Route::get('/dangky', 'register');
      Route::get('/motels/list/{id}', 'motelviews');
      Route::post('/motels/list/search', 'searchNameMotels');
});


Route::controller(DistrictsController::class)->group(function(){
     Route::get('/','index');
     Route::get('/flot', 'flot');
    // Route::get('/','index');
    Route::get('/admin', 'show')->name('admin');
    // them motels
    Route::get('/add','create')->name('add');
    Route::post('/insert','story')->name('insert');
    // edit motels
    Route::get('/edit/{id}','edit')->name('edit');
    Route::post('/update/{id}','update')->name('update');
    //delete motels
    Route::get('/delete/{id}', 'destroy')->name('delete');
});

//login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

//register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('regiseteruser');

//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

