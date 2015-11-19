<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NivelUsuarioForm;

class NivelesController extends Controller {

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
        $nivel=\App\UserLevel::where('UserLevelName','LIKE','%'.$buscar.'%')->paginate(5);
        $nivel->setPath('niveles');
        return view('niveles.index')->with('nivel',$nivel);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('niveles.crear');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(NivelUsuarioForm $nivelUsuarioForm)
	{
        $nivel = new \App\UserLevel();
        $nivel->UserLevelID = \Request::Input('nivel_usuario');
        $nivel->UserLevelName = \Request::Input('nombre_nivel');
        $nivel->save();
        return redirect('niveles');
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
		$nivel=\App\UserLevel::find($id);
        return view('niveles.editar')->with('nivel',$nivel);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$nivel=\App\UserLevel::find($id);
        $nivel->UserLevelID=\Request::input('nivel_usuario');
        $nivel->UserLevelName=\Request::input('nombre_nivel');
        $nivel->save();
        return redirect('niveles')->with('message','Se ha actualizado el registro');
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
