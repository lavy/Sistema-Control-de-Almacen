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
            /*'nro_solicitud'=>'required',
            'nro_orden'=>'required',
            'nro_almacen'=>'required',
            'articulo'=>'required',*/
            'tecnico'=>'required|not_in:0',
            /*'serial'=>'required|not_in:0',*/
            'cantidad'=>'required',
            'existencia_a'=>'required'
		];
	}

    public function message()
    {
        return[
            /*'nro_solicitud.required'=>'El nro de la solicitud es requerido',
            'nro_orden.required'=>'El nro de la orden es requerido',
            'nro_almacen.required'=>'El nro del almacen es requerido',
            'articulo.required'=>'El articulo es requerido',*/
            'tecnico.required'=>'El tecnico es requerido',
            'tecnico.not_in:0'=>'El tecnico es requerido',
            'serial.not_in:0'=>'El serial es requerido',
            'serial.required'=>'El serial es requerido',
            'cantidad.required'=>'La cantidad es requerida',
            'existencia_a.required'=>'La existencia es requerida'
        ];
    }

}
