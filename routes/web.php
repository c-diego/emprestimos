<?php

use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\ItemController;

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

Route::controller(LoginController::class)->group(function () {
  Route::post('/login', 'authenticate')->name('login');
  Route::get('/login', 'formLogin')->name('formlogin');
  Route::get('/logout', 'logout')->name('logout');
});

Route::controller(UserController::class)->group(function () {
  Route::get('', 'index')->name('home');
  Route::post('/home', 'search')->name('search');
  Route::get('/itens/{item}', 'showItem')->name('item');
});

Route::middleware('auth')->group(function () {

  Route::controller(UserController::class)->group(function () {
    Route::get('/perfil', 'profile')->middleware('auth')->name('profile');
    Route::post('/itens/{item}/solicitar', 'reserveItem')->middleware('auth')->name('reserve');
  });

  Route::prefix('gerente/')->group(function () {

    Route::controller(ManagerController::class)->group(function () {
      Route::get('solicitacoes', 'solicitations')->name('manager.solicitations');
      Route::get('solicitacoes/{loan}/aprovar', 'approveSolicitation')->name('manager.approveSolicitation');
      Route::get('solicitacoes/{loan}/negar', 'denySolicitation')->name('manager.denySolicitation');
    });

    Route::controller(ItemController::class)->group(function () {
      Route::get('/', 'index')->name('manager.items');
      Route::get('itens/{item}/deletar', 'destroy')->name('manager.delete');
      Route::get('itens/item/novo', 'create')->name('manager.create');
      Route::post('itens/item/salvar', 'store')->name('manager.save');
      Route::get('itens/{item}/editar', 'edit')->name('manager.edit');
      Route::post('itens/{item}/alterar', 'update')->name('manager.update');
    });

  });

});
