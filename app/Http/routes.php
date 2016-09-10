<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::controllers([
	'validacion' => 'Validacion\ValidacionController',
	'validado' => 'InicioController',
	'validado/cliente' => 'ClienteController',
	'validado/usuario' => 'UsuarioController',
	'validado/productos' => 'ProductoController',
	'validado/pedidos' => 'PedidoController',
	'validado/categorias' => 'CategoriaController',
	'/' => 'BienvenidoController',
/*	'password' => 'Auth\PasswordController',*/
]);
