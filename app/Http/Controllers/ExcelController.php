<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Renglon;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ExcelController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function renglon()
	{
        Excel::create('Entrada de Articulos al'.Carbon::now()->format('d-m-Y').'', function($excel) {

            $excel->sheet('Productos', function($sheet) {

                $products=DB::table('inventario_seriales')
                    ->join('renglones','inventario_seriales.id_renglon','=','renglones.id_renglon')
                    ->select('inventario_seriales.estatus','inventario_seriales.serial',
                        'inventario_seriales.id_serial','renglones.descrip_renglon')
                    ->get();

                foreach($products as $product)
                {
                    $sheet->appendRow(array($product->id_serial,
                        $product->serial,
                        $product->estatus,
                        $product->descrip_renglon
                    ));
                }
            });
        })->export('xls');
	}

   	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function inventario()
	{
        Excel::create('Productos en inventario al'.Carbon::now()->format('d-m-Y').'', function($excel) {

            $excel->sheet('Productos', function($sheet) {

                $products=DB::table('inventario_seriales')
                    ->join('inventario','inventario_seriales.id_detalle','=','inventario.id_detalle')
                    ->join('renglones','inventario_seriales.id_renglon','=','renglones.id_renglon')
                    ->where('inventario_seriales.estatus','=','Stock')
                    ->select('inventario_seriales.*','inventario.*','renglones.descrip_renglon')
                    ->get();

                foreach($products as $product)
                {
                    $sheet->appendRow(array($product->id_detalle,
                        $product->descrip_renglon,
                        $product->serial,
                        $product->unidad_medida,
                        $product->estatus,
                        $product->cantidad_existencia
                    ));
                }
            });
        })->export('xls');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function obtener()
	{
		//
	}



    public function import()
    {
        Excel::load('public/books.csv', function($reader) {

            foreach ($reader->get() as $book) {
                Renglon::create([
                    'descrip_renglon' => $book->id_tipo_,
                    'id_marca' =>$book->unidad_medida,
                    'id_modelo' =>$book->cantidad,
                    'unidad_medida' =>$book->unidad_medida,
                    'cantidad' =>$book->cantidad,
                    'existencia_minima' =>$book->existencia_minima,
                    'foto_producto' =>$book->foto_producto,
                    'cod_usua' =>$book->cod_usua,
                ]);
            }
        });
        return Renglon::all();
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
