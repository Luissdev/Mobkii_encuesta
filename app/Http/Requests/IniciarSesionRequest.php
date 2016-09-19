<?php namespace Mobkii\Http\Requests;

use Mobkii\Http\Requests\Request;

class IniciarSesionRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
		//Si retorna falso no tiene permiso de hacer la operacion
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'email' => 'required|email',
			'password' => 'required',
		];
	}

}
