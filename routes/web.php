<?php

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
    return view('auth.login');
});



Route::get('auth/prueba','LoginControl@login')->name('profile');

Route::get('/admin','HomeController@admin');

Route::group(['middleware' => ['auth','is_admn']], function () {
    //
    Route::resource('Categorias','CategoriaController');

    Route::resource('Usuario','UsuarioController');

    Route::resource('Mobiliarios','MobiliarioController');
    Route::resource('Perfil','PerfController');
    Route::PATCH('Usuario/editPersona/{idPersona}','UsuarioController@updatePersona');
    Route::PATCH('Usuario/editUser/{idusuarios}','UsuarioController@updateUser');
    Route::PATCH('Perfil/editPersona/{idPersona}','PerfController@updatePersona');
    Route::PATCH('Perfil/editUser/{idusuarios}','PerfController@updateUser');
    Route::resource('Mobiliarios','MobiliarioController');
    Route::resource('Reportes','ReporController');
    Route::resource('Roles','RolController');
    Route::get('Departamentos','DepartamentosController@mostrar')->name('showdepar');
    Route::resource('Departamen','DepartamentosController');




});

Route::group(['middleware' => 'is_resonsable'],function (){


    Route::post('Mob/mobicre','MobiliarioController@registrar')->name('registrar');
    Route::get('Mob/mobicre','MobiliarioController@CrearMobi');
    Route::get('mob/lisMobi','MobiliarioController@listar')->name('buscar');
    Route::delete('Mob/{idMobiliario}','MobiliarioController@eliminar');
    Route::get('Mobili/{idMobiliario}','MobiliarioController@editar');
    Route::PATCH('Mob/updateRes/{idMobiliario}','MobiliarioController@updateMobi')->name('update');

    /*   Route::resource('MobiResponsable','MobiUserController');
    */

   });

Route::get('Mensajes','MensajeController@Mensaje')->name('mensaje');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('Perfil','PerfController');
Route::PATCH('estado/{idMobiliario}','MobiliarioController@canbiarestado');
Route::resource('Tablero','HomController');
Route::get('Mobiliari','MobiliarioController@detalle');
Route::post('user/Password','PerfController@canbiarpass');
Auth::routes();
