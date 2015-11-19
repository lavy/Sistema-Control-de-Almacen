<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class NivelUsuarioForm extends Request {

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
			'nivel_usuario'=>'required|numeric',
            'nombre_nivel'=>'required',
		];
	}

    public function message()
    {
        return[
            'nivel_usuario.required'=>'Es necesario especificar el nivel de usuario',
            'nivel_usuario.numeric'=>'Es necesario que sea numerico',
            'nombre_nivel.required'=>'Es necesario especificar el nombre del nivel de usuario'
        ];
    }

}
