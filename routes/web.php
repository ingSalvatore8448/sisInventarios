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


Route::PATCH('Usuario/editPersona/{idPersona}','UsuarioController@updatePersona');
Route::PATCH('Usuario/editUser/{idusuarios}','UsuarioController@updateUser');
Route::get('auth/login','LoginControl@login')->name('profile');
Route::post('auth/logeo','LoginControl@logeo');
Route::get('/admin','HomeController@admin');

Route::group(['middleware' => 'auth'], function () {
    //
    Route::resource('Categorias','CategoriaController');
    Route::resource('Departamen','DepartamentosController');
    Route::get('Departamentos','DepartamentosController@mostrar')->name('showdepar');
    Route::resource('Mobiliarios','MobiliarioController');
    Route::resource('Roles','RolController');
    Route::resource('Usuario','UsuarioController');
    Route::resource('Reportes','ReporController');
});
/*
Route::get('departamento','DepartamentosController@index')->name('departamento');

Route::get('/Departamento','DepartamentosController@getTasks')->name('datatables.data');
*/


Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
