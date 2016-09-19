<?php namespace Mobkii\Http\Requests;

use Mobkii\Http\Requests\Request;

class EditarProductoRequest extends Request {

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
			'precio' => 'required',
			'descripcion' => 'required',
			'id_categoria' => 'required',
			'status' => 'required',
		];
	}

}
