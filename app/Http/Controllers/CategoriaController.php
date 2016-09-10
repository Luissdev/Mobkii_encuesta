<?php namespace App\Http\Controllers;

class CategoriaController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}


	public function getIndex(){
		return "mostrando categorias";
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getCrearCategoria()
	{
		return "creando Categoria";
	}

	public function postCrearCategoria(){
		return "almacenando categoria";
	}

	public function getActualizarCategoria()
	{
		return "actualizar Categoria";
	}

	public function postActualizarCategoria(){
		return "actualizando Categoria";
	}


	public function getEliminarCategoria()
	{
		return "Eliminar Categoria";
	}

	public function postEliminarCategoria(){
		return "eliminando Categoria";
	}

	public function missingMethod($parameters = array())
	{
		abort(404);
	}
}
