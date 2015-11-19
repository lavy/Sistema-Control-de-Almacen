<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlmacenForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlmacenController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$buscar=$request->input('buscar');

        $almacen=\App\Almacen::where('descrip_almacen','LIKE','%'.$buscar.'%')
                            ->where('id_almacen','=',Auth::User()->id_almacen)
                            ->paginate(5);
        $almacen->setPath('almacen');
        return view('almacenes.index')->with('almacenes',$almacen);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('almacenes.crear');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AlmacenForm $almacenForm)
	{
		$almacen= new \App\Almacen();
        $almacen->descrip_almacen=\Request::input('descripcion');
        $almacen->direccion=\Request::input('direccion');
        $almacen->telefono=\Request::input('telefono');
        $almacen->persona_contacto_almacen=\Request::input('persona_contacto');
        $almacen->telef_contacto_almacen=\Request::input('telef_contacto');
        $almacen->celular_contacto_almacen=\Request::input('celular_contacto');
        $almacen->email_contacto_almacen=\Request::input('correo_contacto');
        if(Auth::User())
        {
            $almacen->cod_usua=Auth::User()->cod_usua;
        }
        $almacen->save();

        return redirect('almacen')->with('message');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $almacen= \App\Almacen::find($id);
        return view('almacenes.editar')->with('almacen',$almacen);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$almacen=\App\Almacen::find($id);
        $almacen->descrip_almacen=\Request::input('descripcion');
        $almacen->direccion=\Request::input('direccion');
        $almacen->telefono=\Request::input('telefono');
        $almacen->persona_contacto_almacen=\Request::input('persona_contacto');
        $almacen->telef_contacto_almacen=\Request::input('telef_contacto');
        $almacen->celular_contacto_almacen=\Request::input('celular_contacto');
        $almacen->email_contacto_almacen=\Request::input('correo_contacto');
        $almacen->save();
        return redirect('almacen')->with('message');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$almacen=\App\Almacen::find($id);
        $almacen->delete();
        return redirect('almacen')->with('message','borrado');
	}

}
