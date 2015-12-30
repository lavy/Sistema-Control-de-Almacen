<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RenglonesForm extends Request {

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
            'tipo_renglon'=>'required|not_in:0',
            'descripcion'=>'required|min:2',
            'unidad_medida'=>'required',
            'cantidad'=>'required|numeric',
            'marca'=>'required|not_in:0',
            'modelo'=>'required|not_in:0',
            'existencia_minima'=>'required|numeric',
            'foto_articulo'=>'required|image'
		];
	}

    public function message()
    {
        return[
            'tipo_renglon.not_in:0'=>'Escoja un tipo de articulo',
            'descripcion.required'=>'La Descripcion del renglon es obligatoria',
            'descripcion.min'=>'La Descripcion debe tener minimo 2 caracteres',
            'marca.required'=>'La Marca debe ser obligatoria',
            'marca.not_in:0'=>'La Marca debe ser obligatoria',
            'modelo.required'=>'El Modelo debe ser obligatorio',
            'modelo.not_in:0'=>'El Modelo debe ser obligatorio',
            'cantidad.required'=>'La cantidad debe ser obligatoria',
            'cantidad.numeric'=>'La cantidad debe ser un valor numerico',
            'unidad_medida.required'=>'La unidad de medida es requerida',
            'existencia_minima.required'=>'La existencia minima es requerida',
            'existencia_minima.numeric'=>'La existencia minima debe ser un campo numerico',
            'foto_articulo.image'=>'La foto del articulo debe ser de tipo imagen',
            'foto_articulo.required'=>'La foto del articulo debe ser obligatoria'
        ];
    }
}
