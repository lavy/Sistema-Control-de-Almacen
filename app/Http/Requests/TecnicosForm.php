<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TecnicosForm extends Request {

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
            'nombre_tecnico'=>'required|min:2|max:20',
            /*'foto'=>'required'*/
		];
	}

    public function message()
    {
        return [
            'nombre_tecnico.required'=>'El nombre es requerido',
            'nombre_tecnico.min'=>'El nombre debe tener minimo 2 caracteres',
            'nombre_tecnico.max'=>'El nombre debe tener maximo 20 caracteres',
            'cedula.required'=>'La cedula es requerida',
            'cedula.numeric'=>'La cedula debe ser numerica',
            'cedula.min'=>'La cedula debe tener minimo 8 caracteres',
            'cedula.max'=>'La cedula debe tener maximo 10 caracteres',
          /*  'foto.required'=>'La foto es requerida',
            'foto.image'=>'La foto debe ser una imagen'*/
        ];



    }

}
