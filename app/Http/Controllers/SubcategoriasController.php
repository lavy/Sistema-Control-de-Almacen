<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SubcategoriasController extends Controller {

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
        $subcategorias=\App\Subcategorias::paginate(2);
        $subcategorias->setPath('subcategorias');
        return view('subcategorias.index')->with('subcategorias',$subcategorias);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $categoria=\App\Categoria::all()->lists('descrip_categoria','id_categoria');
		return view('subcategorias.crear')->with('categoria',$categoria);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$subcategoria= new \App\Subcategorias();
        $subcategoria->id_categoria=\Request::Input('categoria');
        $subcategoria->descrip_subcategoria=\Request::Input('descripcion');
        $subcategoria->save();
        return redirect('subcategorias')->with('message','guardado');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subcategorias=\App\Subcategorias::find($id);
        return view('subcategorias.editar')->with('subcat',$subcategorias);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$subcategorias=\App\Subcategorias::find($id);
        $subcategorias->descrip_subcategoria=\Request::Input('descripcion');
        $subcategorias->save();
        return redirect('subcategorias')->with('message','Edición Exitosa');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$subcategorias=\App\Subcategorias::find($id);
        $subcategorias->delete();
        return redirect('subcategorias')->with('message','borrado exitosamente');
	}

}
