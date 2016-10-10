<?php namespace Mobkii\Http\Controllers;
use Mobkii\Encuesta;
use Mobkii\DemograficoDetalle;
use Mobkii\Demografico;
use Mobkii\Modelo;
use Mobkii\Http\Requests\AgregarDemograficoRequest;
use Mobkii\Http\Requests\EditarEncuestaRequest;
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
		$encuesta = Encuesta::find($id);
		$subdemograficos = $encuesta->encuesta_has_subdemografico;
		/*return redirect('auth/encuesta/demografico-encuesta');*/
		return view('demografico_detalle.agregar_subdemografico',["subdemograficos"=>$subdemograficos, "encuesta"=>$encuesta]);
	}

	public function getEditarEncuesta($id){
		$encuesta = Encuesta::find($id);
		$demograficos = Demografico::get();
		$modelos = Modelo::get();

		$subs = Encuesta::find($id)->encuesta_has_subdemografico;
		return view("encuesta.editar_encuesta", ["encuesta"=> $encuesta, "demograficos" => $demograficos, "modelos" => $modelos]);
	}

	public function postEditarEncuesta(EditarEncuestaRequest $request){
		$encuesta = Encuesta::find($request->get('id'));
		$encuesta->nombre = $request->get('nombre');
		$encuesta->status = $request->get('status');
		$encuesta->modelo_id = $request->get('modelo_id');

		$encuesta->save();

		return redirect('/auth/encuesta');
	}

	public function getDemograficoEncuesta($id){
		$demograficos = Demografico::get();
		$subdemograficos = DemograficoDetalle::get();
		return view("encuesta.demografico_encuesta", ["demograficos" => $demograficos, "subdemograficos" => $subdemograficos]);
	}


	public function getEliminarEncuesta($id){
		$encuesta = Encuesta::find($id);
		DemograficoDetalle::where('encuesta_id', $id)->delete();
		$encuesta->delete();
		$mensaje = "La encuesta ".$encuesta->nombre." se ha eliminado corectamente";
		return $mensaje;
	}

	public function getAgregarSubdemografico($id){
		$encuesta = Encuesta::find($id);
		$subdemograficos = $encuesta->encuesta_has_subdemografico;
		return view("demografico_detalle.agregar_subdemografico", ["encuesta"=>$encuesta, 'subdemograficos' =>$subdemograficos]);
	}

	public function postAgregarSubdemografico(AgregarSubdemograficoRequest $request){
		DemograficoDetalle::where('encuesta_id', '=', $request->get('encuesta_id'))->where('demografico_id', '=', $request->get('demografico_id'))->delete();
		$ar = $request->get('subdemografico');
		foreach ($ar as $key) {
			if ($key != '') {
				DemograficoDetalle::create([
					'nombre' => $key,
					'status' => $request->get('status'),
					'encuesta_id'=>$request->get('encuesta_id'),
					'demografico_id'=>$request->get('demografico_id'),
					]);
			}
		}
		return redirect('auth/encuesta/agregar-subdemografico/'.$request->get('encuesta_id'));
	}

/*	public function getSeedUsuario(){
		\Iseed::generateSeed('negocio');
		\Iseed::generateSeed('usuarios');
		\Iseed::generateSeed('categorias');
		\Iseed::generateSeed('productos');
		\Iseed::generateSeed('pedidos');
	}*/

	public function postEliminarEncuesta($id){
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
