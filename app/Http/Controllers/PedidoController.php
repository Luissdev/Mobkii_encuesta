<?php namespace Mobkii\Http\Controllers;

class PedidoController extends Controller {

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
		return "mostrando productos";
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getCrearProducto()
	{
		return "creando producto";
	}

	public function postCrearProducto(){
		return "almacenando foto";
	}

	public function getActualizarProducto()
	{
		return "actualizar producto";
	}

	public function postActualizarProducto(){
		return "actualizando producto";
	}


	public function getEliminarProducto()
	{
		return "Eliminar producto";
	}

	public function postEliminarProducto(){
		return "eliminando producto";
	}

	public function getVerPedidos(){
		return 'mostrando la lista de los pedidos';
	}

	public function missingMethod($parameters = array())
	{
		abort(404);
	}
}
