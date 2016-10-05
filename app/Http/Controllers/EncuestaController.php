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

/*	public function getEditarUsuario($id){

		$usuario = Usuario::find($id);
		return view('usuario.editar_usuario', ['usuario'=>$usuario]);
	}*/

/*	public function postEditarUsuario(EditarUsuarioRequest $request){
		$usuario = Usuario::find($request->get('id'));
		$usuario->nombre = $request->get('nombre');
		$usuario->email = $request->get('email');
		$usuario->status = $request->get('status');
		
		$usuario->save();

		return redirect("auth/usuario")->with('actualizado', 'El usuario fue actualizado correctamente');
	}*/


/*	public function getEliminarUsuario($id){
		$usuario = Usuario::find($id);

		$usuario->delete();

		return redirect('auth/usuario/');
	}*/

	public function getAgregarEncuesta(){
		$modelos = Modelo::get();
		return view('encuesta.agregar_encuesta', ['modelos' => $modelos]);
	}

	public function postAgregarEncuesta(AgregarEncuestaRequest $request){
		$id = Encuesta::create([
			'nombre' => $request->get('nombre'),
			'status' => $request->get('status'),
			'id_modelo' => $request->get('id_modelo'),
			])->id;
		/*return redirect('auth/encuesta/demografico-encuesta');*/
		return redirect('auth/subdemografico/demografico-encuesta/'.$id)->with("succes", "jijij");
	}

	public function getEditarEncuesta($id){
		$encuesta = Encuesta::find($id);
		$demograficos = Demografico::get();
		$modelos = Modelo::get();
		return view("encuesta.editar_encuesta", ["encuesta"=> $encuesta, "demograficos" => $demograficos, "modelos" => $modelos]);
	}

	public function getDemograficoEncuesta($id){
		$demograficos = Demografico::get();
		$subdemograficos = DemograficoDetalle::get();
		return view("encuesta.demografico_encuesta", ["demograficos" => $demograficos, "subdemograficos" => $subdemograficos]);
	}

/*	public function getImportarUsuario(){
		return view('usuario.importar_usuario');
	}
*/
/*	public function postImportarUsuario(ImportarUsuarios $request)
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
					'email' => $usr->email,
					'status' => $usr->status
					]);
			}
		});
		return redirect('auth/usuario')->with('succes', 'La lista de usuarios fue agregada correctamente.');
	}*/


/*	public function getExportarUsuarios(){		
		Excel::create('Filename', function($excel) {
			$excel->sheet('Sheetname', function($sheet) {
				$prices = Usuario::get();
				$sheet->fromModel($prices);
			});
		})->download('xls');
	}*/

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
