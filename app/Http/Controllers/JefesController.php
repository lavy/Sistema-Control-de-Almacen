<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Oficinas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\JefesForm;

class JefesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $buscar=$request->input('buscar');
        $jefes=DB::table('jefes')
                ->join('oficinas','jefes.id_oficina','=','oficinas.id_oficina')
                ->select('jefes.*','oficinas.descrip_oficina')
                ->where('jefes.nombre','LIKE','%'.$buscar.'%')
                ->paginate(5);
        $jefes->setPath('jefes');
		return view('jefes.index')->with('jefes',$jefes);
	}

	/**
	 * Show the form for creating a new resource.
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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(JefesForm $jefesForm)
	{
		$jefes= new \App\Jefes();
        $jefes->id_oficina=\Request::input('oficina');
        $jefes->nombre=\Request::input('nombre');
        $jefes->cedula=\Request::input('cedula');
        $jefes->fecha_ingreso=\Request::input('fecha_ingreso');
        $jefes->save();
        return redirect('jefes');
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
		$jefes=\App\Jefes::find($id);
        $oficinas=Oficinas::all()->lists('descrip_oficina','id_oficina');
        return view('jefes.editar')->with(['jefes'=>$jefes,'oficinas'=>$oficinas]);

	}

	/**
	 * Update the specified resource in storage.
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
        $jefes->fecha_ingreso = \Request::input('fecha_ingreso');
        $jefes->save();
        return redirect('jefes')->with('message');

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
