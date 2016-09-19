<?php namespace Mobkii\Http\Controllers;
use Mobkii\Usuario;
use Mobkii\Http\Requests\EditarUsuarioRequest;
use Mobkii\Http\Requests\EliminarUsuarioRequest;
use Mobkii\Http\Requests\AgregarUsuarioRequest;
use Illuminate\Support\Facades\Auth;
class UsuarioController extends Controller {

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
		$usuarios = Usuario::get();

		return view('usuario.mostrar_usuario', ['usuarios'=> $usuarios]);
	}

	public function getEditarUsuario($id){

		$usuario = Usuario::find($id);
		return view('usuario.editar_usuario', ['usuario'=>$usuario]);
	}

	public function postEditarUsuario(EditarUsuarioRequest $request){
		$usuario = Usuario::find($request->get('id'));
		$usuario->nombre = $request->get('nombre');
		$usuario->email = $request->get('email');
		$usuario->admin = $request->get('admin');
		$usuario->status = $request->get('status');
		
		$usuario->save();

		return redirect("auth/usuario")->with('actualizado', 'El usuario fue actualizado correctamente');
	}


	public function getEliminarUsuario($id){
		$usuario = Usuario::find($id);

		$usuario->delete();

		return redirect('auth/usuario/');
	}

	public function getAgregarUsuario(){
		return view('usuario.agregar_usuario');
	}

	public function postAgregarUsuario(AgregarUsuarioRequest $request){
		Usuario::create([
			'nombre' => $request->get('nombre'),
			'email' => $request->get('email'),
			'password' => $request->get('password'),
			'admin' => $request->get('admin'),
			'status' => $request->get('status'),
			]);

		return(redirect('auth/usuario'));
	}
	public function getEditarPerfil(){
		return "mostrando formulario de perfil";
	}

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
