<?php namespace Mobkii\Http\Controllers;
use Mobkii\Demografico;
use Mobkii\DemograficoDetalle;
use Mobkii\Http\Requests\AgregarDemograficoRequest;
use Mobkii\Http\Requests\AgregarSubdemograficoRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
class DemograficoController extends Controller {

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
		$demograficos = Demografico::get();
		$demograficos_detalle = DemograficoDetalle::get();
		return view('demografico.demografico', ['demograficos'=> $demograficos, 'demograficos_detalle' => $demograficos_detalle]);
	}

	public function getAgregarDemografico(){
		return view('demografico.agregar_demografico');
	}

	public function postAgregarDemografico(AgregarDemograficoRequest $request){
		Demografico::create([
			'nombre' => $request->get('nombre'),
			'status' => 1,
			'encuesta_id' => $request->get('encuesta_id'),
			]);

		return redirect('auth/demografico')->with("succes", "El demografico fue agregadocorrectamente");
	}


	public function getAgregarSubdemografico(){
		$demograficos = Demografico::get();
		return view('demografico_detalle.agregar_demografico_detalle', ['demograficos' => $demograficos]);
	}

	public function getAgregarDemograficoDetalle(){
		$demograficos = Demografico::get();
		return view('demografico_detalle.agregar_demografico_detalle', ['demograficos' => $demograficos]);
	}

	public function postAgregarDemograficoDetalle(AgregarSubdemograficoRequest $request){
		DemograficoDetalle::create([
			'nombre' => $request->get('nombre'),
			'demografico_id' => $request->get('demografico_id'),
			'status' => 1,
			]);

		return redirect('auth/demografico')->with("succes", "El subdemografico fue agregadocorrectamente");
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
