<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

/**
 * Class DepartamentosController
 * @package App\Http\Controllers
 * @author Martin Gomes martingomes36@gmail.com
 */
class DepartamentosController extends Controller {

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
        $departamentos=\App\Departamentos::where('descrip_departamento','LIKE','%'.$buscar.'%')->paginate(10);
        $departamentos->setPath('departamento');
        return view('departamentos.index')->with('departamentos',$departamentos);
	}

	/**
	 * Muestra el Formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
        $oficina=\App\Oficinas::all()->lists('descrip_oficina','id_oficina');
		return view('departamentos.crear')->with('oficina',$oficina);
	}

	/**
	 * Instancia el modelo y crea un nuevo registro.
	 *
	 * @return Response
	 */
	public function store()
	{
		$departamentos=new\App\Departamentos();
        $departamentos->id_oficina=\Request::Input('oficina');
        $departamentos->descrip_departamento=\Request::Input('descripcion');
        $departamentos->save();
        return redirect('departamento')->with('message','Se ha Creado un Nuevo Departamento');
	}

	/**
	 * Muestra el Formulario para la edición del registro correspondiente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$departamento=\App\Departamentos::find($id);
        $oficina=\App\Oficinas::all()->lists('descrip_oficina','id_oficina');
        return view('departamentos.editar')->with(['departamento'=>$departamento,'oficina'=>$oficina]);
	}

	/**
	 * Actualiza el registro especificado en la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$departamento=\App\Departamentos::find($id);
        $departamento->id_oficina=\Request::Input('oficina');
        $departamento->descrip_departamento=\Request::Input('descripcion');
        $departamento->save();
        return redirect('departamento')->with('message','Se ha editado exitosamente el departamento');
	}

	/**
	 * Remueve o elimina el registro especificado de la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$departamento=\App\Departamentos::find($id);
        $departamento->delete();
        return redirect('departamentos')->with('message','El Departamento se ha Borrado');
	}

}
