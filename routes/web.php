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

Route::get('/home', 'HomeAuthController@index')->name('home')->middleware('auth');

Route::resource('producto', ProductoController::class)->middleware(['auth']);
Route::get('cargar_productos', 'ProductoController@cargar_productos')->name('cargar_productos')->middleware(['auth']);
Route::post('producto/buscar', 'ProductoController@buscar_producto')->name('buscar_producto')->middleware(['auth']);

Route::resource('user', UserController::class)->middleware(['auth']);
Route::get('user_gestionar_permisos', 'UserController@user_gestionar_permisos')->name('user_gestionar_permisos')->middleware(['auth']);

Route::resource('pedido', PedidoController::class)->middleware(['auth']);
Route::get('pedido/boucher/{id_pedido}', 'PedidoController@show_boucher')->name('pedido.show_boucher')->middleware(['auth']);
Route::get('pedido/getmunicipio/{id_departamento}', 'PedidoController@get_municipios')->name('pedido.getmunicipio')->middleware(['auth']);


require __DIR__.'/auth.php';
