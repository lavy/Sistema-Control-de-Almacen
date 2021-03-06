<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Inventario_Seriales;
use Illuminate\Http\Request;

/**
 * Class SerialesController
 * @package App\Http\Controllers
 * @author Martin Gomes martingomes36@gmail.com
 */
class SerialesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id, Request $request)
	{
        $buscar=trim($request->input('buscar'));
        $seriales= DB::table('inventario_seriales')
            ->join('renglones', 'inventario_seriales.id_renglon', '=', 'renglones.id_renglon')
            ->select('inventario_seriales.*')
            ->where('inventario_seriales.serial','LIKE','%'.$buscar.'%')
            ->where('inventario_seriales.id_renglon','=',$id)
            ->paginate(5);

        /*$seriales=Inventario_Seriales::where('serial','LIKE','%'.$buscar.'%')->paginate(10);*/
        $seriales->setPath('seriales');
        return view('seriales.index')->with('serial',$seriales);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $seriales=Inventario_Seriales::find($id);
        return view('seriales.editar')->with('serial',$seriales);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $seriales=Inventario_Seriales::find($id);
        $seriales->serial=\Request::Input('serial');
        $seriales->save();
        return redirect('renglones')->with('message','Se ha editado un serial');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $seriales=Inventario_Seriales::find($id);
        $seriales->delete();
        return redirect('seriales')->with('message','Se ha borrado el serial'.$id);
	}
}
