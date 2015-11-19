<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Inventario_Seriales;
use App\RenglonesSeriales;
use App\Tecnico;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Security\Core\User\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DetallesForm;

class DespachosController extends Controller {

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

        $orden = DB::table('detalle_planilla_orden')
            ->join('almacen', 'detalle_planilla_orden.id_almacen', '=', 'almacen.id_almacen')
            ->join('renglones', 'detalle_planilla_orden.id_renglon', '=', 'renglones.id_renglon')
            ->select('detalle_planilla_orden.*', 'almacen.descrip_almacen', 'renglones.descrip_renglon')
            ->where('id_orden','LIKE','%'.$buscar.'%')->where('detalle_planilla_orden.cod_usua','=',Auth::User()->cod_usua)->paginate(5);
      /*  $orden=\App\DetalleOrden::where('id_orden','LIKE','%'.$buscar.'%')
            ->where('cod_usua','=',Auth::User()->cod_usua)
            ->paginate(5);*/
        $orden->setPath('despacho');
		return view('despacho.index')->with(['orden'=>$orden]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        //
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
        $detalle=\App\DetalleOrden::find($id);
        $det=DB::select("SELECT i.cantidad_existencia,i.existencia_minima
                            FROM detalle_planilla_orden d
                            JOIN inventario i
                            ON i.id_renglon=d.id_renglon
                            AND d.id_transaccion=".$id);


        /*$solic= DB::table('solicitudes_almacen')
            ->join('detalle_planilla_orden','solicitudes_almacen.id_solicitud','=','detalle_planilla_orden.id_solicitud')
            ->join('oficinas','solicitudes_almacen.id_oficina','=','oficinas.id_oficina')
            ->join('departamentos','solicitudes_almacen.id_departamento','=','departamentos.id_departamento')
            ->select('oficinas.descrip_oficina','departamentos.descrip_departamento','solicitudes_almacen.pedido')
            ->where('detalle_planilla_orden.id_transaccion','=',$id)
            ->get();*/
       /* dd($det);*/
        /*$tecnico=Tecnico::only('estatus');*/
        $seriales=Inventario_Seriales::where('estatus','=','Stock')->lists('serial','id_serial');
        $tecnicos = \App\Tecnico::where('estatus','=','Activo')->lists('nombres_apellidos', 'id_tecnico');
        $tecnico=array_unshift($tecnicos,'Seleccione...');

        return view('despacho.detalle')->with(['detalles'=>$detalle,'deta'=>$det,'tecnicos'=>$tecnicos,'seriales'=>$seriales]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, DetallesForm $detallesForm)
	{
        $despacho=\App\DetalleOrden::find($id);
        $despacho->id_solicitud=\Request::Input('nro_solicitud');
        $despacho->id_orden=\Request::Input('nro_orden');
        $despacho->id_almacen=\Request::Input('nro_almacen');
        $despacho->id_renglon=\Request::Input('articulo');
        $despacho->id_tecnico=\Request::Input('tecnico');
        $despacho->cantidad=\Request::Input('cantidad');
        if(Auth::User())
        {
            $despacho->cod_usua=Auth::User()->cod_usua;
        }
        $despacho->save();
        return redirect('despacho')->with('message','Se ha Generado la Planilla de su Orden');
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


    public function invoice($id)
    {
        $despacho=\App\Orden::find($id);

        $tabla = DB::table('detalle_planilla_orden')
            ->join('renglones', 'detalle_planilla_orden.id_renglon', '=', 'renglones.id_renglon')
            ->select('detalle_planilla_orden.*', 'renglones.descrip_renglon', 'renglones.cantidad',
                    'renglones.unidad_medida', 'renglones.descrip_renglon')
            ->where('detalle_planilla_orden.id_orden','=',$id)->get();


        $jefe=DB::select("SELECT MAX(j.fecha_ingreso) as fecha,j.nombre,j.cedula,o.descrip_oficina
                          from jefes j
                          join oficinas o
                          on j.id_oficina=o.id_oficina;");

        $usuario=DB::select("SELECT u.ci_usua,u.nombre,u.apellido,u.cargo
                            FROM users u
                            JOIN planilla_orden p
                            ON p.cod_usua=u.cod_usua
                            AND p.id_orden=".$id);

        $beneficiarios = DB::table('planilla_orden')
            ->join('solicitudes_almacen', 'planilla_orden.id_solicitud', '=', 'solicitudes_almacen.id_solicitud')
            ->select('solicitudes_almacen.beneficiario', 'solicitudes_almacen.telef_beneficiario',
                'solicitudes_almacen.email')
            ->where('planilla_orden.id_orden','=',$id)->get();

        $tecnicos=DB::table('planilla_orden')
                ->join('tecnicos','planilla_orden.id_tecnico','=','tecnicos.id_tecnico')
                ->select('tecnicos.nombres_apellidos','tecnicos.cedula')
                ->where('planilla_orden.id_orden','=',$id)->get();

        $view =  \View::make('despacho.acta_entrega')->with(['despacho'=>$despacho,'jefe'=>$jefe,'usuario'=>$usuario,
            'beneficiario'=>$beneficiarios,'tabla'=>$tabla,'tecnicos'=>$tecnicos])->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }



}
