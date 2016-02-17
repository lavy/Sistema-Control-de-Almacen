<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RenglonesForm;
use App\Inventario_Seriales;
use App\Renglon;
use App\Seriales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

/**
 * Class RenglonController
 * @package App\Http\Controllers
 * @author Martin Gomes martingomes36@gmail.com
 */
class RenglonController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
	 * Muestra una lista de todos los registros.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $buscar=trim($request->Input('buscar'));
        $renglon = DB::table('renglones')
            ->join('tipo_renglones', 'renglones.id_tipo_renglon', '=', 'tipo_renglones.id_tipo_renglon')
            ->join('marca', 'renglones.id_marca', '=', 'marca.id_marca')
            ->join('modelo', 'renglones.id_modelo', '=', 'modelo.id_modelo')
            ->select('renglones.*', 'tipo_renglones.descrip_tipo_renglon', 'marca.descrip_marca','modelo.descrip_modelo')
            ->where('descrip_renglon','LIKE','%'.$buscar.'%')
            ->where('renglones.id_almacen','=',Auth::User()->id_almacen)
            ->paginate(5);

        $renglon->setPath('renglones');
        return view('renglon.index')->with(['renglones'=>$renglon]);
	}

	/**
	 * Muestra el Formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
        $almacen=\App\Almacen::all()->lists('descrip_almacen','id_almacen');
        $trenglon=\App\TipoRenglon::all()->lists('descrip_tipo_renglon','id_tipo_renglon');
        $marca=\App\Marca::all()->lists('descrip_marca','id_marca');
        $modelo=\App\Modelo::all()->lists('descrip_modelo','id_modelo');
        $unidades=\App\Unidades::all()->lists('descrip_unidad','id_unidad');
        array_unshift($unidades,'Por Favor Seleccione una unidad de medida');
        array_unshift($trenglon,'Por Favor Seleccione un Tipo de Articulo');
        array_unshift($marca,'Por Favor Seleccione una Marca');
		return view('renglon.crear')->with(['almacen'=>$almacen,'trenglon'=>$trenglon,'marca'=>$marca,'modelo'=>$modelo,
        'unidades'=>$unidades]);
	}

	/**
	 * Instancia el modelo y crea un nuevo registro.
	 *
	 * @return Response
	 */
	public function store(RenglonesForm $renglonesForm)
	{
		$renglon= new \App\Renglon();
        /*$seriales=$renglon->serial=\Request::Input('serial');
        $cantidad=count($seriales);*/


        $foto_producto=Input::file('foto_articulo');
        $ruta=public_path().'/articulos/';
        $url_foto=$foto_producto->getClientOriginalName();
        $subir=$foto_producto->move($ruta,$foto_producto->getClientOriginalName());

        $renglon->id_almacen =Auth::User()->id_almacen;
        $renglon->id_tipo_renglon =\Request::Input('tipo_renglon');
        $renglon->descrip_renglon =\Request::Input('descripcion');
        $renglon->id_marca =\Request::Input('marca');
        $renglon->id_modelo =\Request::Input('modelo');
        $renglon->unidad_medida =\Request::Input('unidad_medida');
        $renglon->cantidad =\Request::input('cantidad');
        $renglon->foto_producto =$url_foto;
        $renglon->existencia_minima =\Request::Input('existencia_minima');
        if (Auth::User()) {
           $renglon->cod_usua = Auth::User()->cod_usua;
        }
        $renglon->save();


        $max=DB::select('SELECT MAX(id_renglon) AS id FROM renglones');
        /*dd($max[0]->id);*/
        $detalle=DB::select('SELECT id_detalle FROM inventario WHERE inventario.id_renglon='.$max[0]->id);

        /*dd($detalle);*/
        /*dd($detalle[0]->id_detalle);*/

        $serial=Input::get('serial');
        /*dd($serial);*/
        foreach($serial as $serials)
        {
            DB::table('inventario_seriales')->insert(
                ['id_renglon' => $max[0]->id, 'serial' => $serials, 'id_detalle' => $detalle[0]->id_detalle]
            );
            /*$seriales=new Inventario_Seriales();
            $seriales->id_renglon=$detalle;
            $seriales->serial=$serials;
            $seriales->id_detalle=$detalle;
            $seriales->save();*/
        }


        /*foreach($serial as $seriales)
        {
            $renglon=\App\Renglon::find($renglon->id_renglon);
            $renglon->Serial()->attach($seriales);
        }*/

        /*$serials=new \App\Seriales();
        $serias=$serials->serial=\Request::Input('serial');
        dd($serias);
        foreach($serias as $serialss)
        {
            $serials->serial=$serialss;
        }
        $serials->save();*/

        return redirect('renglones')->with('message','Se ha registrado un Nuevo Articulo');
	}

	/**
	 * Muestra el Formulario para la edición del registro correspondiente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$renglon=\App\Renglon::find($id);
        $trenglon=\App\TipoRenglon::all()->lists('descrip_tipo_renglon','id_tipo_renglon');
        $marca=\App\Marca::all()->lists('descrip_marca','id_marca');
        $modelo=\App\Modelo::all()->lists('descrip_modelo','id_modelo');
        $seriales=DB::table('renglones')
            ->join('seriales','renglones.id_renglon','=','seriales.id_renglon')
            ->select('seriales.seriales','seriales.id_serial')
            ->where('seriales.id_renglon','=',$id)
            ->get();
        /*$seriales = Renglon::join('seriales','renglones.id_renglon','=','seriales.id_renglon')
            ->where('seriales.id_renglon','=',$id)
            ->lists('seriales.seriales', 'seriales.id_serial');*/
        /*Friends   // work on friends table
   ->join('users','users.id','=','friends_table.user_id')  // join users table to..
    ->where('friends_table.user_id', $user->id)
        ->lists(DB::raw('concat(first_name," ",last_name)'), 'friend_id')  // ...concatenate its fields*/
        return view('renglon.editar')->with(['renglon'=>$renglon,'marca'=>$marca,'modelo'=>$modelo,'tipo_renglon'=>$trenglon,'seriales'=>$seriales]);
	}

	/**
	 * Actualiza el registro especificado en la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, RenglonesForm $renglonesForm)
	{
        $renglon=\App\Renglon::find($id);

        $foto_producto=Input::file('foto_articulo');
        $ruta=public_path().'/articulos/';
        $url_foto=$foto_producto->getClientOriginalName();
        $subir=$foto_producto->move($ruta,$foto_producto->getClientOriginalName());

        $renglon->id_almacen =Auth::User()->id_almacen;
        $renglon->id_tipo_renglon =\Request::Input('tipo_renglon');
        $renglon->descrip_renglon =\Request::Input('descripcion');
        $renglon->id_marca =\Request::Input('marca');
        $renglon->id_modelo =\Request::Input('modelo');
        $renglon->unidad_medida =\Request::Input('unidad_medida');
        $renglon->cantidad =\Request::input('cantidad');
        $renglon->foto_producto =$url_foto;
        $renglon->existencia_minima =\Request::Input('existencia_minima');

        if (Auth::User()) {
            $renglon->cod_usua = Auth::User()->cod_usua;
        }
        $renglon->save();

        $seriales=Input::get('serial');
        $ids=Input::get('id_serial');

        for($i=0;$i<count($seriales);$i++)
        {
            DB::table('seriales')
                ->where('id_renglon', $id)
                ->where('id_serial',$ids)
                ->update(['seriales' => $seriales[$i]]);
        }

        return redirect('renglones')->with('message','Se ha editado el artículo'.$id);
	}

	/**
	 * Remueve o elimina el registro especificado de la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$renglon=\App\Renglon::find($id);
        $renglon->delete();
        return redirect('renglones')->with('message','Borrado');
	}
}
