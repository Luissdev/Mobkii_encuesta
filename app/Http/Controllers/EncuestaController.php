<?php namespace Mobkii\Http\Controllers;
use Mobkii\Encuesta;
use Mobkii\DemograficoDetalle;
use Mobkii\Demografico;
use Mobkii\Modelo;
use Mobkii\Http\Requests\AgregarDemograficoRequest;
use Mobkii\Http\Requests\AgregarSubdemograficoRequest;
use Mobkii\Http\Requests\AgregarEncuestaRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
class EncuestaController extends Controller {
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
		$encuestas = Encuesta::get();
		return view('encuesta.encuesta', ['encuestas'=> $encuestas]);
	}

	public function getAgregarEncuesta(){
		$modelos = Modelo::get();
		return view('encuesta.agregar_encuesta', ['modelos' => $modelos]);
	}

	public function postAgregarEncuesta(AgregarEncuestaRequest $request){
		$id = Encuesta::create([
			'nombre' => $request->get('nombre'),
			'status' => $request->get('status'),
			'modelo_id' => $request->get('modelo_id'),
			])->id;
		/*return redirect('auth/encuesta/demografico-encuesta');*/
		return redirect('auth/subdemografico/demografico-encuesta/'.$id)->with("succes", "Bien!");
	}

	public function getEditarEncuesta($id){
		$encuesta = Encuesta::find($id);
		$demograficos = Demografico::get();
		$modelos = Modelo::get();

		$subs = Encuesta::find($id)->encuesta_has_subdemografico;
		return $subs;
		return view("encuesta.editar_encuesta", ["encuesta"=> $encuesta, "demograficos" => $demograficos, "modelos" => $modelos]);
	}

	public function getDemograficoEncuesta($id){
		$demograficos = Demografico::get();
		$subdemograficos = DemograficoDetalle::get();
		return view("encuesta.demografico_encuesta", ["demograficos" => $demograficos, "subdemograficos" => $subdemograficos]);
	}


	public function getEditarPerfil(){
		return "mostrando formulario de perfil";
	}

/*	public function getSeedUsuario(){
		\Iseed::generateSeed('negocio');
		\Iseed::generateSeed('usuarios');
		\Iseed::generateSeed('categorias');
		\Iseed::generateSeed('productos');
		\Iseed::generateSeed('pedidos');
	}*/

	public function postEditarPerfil(){
		return "generando actualizacion de perifl";
	}

	public function getVerPerfil(){
		return "mostrando la vista general del perfil";
	}

	public function missingMethod($parameters = array())
	{
		abort(404);
	}
}
