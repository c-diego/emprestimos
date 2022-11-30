<?php

use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
  Route::post('/login', 'authenticate')->name('login');
  Route::get('/login', 'formLogin')->name('formlogin');
  Route::get('/logout', 'logout')->name('logout');
});

Route::controller(ManagerController::class)->middleware('auth')->prefix('gerente/')->group(function () {
  Route::get('/', 'items')->name('manager.items');
  Route::get('itens/{item}/deletar', 'delete')->name('manager.delete');
  Route::get('itens/item/novo', 'create')->name('manager.create');
  Route::post('itens/item/salvar', 'save')->name('manager.save');
  Route::get('itens/{item}/editar', 'edit')->name('manager.edit');
  Route::post('itens/{item}/alterar', 'update')->name('manager.update');
  Route::get('solicitacoes', 'solicitations')->name('manager.solicitations');
});

Route::controller(UserController::class)->group(function () {
  Route::get('', 'index')->name('home');
  Route::post('/home', 'search')->name('search');
  Route::get('/itens/{item}', 'showItem')->name('item');
  Route::get('/perfil', 'profile')->middleware('auth')->name('profile');
  Route::post('/itens/{item}/solicitar', 'reserveItem')->middleware('auth')->name('reserve');
});
