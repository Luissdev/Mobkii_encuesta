<?php namespace Mobkii\Http\Requests;

use Mobkii\Http\Requests\Request;
use Mobkii\Usuario;

class EditarUsuarioRequest extends Request {

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
		'email' => 'required|email',
		'admin' => 'required',
		'status' => 'required',
		];
	}

}
