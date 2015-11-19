<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ModelosForm extends Request {

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
			'marca'=>'required|not_in:0',
            'descripcion'=>'required'
		];
	}

    public function message()
    {
        return[
          'marca.not_in:0'=>'Debe Seleccionar una Marca',
          'descripcion.required'=>'Es Requerido el Modelo'
        ];
    }

}
