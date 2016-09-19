<?php namespace Mobkii\Http\Controllers;
use Mobkii\Producto;
use Mobkii\Categoria;
use Mobkii\Http\Requests\EditarProductoRequest;
use Mobkii\Http\Requests\AgregarProductoRequest;
use Mobkii\Http\Requests\ImportarProductoRequest;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
class ProductoController extends Controller {

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
		$productos = Producto::paginate();

		return view('producto.mostrar_producto', ['productos'=> $productos]);
	}

	public function getEditarProducto($id){
		$categorias = Categoria::get();
		$producto = Producto::find($id);
		return view('producto.editar_producto', ['producto'=>$producto, 'categorias'=>$categorias]);
	}

	public function postEditarProducto(EditarProductoRequest $request){

		$producto = Producto::find($request->get('id'));

		if($request->hasFile('imagen'))
		{
			$imagen = $request->file('imagen');
			$ruta = '/img/';
			$nombre = sha1(Carbon::now()).'.'.$imagen->guessExtension();

			$imagen->move(getcwd().$ruta, $nombre);

			$rutaanterior = getcwd().$producto->imagen;

/*			if(file_exists($rutaanterior))
			{
				unlink(realpath($rutaanterior));
			}*/

			$producto->imagen = $ruta.$nombre;
		}

		$producto->nombre = $request->get('nombre');
		$producto->precio = $request->get('precio');
		$producto->descripcion = $request->get('descripcion');
		$producto->id_categoria = $request->get('id_categoria');
		$producto->status = $request->get('status');
		
		$producto->save();

		return redirect("auth/productos")->with('succes', 'El producto fue actualizado correctamente');
	}


	public function getEliminarProducto($id){
		$producto = Producto::find($id);

		$producto->delete();

		return redirect('auth/productos/')->with('succes', 'El producto se ha eliminado correctamente.');
	}

	public function getAgregarProducto(){
		$categorias = Categoria::get();
		return view('producto.agregar_producto')->with('categorias', $categorias);
	}

	public function postAgregarProducto(AgregarProductoRequest $request){
		$img = $request->file('imagen');
		$ruta = '/img/';
		$nombre = sha1(Carbon::now()).'.'.$img->guessExtension();
		$img->move(getcwd().$ruta, $nombre);
		Producto::create([
			'nombre' => $request->get('nombre'),
			'precio' => $request->get('precio'),
			'imagen' => $ruta.$nombre,
			'descripcion' => $request->get('descripcion'),
			'id_categoria' => $request->get('id_categoria'),
			'id_negocio' => $request->get('id_negocio'),
			'status' => $request->get('status'),
			]);

		return redirect('auth/productos')->with('succes', 'El producto fue agregado correctamente.');
	}

	public function getImportarProducto(){
		return view('producto.importar_producto');
	}
	public function postImportarProducto(ImportarProductoRequest $request)
	{
		$csv = $request->file('csv');
		$ruta = '/csv/';
		$nombre = sha1(Carbon::now()).'.'.$csv->getClientOriginalExtension();
		$csv->move(getcwd().$ruta, $nombre);
		$csv = public_path().$ruta.$nombre;

		Excel::load($csv, function($reader) {

			foreach ($reader->get() as $producto) {
				Producto::create([
					'nombre' => $producto->nombre,
					'precio' => $producto->precio,
					'descripcion' => $producto->descripcion,
					'id_categoria' => $producto->id_categoria,
					'status' => $producto->status,
					'imagen' => $producto->imagen,
					'id_negocio' => 1,
					'id_categoria' => 1
					]);
			}
		});
		return redirect('auth/productos')->with('succes', 'La lista de productos fue agregada correctamente.');
	}

	public function getExportarProductos(){		
		Excel::create('Filename', function($excel) {
			$excel->sheet('Sheetname', function($sheet) {
				$prices = Producto::get();
				$sheet->fromModel($prices);
			});
		})->download('xls');
	}

	public function missingMethod($parameters = array())
	{
		abort(404);
	}
}
