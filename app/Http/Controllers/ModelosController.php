<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ModelosForm;
use Illuminate\Http\Request;

class ModelosController extends Controller {

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
		$modelos=\App\Modelo::where('descrip_modelo','LIKE','%'.$buscar.'%')->paginate(5);
        $modelos->setPath('modelos');
        return view('modelos.index')->with('modelos',$modelos);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $marca=\App\Marca::all()->lists('descrip_marca','id_marca');
//        array_unshift($marca,'Por Favor Seleccione una marca');
        return view('modelos.crear')->with('marca',$marca);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ModelosForm $modelosForm)
    {
        $modelos = new \App\Modelo();
        $modelos->id_marca=\Request::Input('marca');
        $modelos->descrip_modelo=\Request::Input('descripcion');
        $modelos->save();
        return redirect('modelos')->with('message','Post saved');
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
        $modelos=\App\Modelo::find($id);
        $modelos->delete();
        return redirect('modelos')->with('message','Borrado');
	}

}
