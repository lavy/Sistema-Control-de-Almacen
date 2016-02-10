<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TecnicosForm;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

/**
 * Class TecnicosController
 * @package App\Http\Controllers
 * @author Martin Gomes martingomes36@gmail.com
 */
class TecnicosController extends Controller {


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
        $tecnicos=\App\Tecnico::where('nombres_apellidos','LIKE','%'.$buscar.'%')->paginate(5);
        $tecnicos->setPath('tecnico');
		return view('tecnicos.index')->with('tecnicos',$tecnicos);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('tecnicos.crear');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TecnicosForm $tecnicosForm)
	{
        $foto_tecnico=Input::file('foto_t');
        $ruta=public_path().'/tecnicos/';
        $url_foto=$foto_tecnico->getClientOriginalName();
        $subir=$foto_tecnico->move($ruta,$foto_tecnico->getClientOriginalName());

        $tecnicos=new \App\Tecnico();
        $tecnicos->nombres_apellidos=\Request::input('nombre_tecnico');
        $tecnicos->cedula=\Request::input('cedula');
        $tecnicos->fecha_nacimiento=date("Y-m-d",strtotime(\Request::input('fecha_nacimiento')));
        $tecnicos->foto_tecnico=$url_foto;
        $tecnicos->save();
        return redirect('tecnico')->with('message','Se ha registrado un tecnico exitosamente');
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
		$tecnicos=\App\Tecnico::find($id);
        /*$estatus=\App\Estatus::all()->lists('descrip_estatus','id_estatus');*/
        return view('tecnicos.editar')->with(['tecnicos'=>$tecnicos]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $foto_tecnico=Input::file('foto_t');
        $ruta=public_path().'/tecnicos/';
        $url_foto=$foto_tecnico->getClientOriginalName();
        $subir=$foto_tecnico->move($ruta,$foto_tecnico->getClientOriginalName());

        $tecnicos=\App\Tecnico::find($id);
        $tecnicos->nombres_apellidos=\Request::input('nombre_tecnico');
        $tecnicos->cedula=\Request::input('cedula');
        $tecnicos->estatus=\Request::input('estatus');
        $tecnicos->foto_tecnico=$url_foto;
        $tecnicos->save();
        return redirect('tecnico')->with('message','Se ha Actualizado el registro satisfactoriamente');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tecnicos=\App\Tecnico::find($id);
        $tecnicos->delete();
        return redirect('tecnicos')->with('message','Se ha Borrado Satisfactoriamente');
	}

}
