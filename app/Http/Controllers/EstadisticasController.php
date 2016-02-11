<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

/**
 * Class EstadisticasController
 * @package App\Http\Controllers
 * @author Martin Gomes martingomes36@gmail.com
 */
class EstadisticasController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {

        $oficina=DB::select("SELECT ofic.descrip_oficina AS oficina,
                            COALESCE ((SELECT COUNT(id_oficina)
                                 FROM solicitudes_almacen
                                   WHERE id_oficina = ofic.id_oficina
                                   GROUP BY ofic.descrip_oficina),
                                   0) AS cantidad
                            FROM oficinas ofic
                            ORDER BY oficina ASC");

        return view('estadisticas.pie')->with('oficina',$oficina);
    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$oficinas=DB::select("SELECT ofic.descrip_oficina AS oficina,
                            COALESCE ((SELECT COUNT(id_oficina)
                                 FROM solicitudes_almacen
                                   WHERE id_oficina = ofic.id_oficina
                                   GROUP BY ofic.descrip_oficina),
                                   0) AS cantidad
                            FROM oficinas ofic
                            ORDER BY oficina ASC");

        $departamento =DB::select(" SELECT dept.descrip_departamento AS departamento,o.descrip_oficina AS oficina,
                COALESCE ((SELECT COUNT(id_departamento)
                     FROM solicitudes_almacen
                       WHERE id_departamento = dept.id_departamento
                       GROUP BY dept.descrip_departamento),
                       0) AS cantidad
                FROM departamentos dept
                JOIN oficinas o
                ON dept.id_oficina=o.id_oficina
                ORDER BY departamento ASC");

        return view('estadisticas.columns')->with(['oficina'=>$oficinas,'departamentos'=>$departamento]);
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
		//
	}

}
