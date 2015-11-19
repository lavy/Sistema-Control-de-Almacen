<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class MarcasForm extends Request {

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
            'proveedor'=>'not_in:0',
			'descripcion'=>'required'
		];
	}

    public function message()
    {
        return[
            'proveedor.not_in:0'=>'Seleccione un Proveedor',
            'descripcion.required'=>'Es Requerida la Marca'
        ];
    }

}
