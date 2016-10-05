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

	public function getAgregarDemografico(){
		return view('demografico.agregar_demografico');
	}

	public function postAgregarDemografico(AgregarDemograficoRequest $request){
		Demografico::create([
			'nombre' => $request->get('nombre'),
			'status' => 1,
			'id_encuesta' => $request->get('id_encuesta'),
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
			'id_demografico' => $request->get('id_demografico'),
			'status' => 1,
			]);

		return redirect('auth/demografico')->with("succes", "El subdemografico fue agregadocorrectamente");
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
