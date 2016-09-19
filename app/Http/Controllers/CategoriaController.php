<?php namespace Mobkii\Http\Controllers;

use Mobkii\Categoria;
use Mobkii\Http\Requests\EditarCategoriaRequest;
use Maatwebsite\Excel\Facades\Excel;
use Mobkii\Http\Requests\AgregarCategoriaRequest;
use Mobkii\Http\Requests\ImpotarCategorias;
use Carbon\Carbon;
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

	public function getImportarCategoria(){
		return view('usuario.importar_usuario');
	}

	public function postImportarCategoria(ImpotarCategorias $request)
	{
		$csv = $request->file('csv');
		$ruta = '/csv/';
		$nombre = sha1(Carbon::now()).'.'.$csv->getClientOriginalExtension();
		$csv->move(getcwd().$ruta, $nombre);
		$csv = public_path().$ruta.$nombre;

		Excel::load($csv, function($reader) {

			foreach ($reader->get() as $usr) {
				Usuario::create([
					'nombre' => $usr->nombre,
					'descripcion' => $usr->descripcion,
					'status' => $usr->status
					]);
			}
		});
		return redirect('auth/categoria')->with('succes', 'La lista de categorias fue agregada correctamente.');
	}


	public function getExportarCategorias(){
		Excel::create('Filename', function($excel) {
			$excel->sheet('Sheetname', function($sheet) {
				$prices = Categoria::get();
				$sheet->fromModel($prices);
			});
		})->download('xls');
	}

	public function missingMethod($parameters = array())
	{
		abort(404);
	}
}
