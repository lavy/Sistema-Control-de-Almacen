<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\InventarioForm;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class InventarioController
 * @package App\Http\Controllers
 * @author Martin Gomes martingomes36@gmail.com
 */
class InventarioController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $buscar=trim($request->input('buscar'));
        $inventario= DB::table('inventario')
            ->join('almacen', 'inventario.id_almacen', '=', 'almacen.id_almacen')
            ->join('renglones', 'inventario.id_renglon', '=', 'renglones.id_renglon')
            ->select('inventario.*', 'almacen.descrip_almacen', 'renglones.descrip_renglon')
            ->where('renglones.descrip_renglon','LIKE','%'.$buscar.'%')
            ->where('inventario.id_almacen','=',Auth::User()->id_almacen)
            ->paginate(5);
   /*     $inventario=\App\Inventario::where('id_detalle','LIKE','%'.$buscar.'%')->paginate(5);*/
        $inventario->setPath('inventario');
        return view('inventario.index')->with('inventario',$inventario);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(InventarioForm $inventarioForm)
	{
	    $inventario=new\App\Inventario;
        $inventario->almacen=\Request::Input('almacen');
        $inventario->proveedor=\Request::Input('proveedor');
        $inventario->renglon=\Request::Input('renglon');
        $inventario->tipo_renglon=\Request::Input('tipo_renglon');
        $inventario->codigo_fabricante=\Request::Input('codigo_fabricante');
        $inventario->unidad_medida=\Request::Input('unidad_medida');
        $inventario->cantidad=\Request::Input('cantidad');
        $inventario->cantidad_bs=\Request::Input('cantidad_bs');
        $inventario->save();
        Return redirect('inventario')->with('message');
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
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
