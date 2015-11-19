<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AlmacenForm extends Request {

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
			'descripcion'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'persona_contacto'=>'required',
            'telef_contacto'=>'required',
            'correo_contacto'=>'required'

		];
	}

    public function message()
    {
        return [
            'descripcion.required'=>'La Descripción del Almacén es Obligatoria',
            'direccion.required'=>'La Dirección del Almacén es Obligatoria',
            'telefono.required'=>'El Télefono del Almacén es Obligatorio',
            'persona_contacto.required'=>'Tiene que haber una persona de contacto en el almacen',
            'telef_contacto.required'=>'Tiene que haber un telefono de contacto del almacen',
            'correo_contacto.required'=>'Especifique el Correo de contacto del Almacén'
        ];
    }

}
