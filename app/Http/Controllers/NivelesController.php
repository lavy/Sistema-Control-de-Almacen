<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NivelUsuarioForm;

/**
 * Class NivelesController
 * @package App\Http\Controllers
 * @author Martin Gomes martingomes36@gmail.com
 */
class NivelesController extends Controller {

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
		$buscar=$request->input('buscar');
        $nivel=\App\UserLevel::where('UserLevelName','LIKE','%'.$buscar.'%')->paginate(5);
        $nivel->setPath('niveles');
        return view('niveles.index')->with('nivel',$nivel);
	}

	/**
	 * Muestra el Formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('niveles.crear');
	}

	/**
	 * Instancia el modelo y crea un nuevo registro.
	 *
	 * @return Response
	 */
	public function store(NivelUsuarioForm $nivelUsuarioForm)
	{
        $nivel = new \App\UserLevel();
        $nivel->UserLevelName = \Request::Input('nombre_nivel');
        $nivel->save();
        return redirect('niveles')->with('message','Se ha agregado un Nuevo Nivel');
	}

	 /**
	 * Muestra el Formulario para la edición del registro correspondiente.
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
	 * Actualiza el registro especificado en la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$nivel=\App\UserLevel::find($id);
        $nivel->UserLevelName=\Request::input('nombre_nivel');
        $nivel->save();
        return redirect('niveles')->with('message','Se ha actualizado el Nivel');
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
