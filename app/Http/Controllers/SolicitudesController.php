<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SolicitudForm;
use App\Http\Controllers\Controller;
use App\Solicitudes_Almacen;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class SolicitudesController extends Controller {

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
        if(Auth::User()->UserLevel !=0) {
            $solicitudes = DB::table('solicitudes')
                ->join('oficinas', 'solicitudes.id_oficina', '=', 'oficinas.id_oficina')
                ->join('departamentos', 'solicitudes.id_departamento', '=', 'departamentos.id_departamento')
                ->select('solicitudes.*', 'oficinas.descrip_oficina', 'departamentos.descrip_departamento')
                ->where('solicitudes.beneficiario', 'LIKE', '%' . $buscar . '%')->where('solicitudes.cod_usua', '=', Auth::User()->cod_usua)->paginate(5);
        }else{
            $solicitudes = DB::table('solicitudes')
                ->join('oficinas', 'solicitudes.id_oficina', '=', 'oficinas.id_oficina')
                ->join('departamentos', 'solicitudes.id_departamento', '=', 'departamentos.id_departamento')
                ->select('solicitudes.*', 'oficinas.descrip_oficina', 'departamentos.descrip_departamento')
                ->where('solicitudes.beneficiario', 'LIKE', '%' . $buscar . '%')->paginate(5);
        }
        $solicitudes->setPath('solicitudes');
        return view('solicitudes.index')->with('solicitudes',$solicitudes);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $oficina=\App\Oficinas::all()->lists('descrip_oficina','id_oficina');
        $tarticulo=\App\TipoRenglon::all()->lists('descrip_tipo_renglon','id_tipo_renglon');
        $marca=\App\Marca::all()->lists('descrip_marca','id_marca');
        array_unshift($tarticulo,'Por Favor Seleccione un Tipo de Artículo');
        array_unshift($oficina,'Por Favor Seleccione una Oficina');
        return view('solicitudes.crear')->with(['oficina'=>$oficina,'t_articulo'=>$tarticulo,'marca'=>$marca]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(SolicitudForm $solicitudForm)
	{
		$solicitud= new\App\Solicitudes();
        $solicitud->id_oficina=\Request::Input('oficina');
        $solicitud->id_departamento=\Request::Input('departamento');
        if(\Request::Input('desde') != NULL && \Request::Input('hasta'))
        {
            $solicitud->desde = date("Y-m-d", strtotime(\Request::Input('desde')));
            $solicitud->hasta = date("Y-m-d", strtotime(\Request::Input('hasta')));
        }
        $solicitud->beneficiario=\Request::Input('nombre_beneficiario');
        $solicitud->telef_beneficiario=\Request::Input('telef_beneficiario');
        $solicitud->email_beneficiario=\Request::Input('email_beneficiario');
        $solicitud->tipo_solicitud=\Request::Input('tipo_solicitud');
        $solicitud->id_renglon=\Request::Input('articulos');
        $solicitud->id_tipo_renglon=\Request::Input('t_articulos');
        $solicitud->pedido=\Request::Input('detalle');
        $solicitud->observaciones=\Request::Input('observaciones');
        $solicitud->estatus='RECIBIDO';
        if (Auth::User())
        {
            $solicitud->cod_usua=Auth::User()->cod_usua;
        }
        $solicitud->save();
        return redirect('solicitudes')->with('message','Se Registro su solicitud exitosamente');
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
		$solicitudes=\App\Solicitudes::find($id);
        $oficina=\App\Oficinas::all()->lists('descrip_oficina','id_oficina');
        $departamento=\App\Departamentos::all()->lists('descrip_departamento','id_departamento');
        $tarticulo=\App\TipoRenglon::all()->lists('descrip_tipo_renglon','id_tipo_renglon');
        $marca=\App\Marca::all()->lists('descrip_marca','id_marca');
        $articulo=\App\Renglon::all()->lists('descrip_renglon','id_renglon');
        return view('solicitudes.editar')->with(['solicitud'=>$solicitudes,'oficina'=>$oficina,'t_articulo'=>$tarticulo
                                                ,'marca'=>$marca,'articulo'=>$articulo,'departamento'=>$departamento]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, SolicitudForm $solicitudForm)
	{
        $solicitud=\App\Solicitudes::find($id);
        $solicitud->id_oficina=\Request::Input('oficina');
        $solicitud->id_departamento=\Request::Input('departamento');
        if(\Request::Input('desde') != NULL && \Request::Input('hasta') !=NULL)
        {
        $solicitud->desde=date("Y-m-d", strtotime(\Request::Input('desde')));
        $solicitud->hasta=date("Y-m-d",strtotime(\Request::Input('hasta')));
        }
        $solicitud->beneficiario=\Request::Input('nombre_beneficiario');
        $solicitud->telef_beneficiario=\Request::Input('telef_beneficiario');
        $solicitud->email_beneficiario=\Request::Input('email_beneficiario');
        $solicitud->tipo_solicitud=\Request::Input('tipo_solicitud');
        $solicitud->id_renglon=\Request::Input('articulos');
        $solicitud->id_tipo_renglon=\Request::Input('t_articulos');
        $solicitud->pedido=\Request::Input('detalle');
        $solicitud->observaciones=\Request::Input('observaciones');
        /*$solicitud->estatus='';*/
        if (Auth::User())
        {
            $solicitud->cod_usua=Auth::User()->cod_usua;
        }
        $solicitud->save();
        return redirect('solicitudes')->with('message','Se ha transferido su solicitud exitosamente');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$solicitud=\App\Solicitudes::find($id);
        $solicitud->delete();
        return redirect('solicitudes')->with('message','Su solicitud se ha transferido de forma exitosa');
	}

    public function transferir($id)
    {
        $solicitud=\App\Solicitudes::find($id);
        return view('solicitudes.transferir')->with('solicitudes',$solicitud);

    }

    public function procesadas(Request $request)
    {
        $buscar=$request->input('buscar');
        if(Auth::User()->UserLevel !=0) {
            $solicitudes=\App\Solicitudes_Almacen::where('beneficiario', 'LIKE', '%' . $buscar . '%')
                ->where('solicitudes_almacen.cod_usua', '=', Auth::User()->cod_usua)->paginate(5);
        }else{
            $solicitudes = \App\Solicitudes_Almacen::where('beneficiario', 'LIKE', '%' . $buscar . '%')->paginate(5);
        }
        $solicitudes->setPath('solicitudes_procesadas');
        return view('solicitudes.procesadas')->with('solicitudes',$solicitudes);
    }

}
