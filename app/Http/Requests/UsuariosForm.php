<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuariosForm extends Request {

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
            'nombre'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'cedula'=>'required',
            'cargo'=>'required',
            'nivel_usuario'=>'required'
		];
	}

    public function message()
    {
        return[
          'nombre.required'=>'El Nombre y Apellido del Usuario es Requerido',
          'email.required'=>'El email es requerido',
          'email.email'=>'El email tiene que ser de tipo email',
          'password.required'=>'La Contraseña de Usuario es Requerida',
          'cedula.required'=>'La cedula del Usuario es Requerida',
          'cargo.required'=>'El Cargo del Usuario es Requerido',
          'nivel_usuario.required'=>'El Nivel de Usuario es Requerido',
        ];
    }
}
