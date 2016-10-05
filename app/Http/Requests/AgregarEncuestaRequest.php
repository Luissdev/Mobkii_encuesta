<?php namespace Mobkii\Http\Requests;

use Mobkii\Http\Requests\Request;

class AgregarEncuestaRequest extends Request {

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
			'modelo_id' => 'required',
		];
	}

}
