<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TipoRenglonesForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class TiporenglonController
 * @package App\Http\Controllers
 * @author Martin Gomes martingomes36@gmail.com
 */
class TiporenglonController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request )
	{
        $buscar=trim($request->Input('buscar'));
        $trenglon=\App\TipoRenglon::where('descrip_tipo_renglon','LIKE','%'.$buscar.'%')
                                    ->where('id_almacen','=',Auth::User()->id_almacen)
                                    ->paginate(5);
        $trenglon->setPath('tiporenglon');
		return view('tiporenglon.index')->with('trenglon',$trenglon);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tiporenglon.crear');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TipoRenglonesForm $tipoRenglonesForm)
	{
        $trenglon= new \App\TipoRenglon();
        $trenglon->id_almacen=Auth::User()->id_almacen;
        $trenglon->descrip_tipo_renglon=\Request::Input('descripcion');
        $trenglon->save();
        return redirect('tiporenglon')->with('message','Se ha Añadido un Nuevo Tipo de Renglon');
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
		$trenglon=\App\TipoRenglon::find($id);
        return view('tiporenglon.editar')->with('trenglon',$trenglon);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $trenglon=\App\TipoRenglon::find($id);
        $trenglon->descrip_tipo_renglon=\Request::Input('descripcion');
        $trenglon->save();
        return redirect('tiporenglon')->with('message','Se ha editado el registro');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$trenglon=\App\TipoRenglon::find($id);
        $trenglon->delete();
        return redirect('tiporenglon')->with('message','Borrado');
	}

}
