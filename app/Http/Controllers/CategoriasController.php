<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\OficinasForm;
use Illuminate\Http\Request;

class CategoriasController extends Controller {

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
		$categorias=\App\Categoria::where('descrip_categoria','LIKE','%'.$buscar.'%')->paginate(4);
        $categorias->setPath('categorias');
        return view('categorias.index')->with('categorias',$categorias);
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
	public function store(OficinasForm $oficinasForm)
	{
		$categoria=new \App\Categoria();
        $categoria->descrip_categoria=\Request::Input('descripcion');
        $categoria->save();
        return redirect('categoria')->with('message','post saved');
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
		$categoria=\App\Categoria::find($id);
        return view('categorias.editar')->with('categoria',$categoria);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$categoria=\App\Categoria::find($id);
        $categoria->descrip_categoria=\Request::Input('descripcion');
        $categoria->save();
        return redirect('categoria');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$categoria=\App\Categoria::find($id);
        $categoria->delete();
        return redirect('categorias')->with('message','borrado');
	}

}
