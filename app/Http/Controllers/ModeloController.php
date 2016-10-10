<?php namespace Mobkii\Http\Controllers;
use Mobkii\Encuesta;
use Mobkii\DemograficoDetalle;
use Mobkii\Demografico;
use Mobkii\Modelo;
use Mobkii\Http\Requests\AgregarModeloRequest;
use Mobkii\Http\Requests\EditarModeloRequest;
use Mobkii\Http\Requests\EditarEncuestaRequest;
use Mobkii\Http\Requests\AgregarSubdemograficoRequest;
use Mobkii\Http\Requests\AgregarEncuestaRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
class ModeloController extends Controller {
	public $encuesta;
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
		$modelos = Modelo::get();
		return view('modelo.modelo', ['modelos'=> $modelos]);
	}

	public function postTest(EditarEncuestaRequest $request){
		Modelo::create([
			'nombre'=>$request->get('nombre'),
			'status'=>$request->get('status'),
			]);
		return $request;
	}

	public function getEditarModelo($id){
		$modelo = Modelo::find($id);

		return view("modelo.editar_modelo", ["modelo"=> $modelo]);
	}

	public function postEditarModelo(EditarModeloRequest $request){
		$modelo = modelo::find($request->get('id'));
		$modelo->nombre = $request->get('nombre');
		$modelo->status = $request->get('status');

		$modelo->save();

		return redirect('auth/modelo');
	}

	public function getEliminarModelo($id){
		$modelo = Modelo::find($id);
		Encuesta::where('modelo_id', $id)->delete();
		$modelo->delete();
		$mensaje = "El modelo ".$modelo->nombre." ha sido eliminado";
		return $mensaje;
	}

	public function getAgregarModelo(){
		return view('modelo.agregar_modelo');
	}

	public function postAgregarModelo(AgregarModeloRequest $request){
		Modelo::create([
			'nombre'=>$request->get('nombre'),
			'status'=>$request->get('status'),
			]);
		return redirect("auth/modelo");
	}
	

/*	public function getSeedUsuario(){
		\Iseed::generateSeed('negocio');
		\Iseed::generateSeed('usuarios');
		\Iseed::generateSeed('categorias');
		\Iseed::generateSeed('productos');
		\Iseed::generateSeed('pedidos');
	}*/

	public function missingMethod($parameters = array())
	{
		abort(404);
	}
}
