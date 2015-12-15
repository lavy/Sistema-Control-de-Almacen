<?php namespace App\Http\Controllers;

use App\DetalleOrden;
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
use Illuminate\Support\Facades\Input;

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


        /*$det=DB::table('detalle_planilla_orden')
                ->join('inventario','detalle_planilla_orden.id_renglon','=','inventario.id_renglon')
                ->select('inventario.cantidad_existencia','inventario.existencia_minima')
                ->where('detalle_planilla_orden.id_transaccion','=',$id)->get();
        */
        /*$solic= DB::table('solicitudes_almacen')
            ->join('detalle_planilla_orden','solicitudes_almacen.id_solicitud','=','detalle_planilla_orden.id_solicitud')
            ->join('oficinas','solicitudes_almacen.id_oficina','=','oficinas.id_oficina')
            ->join('departamentos','solicitudes_almacen.id_departamento','=','departamentos.id_departamento')
            ->select('oficinas.descrip_oficina','departamentos.descrip_departamento','solicitudes_almacen.pedido')
            ->where('detalle_planilla_orden.id_transaccion','=',$id)
            ->get();*/
       /* dd($det);*/
        /*$tecnico=Tecnico::only('estatus');*/
        /*$seriales= DB::table('inventario_seriales')
            ->join('detalle_planilla_orden','inventario_seriales.id_renglon','=','detalle_planilla_orden.id_renglon')
            ->select('serial','id_serial')
            ->where('inventario_seriales.estatus','=','Stock')
            ->where('detalle_planilla_orden.id_transaccion','=',$id)
            ->get();*/
        /*dd($seriales);*/

        /*$seriales=DB::select('SELECT i.serial,i.id_serial
                    FROM inventario_seriales i
                    JOIN detalle_planilla_orden d
                    ON d.id_renglon=i.id_renglon
                    WHERE d.id_orden='.$id);*/

        /*dd($seriales);*/

        /*$transaccion=DB::select('SELECT id_transaccion FROM detalle_planilla_orden WHERE id_transaccion='.$id);
            dd($transaccion);*/
        $seriales=Inventario_Seriales::where('estatus','=','Stock')->lists('serial','id_serial');

        $tecnicos = Tecnico::where('estatus','=','Activo')->lists('nombres_apellidos', 'id_tecnico');
        $tecnico=array_unshift($tecnicos,'Seleccione...');

        return view('despacho.detalle')->with(['detalles'=>$detalle,'deta'=>$det,'tecnicos'=>$tecnicos,'seriales'=>$seriales]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, DetallesForm $detallesForm,Request $request)
    {
        /*$serial=$request->input('serial');
        dd($serial);*/
        /*dd($serial=Input::get('serial'));*/

        $serial = Input::get('serial');
        $cantidad=count($serial);

       /* $tipo_solicitud = DB::select("SELECT s.tipo_solicitud
                    FROM solicitudes_almacen s
                    JOIN detalle_planilla_orden d
                    ON s.id_solicitud=d.id_solicitud
                    AND d.id_transaccion=".$id);*/

            for($i=0;$i<=$cantidad;$i++) {

                DB::table('inventario_seriales')
                    ->where('id_serial', $serial)
                    ->update(['estatus' => 'Asignacion']);
            }




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


    public function planilla($id)
    {
        $despacho=\App\Orden::find($id);

        $tabla = DB::table('detalle_planilla_orden')
            ->join('renglones', 'detalle_planilla_orden.id_renglon', '=', 'renglones.id_renglon')
            ->select('detalle_planilla_orden.*', 'renglones.descrip_renglon', 'detalle_planilla_orden.cantidad',
                    'renglones.unidad_medida', 'renglones.descrip_renglon')
            ->where('detalle_planilla_orden.id_orden','=',$id)->get();

        $jefe=DB::select("SELECT MAX(j.fecha_ingreso) AS fecha,j.nombre,j.cedula,o.descrip_oficina
                          FROM jefes j
                          JOIN oficinas o
                          ON j.id_oficina=o.id_oficina;");

        $usuario=DB::select("SELECT u.ci_usua,u.nombre,u.apellido,u.cargo
                            FROM users u
                            JOIN planilla_orden p
                            ON p.cod_usua=u.cod_usua
                            AND p.id_orden=".$id);

        $oficinas=DB::table('planilla_orden')
            ->join('almacen','planilla_orden.id_almacen','=','almacen.id_almacen')
            ->join('oficinas','planilla_orden.id_oficina','=','oficinas.id_oficina')
            ->join('departamentos','planilla_orden.id_departamento','=','departamentos.id_departamento')
            ->select('almacen.descrip_almacen','oficinas.descrip_oficina','departamentos.descrip_departamento')
            ->where('planilla_orden.id_orden','=',$id)->get();

        $beneficiarios = DB::table('planilla_orden')
            ->join('solicitudes_almacen', 'planilla_orden.id_solicitud', '=', 'solicitudes_almacen.id_solicitud')
            ->select('solicitudes_almacen.beneficiario', 'solicitudes_almacen.telef_beneficiario',
                'solicitudes_almacen.email')
            ->where('planilla_orden.id_orden','=',$id)->get();

        $tecnicos=DB::table('planilla_orden')
                ->join('tecnicos','planilla_orden.id_tecnico','=','tecnicos.id_tecnico')
                ->select('tecnicos.nombres_apellidos','tecnicos.cedula')
                ->where('planilla_orden.id_orden','=',$id)->get();

        /*$tecnicos = \App\Tecnico::with('planilla_orden')->where('id_orden','=',$id)->where('tecnicos.id_tecnico','=','planilla_orden.id_tecnico')->get();*/


        $view =  \View::make('despacho.acta_entrega')->with(['despacho'=>$despacho,'jefe'=>$jefe,'usuario'=>$usuario,
            'beneficiario'=>$beneficiarios,'tabla'=>$tabla,'tecnicos'=>$tecnicos,'oficinas'=>$oficinas])->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('planilla');
    }
}
