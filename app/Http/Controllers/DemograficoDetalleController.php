<?php namespace Mobkii\Http\Controllers;
use Mobkii\DemograficoDetalle;
use Mobkii\Demografico;
use Mobkii\Encuesta;
use Carbon\Carbon;
use Mobkii\Http\Requests\AgregarSubdemograficoRequest;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
class DemograficoDetalleController extends Controller {

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
		$demograficos = DemograficoDetalle::get();

		return view('demografico.demografico', ['demograficos'=> $demograficos]);
	}

	public function getDemograficoEncuesta($id){
		$encuesta = Encuesta::find($id);
		$subdemograficos = DemograficoDetalle::get();
		return view("demografico_detalle.agregar_subdemografico", ["encuesta"=>$encuesta]);
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
		return redirect('auth/subdemografico/agregar-subdemografico/'.$request->get('encuesta_id'));
	}
	
	public function getEditarSubdemografico(){
		$subs = Encuesta::find($id)->encuesta_has_subdemografico;
		return redirect('auth/subdemografico/demografico-encuesta/'.$id)->with("succes", "jijij");
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
