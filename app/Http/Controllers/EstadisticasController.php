<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

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
      /*  $report=[];*/
        $esta =" SELECT ofic.descrip_oficina as oficina,
                COALESCE ((SELECT count(id_oficina)
                     from solicitudes_almacen
                       Where id_oficina = ofic.id_oficina
                       GROUP BY ofic.descrip_oficina),
                       0) as cantidad
                FROM oficinas ofic
                ORDER BY oficina ASC";
        $consulta=DB::select($esta);


         /*   foreach($consulta as $report)
            {
                $report =  [$report->oficina . $report->cantidad];
            }*/


        return view('estadisticas.pie')->with('oficina',$consulta);

        /*$datos=array();
        $datos_leyenda =array();
        $datos_suma =array();*/

 /*       foreach ($esta as $fila)
        {
            array_push($datos_leyenda, $fila['oficina']);
            array_push($datos, array($fila['oficina'], (int) $fila['cantidad']));
            array_push($datos_suma, (int) $fila['cantidad']);
        }*/
        /*$total=array_sum($datos_suma);*/

        /*return view('estadisticas.pie')->with('consulta',$esta);*/
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
