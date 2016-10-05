<?php namespace Mobkii\Http\Requests;

use Mobkii\Http\Requests\Request;
use Mobkii\Usuario;

class AgregarUsuarioRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'nombre' => 'required',
			'email' => 'required|email|unique:usuario',
			'password' => 'required|min:6|confirmed',
			'admin' => 'required,',
			'status' => 'required',
		];
	}

}
