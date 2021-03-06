<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class InventarioForm extends Request {

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
            'almacen'=>'required',
            'proveedor'=>'required',
            'renglon'=>'required',
            'tipo_renglon'=>'required',
            'codigo_fabricante'=>'required|min:2|max:30',
            'unidad_medida'=>'required',
            'cantidad'=>'required',
            'cantidad_bs'=>'required'
		];
	}

    public function messages()
    {
        return[
            'almacen.required'=>'Almacen es Requerido para la Carga',
            'proveedor.required'=>'Proveedor es Requerido para la Carga',
            'renglon.required'=>'Renglon es Requerido para la Carga',
            'tipo_renglon.required'=>'Tipo Renglon es Requerido para la Carga',
            'codigo_fabricante.required'=>'Codigo Fabricante es Obligatorio',
            'codigo_fabricante.min'=>'Codigo Fabricante requiere minimo 2 caracteres',
            'codigo_fabricante.max'=>'Codigo Fabricante requiere maximo 2 caracteres',
            'unidad_medida.required'=>'Unidad de medida es requerida para la carga',
            'cantidad.required'=>'Cantidad es requerida para la carga',
            'cantidad_bs.required'=>'Cantidad de Bs es requerida para la carga'
        ];
    }

}
