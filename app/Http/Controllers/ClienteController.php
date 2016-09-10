<?php namespace App\Http\Controllers;

class ClienteController extends Controller {

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

	public function getEditarPerfil(){
		return "mostrando formulario de perfil";
	}

	public function postEditarPerfil(){
		return "generando actualizacion de perifl";
	}

	public function missingMethod($parameters = array())
	{
		abort(404);
	}
}
