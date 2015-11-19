<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class OficinasForm extends Request {

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
            'descripcion'=>'required|min:6'
		];
	}

    public function message()
    {
        return[
            'descripcion.required'=>'La descripción de la oficina es requerida',
            'descripcion.min'=>'La descripcion debe tener minimo 10 caracteres'
        ];
    }

}
