<?php namespace App\Http\Controllers;

use App\Categorias;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoriasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $buscar=trim($request->input('buscar'));
        $categoria=\App\Categorias::where('descrip_categoria','LIKE','%'.$buscar.'%')->paginate(5);
        $categoria->setPath('categoria');
        return view('categorias.index')->with('categorias',$categoria);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categorias.crear');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$categorias=new Categorias();
        $categorias->descrip_categoria=\Request::Input('categoria');
        $categorias->save();
        return redirect('categoria')->with('message','Se ha creado una nueva categoria');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $categorias=Categorias::find($id);
        return view('categorias.editar')->with('categorias',$categorias);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $categorias=Categorias::find($id);
        $categorias->descrip_categoria=\Request::Input('categoria');
        $categorias->save();
        return redirect('categoria')->with('message','Se ha editado una categoria exitosamente');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $categorias=Categorias::find($id);
        $categorias->delete();
        return redirect('categoria')->with('message','Se ha eliminado una categoria exitosamente');
	}

}
