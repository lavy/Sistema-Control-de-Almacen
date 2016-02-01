<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DepartamentosController extends Controller {

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
        $departamentos=\App\Departamentos::where('descrip_departamento','LIKE','%'.$buscar.'%')->paginate(10);
        $departamentos->setPath('departamento');
        return view('departamentos.index')->with('departamentos',$departamentos);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $oficina=\App\Oficinas::all()->lists('descrip_oficina','id_oficina');
		return view('departamentos.crear')->with('oficina',$oficina);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$departamentos=new\App\Departamentos();
        $departamentos->id_oficina=\Request::Input('oficina');
        $departamentos->descrip_departamento=\Request::Input('descripcion');
        $departamentos->save();
        return redirect('departamento')->with('message','Post Saved');
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
		$departamento=\App\Departamentos::find($id);
        return view('departamentos.editar')->with('departamento',$departamento);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$departamento=\App\Departamentos::find($id);
        $departamento->descrip_departamento=\Request::Input('descripcion');
        $departamento->save();
        return redirect('departamento')->with('message','El registro fue editado Exitosamente');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$departamento=\App\Departamentos::find($id);
        $departamento->delete();
        return redirect('departamentos')->with('message','Borrado');
	}

}
