<?php namespace Mobkii\Http\Controllers;

use Mobkii\Categoria;
use Mobkii\Http\Requests\EditarCategoriaRequest;
use Mobkii\Http\Requests\AgregarCategoriaRequest;
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
		$categorias = Categoria::get();

		/*return view('categoria.mostrar_categoria', ['categorias' => $categorias]);*/
		/*return $categorias;*/
		return view('categoria.mostrar_categoria', ['categorias' => $categorias]);
		/*return "mostrando categorias";*/
	}

	public function getEditarCategoria($id){
		$categoria = Categoria::find($id);
		return view('categoria.editar_categoria', ['categoria'=>$categoria]);
	}

	public function postEditarCategoria(EditarCategoriaRequest $request){
		$categoria = Categoria::find($request->get('id'));
		$categoria->nombre = $request->get('nombre');
		$categoria->descripcion = $request->get('descripcion');
		$categoria->status = $request->get('status');
		
		$categoria->save();

		return redirect("auth/categoria")->with('succes', 'La categoria fue actualizado correctamente');
	}


	public function getEliminarCategoria($id){
		$categoria = Categoria::find($id);

		$categoria->delete();

		return redirect('auth/categoria/')->with('succes', 'La categoria se ha eliminado correctamente.');
	}

	public function getAgregarCategoria(){
		return view('categoria.agregar_categoria');
	}

	public function postAgregarCategoria(AgregarCategoriaRequest $request){
		Categoria::create([
			'nombre' => $request->get('nombre'),
			'descripcion' => $request->get('descripcion'),
			'status' => $request->get('status'),
			]);

		return redirect('auth/categoria')->with('succes', 'La categoria fue agregado correctamente.');
	}

	public function missingMethod($parameters = array())
	{
		abort(404);
	}
}
