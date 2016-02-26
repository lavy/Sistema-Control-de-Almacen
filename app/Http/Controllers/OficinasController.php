<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\OficinasForm;

use Illuminate\Http\Request;

/**
 * Class OficinasController
 * @package App\Http\Controllers
 * @author Martin Gomes martingomes36@gmail.com
 */
class OficinasController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
	 * Muestra una lista de todos los registros.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

        $buscar=trim($request->input('buscar'));
        $oficinas = \App\Oficinas::where('descrip_oficina','LIKE', '%' .$buscar . '%')->paginate(10);
        $oficinas->setPath('oficina');
        return view('oficinas.index')->with('oficinas', $oficinas);

	}

	/**
	 * Muestra el Formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('oficinas.crear');
	}

	/**
	 * Instancia el modelo y crea un nuevo registro.
	 *
	 * @return Response
	 */
	public function store(OficinasForm $oficinasForm)
	{
		$oficinas=new\App\Oficinas;
        $oficinas->descrip_oficina=\Request::Input('descripcion');
        $oficinas->save();
        return redirect('oficina')->with('message','Se ha creado una oficina');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Muestra el Formulario para la edición del registro correspondiente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$oficina=\App\Oficinas::find($id);
        return view('oficinas.editar')->with('oficina',$oficina);
	}

	/**
	 * Actualiza el registro especificado en la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$oficinas=\App\Oficinas::find($id);
        $oficinas->descrip_oficina=\Request::Input('descripcion');
        $oficinas->save();
        return redirect ('oficina')->with('message','Se ha editado la oficina');
	}

	/**
	 * Remueve o elimina el registro especificado de la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$oficinas=\App\Oficinas::find($id);
        $oficinas->delete();
        return redirect('oficinas')->with('message','Se ha borrado un registro');
	}
}
