<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Oficinas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\JefesForm;

/**
 * Class JefesController
 * @package App\Http\Controllers
 * @author Martin Gomes martingomes36@gmail.com
 */
class JefesController extends Controller {

	/**
	 * Muestra una lista de todos los registros.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $buscar=trim($request->input('buscar'));
        $jefes=DB::table('jefes')
                ->join('oficinas','jefes.id_oficina','=','oficinas.id_oficina')
                ->select('jefes.*','oficinas.descrip_oficina')
                ->where('jefes.nombre','LIKE','%'.$buscar.'%')
                ->paginate(5);
        $jefes->setPath('jefes');
		return view('jefes.index')->with('jefes',$jefes);
	}

	/**
	 * Muestra el Formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{

		$oficinas=\App\Oficinas::all()->lists('descrip_oficina','id_oficina');
        array_unshift($oficinas,'Seleccione una Oficina');
        return view('jefes.crear')->with('oficinas',$oficinas);
	}

	/**
	 * Instancia el modelo y crea un nuevo registro.
	 *
	 * @return Response
	 */
	public function store(JefesForm $jefesForm)
	{
		$jefes= new \App\Jefes();
        $jefes->id_oficina=\Request::input('oficina');
        $jefes->nombre=\Request::input('nombre');
        $jefes->cedula=\Request::input('cedula');
        $jefes->fecha_ingreso=date("Y-m-d",strtotime(\Request::input('fecha_ingreso')));
        $jefes->save();
        return redirect('jefes')->with('message','Se ha creado un Nuevo Jefe');
	}

	/**
	 * Muestra el Formulario para la edición del registro correspondiente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$jefes=\App\Jefes::find($id);
        $oficinas=Oficinas::all()->lists('descrip_oficina','id_oficina');
        return view('jefes.editar')->with(['jefes'=>$jefes,'oficinas'=>$oficinas]);

	}

	/**
	 * Actualiza el registro especificado en la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, JefesForm $jefesForm)
    {
        $jefes = \App\Jefes::find($id);
        $jefes->id_oficina = \Request::input('oficina');
        $jefes->nombre = \Request::input('nombre');
        $jefes->cedula = \Request::input('cedula');
        $jefes->fecha_ingreso =date("Y-m-d",strtotime(\Request::input('fecha_ingreso')));
        $jefes->save();
        return redirect('jefes')->with('message','Se ha editado un Jefe');

    }

}
