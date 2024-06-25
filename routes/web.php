<?php

use App\Http\Controllers\Admin\JenisController;
use App\Http\Controllers\Admin\NopolController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', UserController::class);
Route::resource('merks', Admin\MerkController::class);
Route::resource('nopols', Admin\NopolController::class);
Route::resource('jenis', Admin\JenisController::class);
Route::resource('tipes', Admin\TipeController::class);
Route::get('/tipes/{tipe}/cetak', 'Admin\TipeController@cetak')->name('tipes.cetak');

Route::resource('seris', SeriController::class);
