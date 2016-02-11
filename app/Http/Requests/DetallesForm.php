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
            'tecnico'=>'required|not_in:0',
            'cantidad'=>'required',
            'existencia_a'=>'required'
		];
	}

    public function message()
    {
        return[
            'tecnico.required'=>'El tecnico es requerido',
            'tecnico.not_in:0'=>'El tecnico es requerido',
            'serial.not_in:0'=>'El serial es requerido',
            'serial.required'=>'El serial es requerido',
            'cantidad.required'=>'La cantidad es requerida',
            'existencia_a.required'=>'La existencia es requerida'
        ];
    }

}
