<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class DetallesForm extends Request {

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
            'nro_solicitud'=>'required',
            'nro_orden'=>'required',
            'nro_almacen'=>'required',
            'articulo'=>'required',
            'cantidad'=>'required',
            'existencia_a'=>'required'
		];
	}

}
