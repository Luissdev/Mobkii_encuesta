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
		$enc = Encuesta::get();
		$subdemograficos = DemograficoDetalle::with('demografico')->get();
		return view("demografico_detalle.agregar_subdemografico", ["encuesta"=>$encuesta, 'subdemograficos' =>$subdemograficos]);
	
	}
	public function postAgregarSubdemografico(AgregarSubdemograficoRequest $request){
		$ar = $request->get('subdemografico');
		foreach ($ar as $key) {
			DemograficoDetalle::create([
				'nombre' => $key,
				'status' => $request->get('status'),
				'id_encuesta'=>$request->get('id_encuesta'),
				'id_demografico'=>$request->get('id_demografico'),
				]);
		}
		return "hola";
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

/*	public function getAgregarSubdemografico($id){
		$encuesta = get::find($id);
		return view('demografico.agregar_demografico',["encuesta"=>$encuesta]);
	}*/

/*	public function postAgregarSubdemografico($request){
		Demografico::create([
			'nombre' => $request->get('nombre'),
			'status' => $request->get('status'),
			]);

		return redirect('auth/demografico')->with("succes", "El demografico fue agregadocorrectamente");
	}*/

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
