<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SolicitudForm extends Request {

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
            /*'almacen'=>'required',*/
            'oficina'=>'required|not_in:0',
            'departamento'=>'required|not_in:0',
            'nombre_beneficiario'=>'required|min:2',
            'telef_beneficiario'=>'required',
            'email_beneficiario'=>'required|email',
            'tipo_solicitud'=>'required|not_in:0',
            't_articulos'=>'required|not_in:0',
            'articulos'=>'required|not_in:0',
            'detalle'=>'required',
            'observaciones'=>'required'



		];
	}
    public function messages()
    {
        return[
            /*'almacen.required'=>'Especifique a cual almacen es la solicitud',*/
            'oficina.required'=>'Especifique de cual oficina es la solicitud',
            'oficina.not_in:0'=>'Debe Seleccionar una Oficina',
            'departamento.required'=>'Especifique de cual departamento es la solicitud',
            'departamento.not_in:0'=>'Debe Seleccionar un Departamento',
            'nombre_beneficiario.required'=>'Especifique su nombre',
            'nombre_beneficiario.min'=>'El nombre debe llevar minimo 2 caracteres',
            'telef_beneficiario.required'=>'El Telefono es obligatorio en formato XXXX-XXX-XXXX',
            'email_beneficiario.required'=>'El email es obligatorio',
            'email_beneficiario.email'=>'El campo debe ser de tipo email',
            'tipo_solicitud.required'=>'Especifique el tipo de solicitud que hara',
            't_articulos.not_in:0'=>'Debe Seleccionar un Tipo de Articulos',
            'articulos.not_in:0'=>'Debe Seleccionar un Artículo',
            'detalles.required'=>'Es Requerido un Detalle del Pedido',
            'observaciones.required'=>'Es Requerido una Observación'
        ];


    }

}
