<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');
    Route::resource('eventosfuncionesarealugar', 'EventosFuncionesAreaLugarController');
    Route::resource('eventosventa', 'EventosVentaController');
    Route::get('filter/{id}/eventosventa/{state}', "EventosVentaController@getThisByFilter");
    
    Route::post('pago', 'EventosVentaController@pago2co');
    Route::post('qpago', 'EventosVentaController@pagarQPP');
    Route::post('pagadito', 'EventosVentaController@pagar');
    Route::post('pagalo', 'EventosVentaController@pagalo');
    Route::post('pagar', 'EventosVentaController@pagar');
    Route::post('comprobante', 'EventosVentaController@comprobanteCompra');

    Route::post('enviar', 'EventosVentaController@enviar');
    Route::post('users/{id}/changepassword', "UsersController@changePassword");
    Route::post('upload', 'AuthenticateController@uploadAvatar');
    Route::post('eventosfuncionesarealugar/delete', 'EventosFuncionesAreaLugarController@deleteLugares');
    Route::post('logout', 'AuthenticateController@logout');
});
Route::post('users', 'UsersController@store');
Route::resource('anuncios', 'AnunciosController');
Route::resource('anunciosdescuentos', 'AnunciosDescuentosController');
Route::resource('categoriaeventos', 'CategoriaEventosController');
Route::resource('eventos', 'EventosController');
Route::resource('eventosdescuentoarea', 'EventosDescuentoAreaController');
Route::resource('eventosdescuento', 'EventosDescuentoController');
Route::resource('eventosdescuentovendedor', 'EventosDescuentoVendedorController');
Route::resource('eventosfuncionesarea', 'EventosFuncionesAreaController');
Route::resource('eventosfunciones', 'EventosFuncionesController');
Route::resource('eventosimgs', 'EventosImgsController');
Route::resource('eventosvendedor', 'EventosVendedorController');
Route::resource('eventosvendedormensajeria', 'EventosVendedorMensajeriaController');

Route::get('filter/{id}/anuncios/{state}', "AnunciosController@getThisByFilter");
Route::get('filter/{id}/anunciosdescuentos/{state}', "AnunciosDescuentosController@getThisByFilter");
Route::get('filter/{id}/categoriaeventos/{state}', "CategoriaEventosController@getThisByFilter");
Route::get('filter/{id}/eventos/{state}', "EventosController@getThisByFilter");
Route::get('filter/{id}/eventosdescuentoarea/{state}', "EventosDescuentoAreaController@getThisByFilter");
Route::get('filter/{id}/eventosdescuento/{state}', "EventosDescuentoController@getThisByFilter");
Route::get('filter/{id}/eventosdescuentovendedor/{state}', "EventosDescuentoVendedorController@getThisByFilter");
Route::get('filter/{id}/eventosfuncionesarea/{state}', "EventosFuncionesAreaController@getThisByFilter");
Route::get('filter/{id}/eventosfuncionesarealugar/{state}', "EventosFuncionesAreaLugarController@getThisByFilter");
Route::get('filter/{id}/eventosfunciones/{state}', "EventosFuncionesController@getThisByFilter");
Route::get('filter/{id}/eventosimgs/{state}', "EventosImgsController@getThisByFilter");
Route::get('filter/{id}/eventosvendedor/{state}', "EventosVendedorController@getThisByFilter");
Route::get('filter/{id}/eventosvendedormensajeria/{state}', "EventosVendedorMensajeriaController@getThisByFilter");

Route::get('rol/{id}/users', "Users@getUsersByRol");

Route::post('users/password/reset', 'UsersController@recoveryPassword');

Route::put('vender/{id}', 'EventosFuncionesAreaController@Vender');

Route::post('login', 'AuthenticateController@login');
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');