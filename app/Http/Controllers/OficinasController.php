<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\OficinasForm;

use Illuminate\Http\Request;

/**
 * Class OficinasController
 * @package App\Http\Controllers
 * @author Martin Gomes martingomes36@gmail.com
 */
class OficinasController extends Controller {

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
        $oficinas = \App\Oficinas::where('descrip_oficina','LIKE', '%' .$buscar . '%')->paginate(10);
        $oficinas->setPath('oficina');
        return view('oficinas.index')->with('oficinas', $oficinas);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('oficinas.crear');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(OficinasForm $oficinasForm)
	{
		$oficinas=new\App\Oficinas;
        $oficinas->descrip_oficina=\Request::Input('descripcion');
        $oficinas->save();
        return redirect('oficina')->with('message','post saved');
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
		$oficina=\App\Oficinas::find($id);
        return view('oficinas.editar')->with('oficina',$oficina);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$oficinas=\App\Oficinas::find($id);
        $oficinas->descrip_oficina=\Request::Input('descripcion');
        $oficinas->save();
        return redirect ('oficina');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$oficinas=\App\Oficinas::find($id);
        $oficinas->delete();
        return redirect('oficinas')->with('message','Se ha borrado un registro');
	}
}
