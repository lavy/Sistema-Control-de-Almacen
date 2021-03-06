<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProveedorForm extends Request {

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
            'nombre_proveedor'=>'required',
            'contacto'=>'required',
            'telefono_proveedor'=>'required',
            'telefono_contacto'=>'required',
            'email'=>'required|email'
		];
	}

    public function message(){

        return[
            'nombre_proveedor.required'=>'El nombre del proveedor es requerido',
            'contacto.required'=>'La dirección es requerida',
            'telefono_proveedor.required'=>'El telefono del Proveedor es requerido',
            'telefono_contacto.required'=>'El telefono de contacto es requerido',
            'email.required'=>'El email es requerido',
            'email.email'=>'El email debe ser valido'


        ];
    }

}
