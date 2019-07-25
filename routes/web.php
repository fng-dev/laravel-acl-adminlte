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
    return view('welcome');
});

Route::group(['middleware' => 'auth', 'prefix' => 'painel', 'namespace' => 'Painel'], function (){
    //Rota index do painel administrativo
    Route::get('/', 'PainelController@index')->name('painel');

    //Rotas de Usuario
    Route::get('usuario', 'UserController@listaUsuarios')->name('painel.usuario'); //Rota Index
    Route::get('usuario/novo', 'UserController@novoUsuario')->name('painel.usuario.novo'); //Form Cad Usuario
    Route::post('usuario/novo', 'UserController@cadUsuario')->name('painel.usuario.novo.action'); //Cadastro do Usuario
    Route::get('usuario/config', 'UserController@configUsuario')->name('painel.usuario.config'); //Exibição dos Usuarios
    Route::get('usuario/{id}/delete', 'UserController@deleteUsuario')->name('painel.usuario.delete'); //Apagar usuario
    Route::get('usuario/{id}/update', 'UserController@formUpdateUsuario')->name('painel.usuario.update'); //Exibe form
    Route::post('usuario/{id}/update', 'UserController@updateUsuario')->name('painel.usuario.update.action'); // Faz alteração no sistema
    Route::get('usuario/config/{id}/role', 'UserController@role')->name('painel.usuario.config.role');
    Route::post('usuario/config/{id}/role', 'UserController@roleAction')->name('painel.usuario.config.role.action');


    //Rotas de Roles
    Route::get('role/config', 'RoleController@index')->name('painel.role.config');
    Route::get('role/config/{id}/form', 'RoleController@config')->name('painel.role.config.form');
    Route::post('role/config/{id}/form', 'RoleController@salvarConfig')->name('painel.role.config.salvar');
    Route::get('role/novo', 'RoleController@novoRole')->name('painel.role.novo');
    Route::post('role/novo', 'RoleController@cadRole')->name('painel.role.novo.action');


    //Rotas de Permissions
    Route::get('permission', 'PermissionController@index')->name('painel.permissao');
    Route::get('permission/novo', 'PermissionController@novaPermission')->name('painel.permissao.novo');
    Route::post('permission/novo', 'PermissionController@cadPermission')->name('painel.permissao.novo.action');



});




Auth::routes();



