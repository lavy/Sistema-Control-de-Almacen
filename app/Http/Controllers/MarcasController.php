<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarcasForm;
use Illuminate\Http\Request;

/**
 * Class MarcasController
 * @package App\Http\Controllers
 * @author Martin Gomes martingomes36@gmail.com
 */
class MarcasController extends Controller {

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
		$marcas=\App\Marca::where('descrip_marca','LIKE','%'.$buscar.'%')->paginate(5);
        $marcas->setPath('marca');
        return view('marcas.index')->with('marcas',$marcas);
	}

	/**
	 * Muestra el Formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
        $proveedor=\App\Proveedor::all()->lists('nombre_proveedor','id_proveedor');
        array_unshift($proveedor,'Seleccione un proveedor');
		return view('marcas.crear')->with('proveedor',$proveedor);
	}

	/**
	 * Instancia el modelo y crea un nuevo registro.
	 *
	 * @return Response
	 */
	public function store(MarcasForm $marcasForm)
	{
		$marcas=new \App\Marca();
        $marcas->descrip_marca=\Request::Input('descripcion');
        $marcas->id_proveedor=\Request::Input('proveedor');
        $marcas->save();

        return redirect('marca')->with('message','Se ha Registrado una nueva Marca');
	}

	/**
	 * Muestra el Formulario para la edición del registro correspondiente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$marca=\App\Marca::find($id);
        $proveedor=\App\Proveedor::all()->lists('nombre_proveedor','id_proveedor');
        array_unshift($proveedor,'Seleccione un proveedor');
        return view('marcas.editar')->with(['marca'=>$marca,'proveedor'=>$proveedor]);
	}

	/**
	 * Actualiza el registro especificado en la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$marca=\App\Marca::find($id);
        $marca->id_proveedor=\Request::Input('proveedor');
        $marca->descrip_marca=\Request::Input('descripcion');
        $marca->save();
        return redirect('marca')->with('Se ha editado exitosamente la marca');
	}

	/**
	 * Remueve o elimina el registro especificado de la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $marcas=\App\Marca::find($id);
        $marcas->delete();
        return redirect('marcas')->with('message','borrado');
	}

}
