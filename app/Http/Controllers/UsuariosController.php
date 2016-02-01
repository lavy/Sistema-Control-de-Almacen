<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuariosForm;
use App\UserLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UsuariosController extends Controller {


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
        /*$usuarios=\App\User::where('nombre','LIKE','%'.$buscar.'%')
                            ->where('UserLevel','<>',Auth::user()->UserLevel)
                            ->paginate(5);*/
        $usuarios=DB::table('users')
                    ->join('userlevels','users.UserLevel','=','userlevels.UserLevelID')
                    ->select('users.*','userlevels.UserLevelName')
                    ->where('nombre','LIKE','%'.$buscar.'%')
                    ->where('UserLevel','<>',Auth::user()->UserLevel)
                    ->paginate(5);
        $usuarios->setPath('usuarios');
		return view('usuarios.index')->with('usuarios',$usuarios);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $nivel_usuario=\App\UserLevel::all()->lists('UserLevelName','UserLevelID');
        $almacen=\App\Almacen::all()->lists('descrip_almacen','id_almacen');
        /*array_unshift($nivel_usuario,'Seleccione un nivel de usuario');*/
		return view('usuarios.crear')->with(['almacen'=>$almacen,'userlevel'=>$nivel_usuario]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UsuariosForm $usuariosForm)
	{
		$usuarios= new \App\User();//usuarios o user modificar
        $usuarios->id_almacen=\Request::Input('almacen');
        $usuarios->nombre=\Request::Input('nombre');
        $usuarios->apellido=\Request::Input('apellido');
        $usuarios->email=\Request::Input('email');
        $usuarios->cargo=\Request::Input('cargo');
        $usuarios->password=\Hash::make(\Request::Input('password'));
        $usuarios->ci_usua=\Request::Input('cedula');
        $usuarios->UserLevel=\Request::Input('nivel_usuario');
        $usuarios->save();
        Session::flash('mensaje','Se Ha Registrado Un Usuario con exito');
        return redirect('usuarios');



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
		$usuario=\App\User::find($id);
        $nivel_usuario=UserLevel::all()->lists('UserLevelName','UserLevelID');
        return view('usuarios.editar')->with(['usuarios'=>$usuario,'nivel'=>$nivel_usuario]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$usuario=\App\User::find($id);
        $usuario->nombre=\Request::Input('nombre');
        $usuario->apellido=\Request::Input('apellido');
        $usuario->email=\Request::Input('email');
        $usuario->cargo=\Request::Input('cargo');
        $usuario->password=\Hash::make(\Request::Input('password'));
        $usuario->ci_usua=\Request::Input('cedula');
       /* $usuario->cod_usua=\Request::Input('codigo');*/
        $usuario->UserLevel=\Request::Input('nivel_usuario');
        $usuario->save();
        return redirect('usuarios')->with('message','Ha sido Actualizado Exitosamente');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$usuario=\App\User::find($id);
        $usuario->delete();
        return redirect('usuarios')->with('message','Se ha borrado exitosamente');
	}

}
