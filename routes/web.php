<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::controller(HomeController::class)->group(function () {
  Route::get('/profile', 'profile')->name('profile');
  Route::get('/', 'index')->name('home');
  Route::post('/', 'search')->name('search');
  Route::get('/item/{item}', 'showItem')->name('item');
  Route::post('/reserve/{item}', 'reserveItem')->name('reserve');
});
