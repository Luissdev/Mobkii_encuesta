<?php namespace Mobkii\Http\Controllers;
use Mobkii\Producto;
use Mobkii\Categoria;
class TiendaController extends Controller {

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

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$productos = Producto::paginate();
		$categorias = Categoria::get();
		return view('tienda.inicio', ['categorias'=> $categorias, 'productos' => $productos]);
	}

	public function getCategoria($id){
		$categorias = Categoria::get();
		$productos = Producto::where('id_categoria', $id)->paginate();
		return view('tienda.categoria', ['productos'=> $productos, 'categorias'=> $categorias]);
	}
}
