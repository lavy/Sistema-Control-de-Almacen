<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RenglonesForm;
use App\Renglon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RenglonController extends Controller {

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
        $buscar=$request->Input('buscar');
        $renglon = DB::table('renglones')
            ->join('tipo_renglones', 'renglones.id_tipo_renglon', '=', 'tipo_renglones.id_tipo_renglon')
            ->join('marca', 'renglones.id_marca', '=', 'marca.id_marca')
            ->join('modelo', 'renglones.id_modelo', '=', 'modelo.id_modelo')
            /*->join('unidades_medidas','renglones.id_unidad','=','unidades_medidas.id_unidad')*/
            ->select('renglones.*', 'tipo_renglones.descrip_tipo_renglon', 'marca.descrip_marca','modelo.descrip_modelo'/*,
                    'unidades_medidas.descrip_unidad'*/)
            ->where('descrip_renglon','LIKE','%'.$buscar.'%')
            ->where('renglones.id_almacen','=',Auth::User()->id_almacen)
            ->paginate(5);

        $renglon->setPath('renglones');
        return view('renglon.index')->with(['renglones'=>$renglon]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $almacen=\App\Almacen::all()->lists('descrip_almacen','id_almacen');
        $trenglon=\App\TipoRenglon::all()->lists('descrip_tipo_renglon','id_tipo_renglon');
        $marca=\App\Marca::all()->lists('descrip_marca','id_marca');
        $modelo=\App\Modelo::all()->lists('descrip_modelo','id_modelo');
        $unidades=\App\Unidades::all()->lists('descrip_unidad','id_unidad');
        array_unshift($unidades,'Por Favor Seleccione una unidad de medida');
        array_unshift($trenglon,'Por Favor Seleccione un Tipo de Articulo');
        array_unshift($marca,'Por Favor Seleccione una Marca');
		return view('renglon.crear')->with(['almacen'=>$almacen,'trenglon'=>$trenglon,'marca'=>$marca,'modelo'=>$modelo,
        'unidades'=>$unidades]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(RenglonesForm $renglonesForm)
	{
		$renglon= new \App\Renglon();
        /*$seriales=$renglon->serial=\Request::Input('serial');
        $cantidad=count($seriales);*/
        $renglon->id_almacen =Auth::User()->id_almacen;
        $renglon->id_tipo_renglon =\Request::Input('tipo_renglon');
        $renglon->descrip_renglon =\Request::Input('descripcion');
        $renglon->id_marca =\Request::Input('marca');
        $renglon->id_modelo =\Request::Input('modelo');
        $renglon->unidad_medida =\Request::Input('unidad_medida');
        $renglon->cantidad =\Request::input('cantidad');
        $renglon->existencia_minima =\Request::Input('existencia_minima');
        if (Auth::User()) {
           $renglon->cod_usua = Auth::User()->cod_usua;
        }
        $renglon->save();

        $serial=$renglon->serial=\Request::Input('serial');
        foreach($serial as $seriales)
        {
            $renglon=\App\Renglon::find($renglon->id_renglon);
            $renglon->Serial()->attach($seriales);
        }

        /*$serials=new \App\Seriales();
        $serias=$serials->serial=\Request::Input('serial');
        dd($serias);
        foreach($serias as $serialss)
        {
            $serials->serial=$serialss;
        }
        $serials->save();*/

        return redirect('renglones')->with('message','Se ha registrado un Nuevo Articulo');
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
		$renglon=\App\Renglon::find($id);
        return view('renglon.editar')->with('renglon',$renglon);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $renglon=\App\Renglon::find($id);
        $renglon->id_tipo_renglon=\Request::Input('tipo_renglon');
        $renglon->codigo_fabricante=\Request::Input('codigo_fabricante');
        $renglon->descrip_renglon=\Request::Input('descripcion');
        $renglon->id_marca=\Request::Input('marca');
        $renglon->id_modelo=\Request::Input('modelo');
        $renglon->unidad_medida=\Request::Input('unidad_medida');
        $renglon->existencia_minima=\Request::Input('existencia_minima');
        if (auth::User())
        {
            $renglon->cod_usua=Auth::User()->cod_usua;
        }
        $renglon->save();
        return redirect('renglones');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$renglon=\App\Renglon::find($id);
        $renglon->delete();
        return redirect('renglones')->with('message','Borrado');
	}

}