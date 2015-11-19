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
            'existencia_minima'=>'required|numeric'
		];
	}

    public function message()
    {
        return[
            'tipo_renglon.not_in:0'=>'Escoga un tipo de articulo',
            'descripcion.required'=>'La Descripcion del renglon es obligatoria',
            'descripcion.min'=>'La Descripcion debe tener minimo 2 caracteres',
            'unidad_medida.required'=>'La unidad de medida es requerida',
            'existencia_minima.required'=>'La existencia minima es requerida',
            'existencia_minima.numeric'=>'La existencia minima debe ser un campo numerico',
        ];
    }
}
