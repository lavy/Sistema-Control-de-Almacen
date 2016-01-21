<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarcasForm;
use Illuminate\Http\Request;

class MarcasController extends Controller {

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
        $buscar=$request->input('buscar');
		$marcas=\App\Marca::where('descrip_marca','LIKE','%'.$buscar.'%')->paginate(5);
        $marcas->setPath('marca');
        return view('marcas.index')->with('marcas',$marcas);
	}

	/**
	 * Show the form for creating a new resource.
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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(MarcasForm $marcasForm)
	{
		$marcas=new \App\Marca();
        $marcas->descrip_marca=\Request::Input('descripcion');
        $marcas->id_proveedor=\Request::Input('proveedor');
        $marcas->save();
        return redirect('marca')->with('message','Se ha Creado una Nueva Marca');
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
		$marca=\App\Marca::find($id);
        return view('marcas.editar')->with('marca',$marca);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$marca=\App\Marca::find($id);
        $marca->descrip_marca=\Request::Input('descripcion');
        $marca->save();
        return redirect('marca')->with('Se ha editado una marca');
	}

	/**
	 * Remove the specified resource from storage.
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
