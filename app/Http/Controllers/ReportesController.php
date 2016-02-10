<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

/**
 * Class ReportesController
 * @package App\Http\Controllers
 * @author Martin Gomes martingomes36@gmail.com
 */
class ReportesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function oficinas(Request $request)
	{
        $buscar=trim($request->input('buscar'));

        $oficina =DB::select(" SELECT ofic.descrip_oficina as oficina,
                COALESCE ((SELECT count(id_oficina)
                     from solicitudes_almacen
                       Where id_oficina = ofic.id_oficina
                       GROUP BY ofic.descrip_oficina),
                       0) as cantidad
                FROM oficinas ofic
                ORDER BY cantidad ASC");

        return view('reportes.oficina')->with('oficinas',$oficina);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function departamentos(Request $request)
	{
        $buscar=trim($request->input('buscar'));
        $departamento =DB::select(" SELECT dept.descrip_departamento as departamento,
                COALESCE ((SELECT COUNT(id_departamento)
                     FROM solicitudes_almacen
                       WHERE id_departamento = dept.id_departamento
                       GROUP BY dept.descrip_departamento),
                       0) as cantidad
                FROM departamentos dept
                WHERE dept.descrip_departamento='%'.$buscar.'%'
                ORDER BY departamento ASC");

        /*$departamento= DB::select("SELECT s.id_departamento,d.descrip_departamento, COUNT(s.id_departamento) as departamento
          FROM solicitudes s
          JOIN departamentos d
          on d.id_departamento=s.id_departamento");*/
        return view('reportes.departamento')->with('departamento',$departamento);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function prestamos()
	{
        $prestamos= DB::select("SELECT ofic.descrip_oficina as oficina,
                COALESCE ((SELECT count(tipo_solicitud)
                     from solicitudes_almacen
                       WHERE tipo_solicitud='Prestamo'
                       AND id_oficina = ofic.id_oficina
                       GROUP BY ofic.descrip_oficina),
                       0) as cantidad_prestamos
                FROM oficinas ofic
                ORDER BY oficina DESC");
        return view('reportes.prestamo')->with('prestamos',$prestamos);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function demanda()
	{
        $demanda=DB::select(" SELECT ren.descrip_renglon as articulo,
                COALESCE ((SELECT count(id_renglon)
                     from solicitudes_almacen
                       Where id_renglon = ren.id_renglon
                       GROUP BY ren.id_renglon),
                       0) as cantidad
                FROM renglones ren
                ORDER BY cantidad ASC");



		return view('reportes.productos')->with('demandas',$demanda);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function inventario(Request $request)
	{
        $buscar=trim($request->input('buscar'));
		$inventario=\App\HistoricoInventario::where('fecha_movimiento','LIKE','%'.$buscar.'%')->paginate(5);
        $inventario->setPath('reportes/inventario');
        return view('reportes.inventario')->with('inventario',$inventario);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function salidas(Request $request)
	{
		$buscar=trim($request->input('buscar'));
        $salidas=\App\Despachos::where('id_renglon','LIKE','%'.$buscar.'%')->paginate(5);
        $salidas->setPath('reportes/salidas');
        return view('reportes.salidas')->with('salidas',$salidas);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function asignados(Request $request)
	{
		$buscar=trim($request->input('buscar'));
        $asignados=DB::table('detalle_planilla_orden')
            ->join('solicitudes_almacen','detalle_planilla_orden.id_solicitud','=','solicitudes_almacen.id_solicitud')
            ->select('solicitudes_almacen.*','detalle_planilla_orden.*')
            ->where('solicitudes_almacen.tipo_solicitud','=','Asignacion')
            /*->where('solicitudes_almacen.beneficiario','LIKE','%'.$buscar.'%')*/
            ->get();
        return view('reportes.asignados')->with('asignados',$asignados);
	}

    public function prestados(Request $request)
    {
        $buscar=($request->input('buscar'));
        $prestados=DB::table('detalle_planilla_orden')
            ->join('solicitudes_almacen','detalle_planilla_orden.id_solicitud','=','solicitudes_almacen.id_solicitud')
            ->select('solicitudes_almacen.*','detalle_planilla_orden.*')
            ->where('solicitudes_almacen.tipo_solicitud','=','Prestamo')
            /*->where('solicitudes_almacen.beneficiario','LIKE','%'.$buscar.'%')*/
            ->get();
        return view('reportes.prestados')->with('prestados',$prestados);
    }

}
