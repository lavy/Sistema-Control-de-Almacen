<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProveedorForm;
use Illuminate\Http\Request;

class ProveedorController extends Controller {

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
		$proveedor=\App\Proveedor::where('nombre_proveedor','LIKE','%'.$buscar.'%')->paginate(5);
        $proveedor->setPath('proveedor');
        return view('proveedores.index')->with('proveedor',$proveedor);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('proveedores.crear');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ProveedorForm $proveedorForm)
	{
        $proveedor=new \App\Proveedor;
        $proveedor->nombre_proveedor=\Request::Input('nombre_proveedor');
        $proveedor->contacto=\Request::Input('contacto');
        $proveedor->telef_proveedor=\Request::Input('telefono_proveedor');
        $proveedor->telef_contacto=\Request::Input('telefono_contacto');
        $proveedor->email=\Request::Input('email');
        $proveedor->save();
        return redirect('proveedor')->with('message','Se ha Creado un Nuevo Proveedor');
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
		$proveedor=\App\Proveedor::find($id);
        return view('proveedores.editar')->with('proveedor',$proveedor);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $proveedor=\App\Proveedor::find($id);
        $proveedor->nombre_proveedor=\Request::Input('nombre_proveedor');
        $proveedor->contacto=\Request::Input('contacto');
        $proveedor->telef_proveedor=\Request::Input('telefono_proveedor');
        $proveedor->telef_contacto=\Request::Input('telefono_contacto');
        $proveedor->email=\Request::Input('email');
        $proveedor->save();
        return redirect('proveedor')->with('message','Se ha Editado un Proveedor');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$proveedor=\App\Proveedor::find($id);
        $proveedor->delete();
        return redirect('proveedor')->with('message');
	}

}
