<?php namespace App\Http\Controllers;

use App\Categorias;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TipoRenglonesForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class TiporenglonController
 * @package App\Http\Controllers
 * @author Martin Gomes martingomes36@gmail.com
 */
class TiporenglonController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
	 * Muestra una lista de todos los registros.
	 *
	 * @return Response
	 */
	public function index(Request $request )
	{
        $buscar=trim($request->Input('buscar'));
        $trenglon=\App\TipoRenglon::where('descrip_tipo_renglon','LIKE','%'.$buscar.'%')
                                    ->where('id_almacen','=',Auth::User()->id_almacen)
                                    ->paginate(5);
        $trenglon->setPath('tiporenglon');
		return view('tiporenglon.index')->with('trenglon',$trenglon);
	}

	/**
	 * Muestra el Formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categorias=Categorias::all()->lists('descrip_categoria','id_categoria');
		array_unshift($categorias,'Seleccione una categoria');
		return view('tiporenglon.crear')->with('categorias',$categorias);
	}

	/**
	 * Instancia el modelo y crea un nuevo registro.
	 *
	 * @return Response
	 */
	public function store(TipoRenglonesForm $tipoRenglonesForm)
	{
        $trenglon= new \App\TipoRenglon();
        $trenglon->id_almacen=Auth::User()->id_almacen;
		$trenglon->id_categoria=\Request::Input('categoria');
        $trenglon->descrip_tipo_renglon=\Request::Input('descripcion');
        $trenglon->save();
        return redirect('tiporenglon')->with('message','Se ha Añadido un Nuevo Tipo de Articulo');
	}


	/**
	 * Muestra el Formulario para la edición del registro correspondiente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$trenglon=\App\TipoRenglon::find($id);
		$categorias=Categorias::all()->lists('descrip_categoria','id_categoria');
		array_unshift($categorias,'Seleccione una categoria');
        return view('tiporenglon.editar')->with(['trenglon'=>$trenglon,'categorias'=>$categorias]);
	}

	/**
	 * Actualiza el registro especificado en la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $trenglon=\App\TipoRenglon::find($id);
		$trenglon->id_categoria=\Request::Input('categoria');
        $trenglon->descrip_tipo_renglon=\Request::Input('descripcion');
        $trenglon->save();
        return redirect('tiporenglon')->with('message','Se ha editado el registro');
	}

	/**
	 * Remueve o elimina el registro especificado de la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$trenglon=\App\TipoRenglon::find($id);
        $trenglon->delete();
        return redirect('tiporenglon')->with('message','Borrado');
	}

}
