<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ArticulosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $buscar=$request->input('buscar');
        $articulos=\App\Articulos::where('id_articulo','LIKE','%'.$buscar.'%')->paginate(5);
        $articulos->setPath('articulos');
		return view('articulos.index')->with('articulos',$articulos);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $categoria=\App\Categoria::all()->lists('descrip_categoria','id_categoria');
        $marca=\App\Marca::all()->lists('descrip_marca','id_marca');
		return view('articulos.crear')->with(['categoria'=>$categoria,'marca'=>$marca]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        //dd(\Request::Input('mytext'));
        $articulos= new \App\Articulos();
        $serialimei= new \App\SerialImeis();
        $serialimei->id_articulo=\Request::Input('art');
        $articulos->id_categoria=\Request::Input('categoria');
        $articulos->id_subcategoria=\Request::Input('subcategorias');
        $articulos->id_marca=\Request::Input('marca');
        $articulos->id_modelo=\Request::Input('modelos');
        /*$serialimei->serial=\Request::Input('mytext[]');
        $serialimei->imei=\Request::Input('imei[]');*/
        //$articulos->serial=\Request::Input('mytext[]');
        /*$mytext=\Request::Input('mytext[]');*/
        //$articulos->imei=\Request::Input('imei[]');
        /*$imei=\Request::Input('imei[]');*/
        /*$articulos->descrip_articulo=\Request::Input('descrip_articulo');*/
        $articulos->codigo_fabricante=\Request::Input('codigo_fabricante');
        $articulos->existencia=\Request::Input('existencia');
        $articulos->cant_minima=\Request::Input('cant_minima');
        $articulos->unidad_medida=\Request::Input('unidad_medida');
        $imei=\Request::Input('imei');
        $mytext=\Request::Input('mytext');



       foreach($mytext as $text){

           // dd($text);

            $serialimei->serial=$text;
            /*$serialimei->save();*/

        }

        foreach($imei as $ime){
            $serialimei->imei=$ime;

            /*$serialimei->save();*/

        }

        $articulos->save();
        $serialimei->save();
        return redirect('articulos')->with('message','post saved');
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
		$articulos=\App\Articulos::find($id);
        $articulos->delete();
        return redirect('articulos')->with('message','Borrado exitosamente');
	}

}
