<?php

use Illuminate\Support\Facades\Route;

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
    return redirect(route('login'));
});

Route::get('/home', function () {
    return view('admin.dashboard.dashboard');
})->middleware(['auth'])->name('home');

Route::resource('producto', ProductoController::class)->middleware(['auth']);
Route::resource('user', UserController::class)->middleware(['auth']);
Route::resource('pedido', PedidoController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
