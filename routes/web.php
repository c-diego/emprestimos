<?php

use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\LoginController;
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

Route::controller(LoginController::class)->group(function() {
  Route::post('login', 'authenticate')->name('login');
  Route::get('login', 'formLogin')->name('formlogin');
  Route::get('logout', 'logout')->name('logout');
});

Route::controller(ManagerController::class)->prefix('manager')->group(function () {
  Route::get('items', 'items')->name('manager.items');
  Route::get('delete/{item}', 'delete')->name('manager.delete');
  Route::get('create', 'create')->name('manager.create');
  Route::post('save', 'save')->name('manager.save');
  Route::get('edit/{item}', 'edit')->name('manager.edit');
  Route::post('update/{item}', 'update')->name('manager.update');
});

Route::controller(HomeController::class)->group(function () {
  Route::get('/', 'index')->name('home');
  Route::post('/', 'search')->name('search');
  Route::get('/profile', 'profile')->middleware('auth')->name('profile');
  Route::get('/item/{item}', 'showItem')->name('item');
  Route::post('/reserve/{item}', 'reserveItem')->middleware('auth')->name('reserve');
});
