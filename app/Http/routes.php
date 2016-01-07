<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
/*Route::get('home', 'HomeController@index');*/

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('menu',function()
{
  if(Auth::check() != FALSE)
  {
      return view('menu');
  }elseif(Auth::check() != TRUE)
  {
      return redirect('auth/logout');
  }
});

Route::get('oficina',['uses' => 'OficinasController@index', 'middleware' => ['operador']]);
Route::get('crear_oficinas',['uses' => 'OficinasController@create', 'middleware' => ['operador']]);
Route::post('oficinas',['uses' => 'OficinasController@store', 'middleware' => ['operador']]);
Route::delete('oficinas/eliminar/{id}',['uses' => 'OficinasController@destroy', 'middleware' => ['operador']]);
Route::get('oficinas/editar/{id}',['uses' => 'OficinasController@edit', 'middleware' => ['operador']]);
Route::post('oficinas/{id}',['uses' => 'OficinasController@update', 'middleware' => ['operador']]);

Route::get('departamento',['uses' => 'DepartamentosController@index', 'middleware' => ['operador']]);
Route::get('crear_departamentos',['uses' => 'DepartamentosController@create', 'middleware' => ['operador']]);
Route::post('departamento',['uses' => 'DepartamentosController@store', 'middleware' => ['operador']]);
Route::delete('departamentos/{id}',['uses' => 'DepartamentosController@destroy', 'middleware' => ['operador']]);
Route::get('departamentos/editar/{id}',['uses' => 'DepartamentosController@edit', 'middleware' => ['operador']]);
Route::post('departamentos/{id}',['uses' => 'DepartamentosController@update', 'middleware' => ['operador']]);

Route::get('jefes',['uses'=>'JefesController@index','middleware'=>['operador']]);
Route::get('crear_jefes',['uses'=>'JefesController@create','middleware'=>['operador']]);
Route::post('jefes',['uses'=>'JefesController@store','middleware'=>['operador']]);
Route::get('jefes/editar/{id}',['uses'=>'JefesController@edit','middleware'=>['operador']]);
Route::post('jefes/{id}',['uses'=>'JefesController@update','middleware'=>['operador']]);

Route::get('tecnico',['uses'=>'TecnicosController@index','middleware'=>['operador']]);
Route::get('crear_tecnico',['uses'=>'TecnicosController@create','middleware'=>['operador']]);
Route::post('tecnicoss',['uses'=>'TecnicosController@store','middleware'=>['operador']]);
Route::get('tecnicos/editar/{id}',['uses'=>'TecnicosController@edit','middleware'=>['operador']]);
Route::post('tecnicos/{id}',['uses'=>'TecnicosController@update','middleware'=>['operador']]);

Route::get('marca',['uses' => 'MarcasController@index', 'middleware' => ['operador']]);
Route::get('crear_marcas',['uses' => 'MarcasController@create', 'middleware' => ['operador']]);
Route::post('marcas',['uses' => 'MarcasController@store', 'middleware' => ['operador']]);
Route::delete('marcas/eliminar/{id}',['uses' => 'MarcasController@destroy', 'middleware' => ['operador']]);
Route::get('marcas/editar/{id}',['uses' => 'MarcasController@edit', 'middleware' => ['operador']]);
Route::post('marcas/{id}',['uses' => 'MarcasController@update', 'middleware' => ['operador']]);

Route::get('modelos',['uses' => 'ModelosController@index', 'middleware' => ['operador']]);
Route::get('crear_modelos',['uses' => 'ModelosController@create', 'middleware' => ['operador']]);
Route::post('modelos',['uses' => 'ModelosController@store', 'middleware' => ['operador']]);
Route::get('modelos/editar/{id}',['uses'=>'ModelosController@edit','middleware'=> ['operador']]);
Route::post('modelos/{id}',['uses'=>'ModelosController@update','middleware'=> ['operador']]);
Route::delete('modelos/{id}',['uses' => 'ModelosController@destroy', 'middleware' => ['operador']]);

Route::get('proveedor',['uses'=>'ProveedorController@index','middleware'=>['operador']]);
Route::get('crear_proveedor',['uses'=>'ProveedorController@create','middleware'=>['operador']]);
Route::post('proveedor',['uses'=>'ProveedorController@store','middleware'=>['operador']]);
Route::get('proveedor/editar/{id}',['uses'=>'ProveedorController@edit','middleware'=>['operador']]);
Route::post('proveedor/{id}',['uses'=>'ProveedorController@update','middleware'=>['operador']]);
Route::delete('proveedor/eliminar/{id}',['uses'=>'ProveedorController@destroy','middleware'=>['operador']]);

Route::get('tiporenglon',['uses' => 'TiporenglonController@index', 'middleware' => ['operador']]);
Route::get('crear_tiporenglon',['uses' => 'TiporenglonController@create', 'middleware' => ['operador']]);
Route::post('tiporenglon',['uses' => 'TiporenglonController@store', 'middleware' => ['operador']]);
Route::delete('tiporenglon/eliminar/{id}',['uses' => 'TiporenglonController@destroy', 'middleware' => ['operador']]);
Route::get('tiporenglon/editar/{id}',['uses' => 'TiporenglonController@edit', 'middleware' => ['operador']]);
Route::post('tiporenglon/{id}',['uses' => 'TiporenglonController@update', 'middleware' => ['operador']]);

Route::get('solicitudes','SolicitudesController@index');
Route::get('crear_solicitudes','SolicitudesController@create');
Route::post('solicitudes','SolicitudesController@store');
Route::get('solicitudes/editar/{id}','SolicitudesController@edit');
Route::post('solicitudes/{id}','SolicitudesController@update');
Route::delete('solicitudes/eliminar/{id}','SolicitudesController@destroy');
Route::get('solicitudes/transferir/{id}',['uses'=>'SolicitudesController@transferir','middleware'=>['operador']]);
Route::get('solicitudes_procesadas','SolicitudesController@procesadas');

Route::get('despacho','DespachosController@index');
Route::get('despacho/detalle/{id}','DespachosController@edit');
Route::get('despacho/pdf/{id}','DespachosController@planilla');
Route::post('despacho/{id}','DespachosController@update');
Route::get('devolucion/{id}',['uses'=>'DespachosController@devolucion','middleware'=>['operador']]);
Route::get('reversar/{id}','DespachosController@reversar');

Route::get('articulos','ArticulosController@index');
Route::get('articulos/crear','ArticulosController@create');
Route::post('articulos','ArticulosController@store');
Route::delete('articulos/{id}','ArticulosController@destroy');

Route::get('inventario',['uses' => 'InventarioController@index', 'middleware' => ['operador']]);
Route::post('inventario',['uses' => 'InventarioController@store', 'middleware' => ['operador']]);

Route::get('usuarios',['uses' => 'UsuariosController@index', 'middleware' => ['operador']]);
Route::get('crear_usuarios',['uses' => 'UsuariosController@create', 'middleware' => ['operador']]);
Route::post('usuarios',['uses' => 'UsuariosController@store', 'middleware' => ['operador']]);
Route::get('usuarios/editar/{id}',['uses' => 'UsuariosController@edit', 'middleware' => ['operador']]);
Route::post('usuarios/{id}',['uses' => 'UsuariosController@update', 'middleware' => ['operador']]);
Route::delete('usuarios/eliminar/{id}',['uses' => 'UsuariosController@destroy', 'middleware' => ['operador']]);

Route::get('renglones', ['uses' => 'RenglonController@index', 'middleware' => ['operador']]);
Route::get('crear_renglones', ['uses' => 'RenglonController@create', 'middleware' => ['operador']]);
Route::post('renglones', ['uses' => 'RenglonController@store', 'middleware' => ['operador']]);
Route::delete('renglones/eliminar/{id}', ['uses' => 'RenglonController@destroy', 'middleware' => ['operador']]);
Route::get('renglones/editar/{id}', ['uses' => 'RenglonController@edit', 'middleware' => ['operador']]);
Route::post('renglones/{id}', ['uses' => 'RenglonController@update', 'middleware' => ['operador']]);

Route::get('seriales/{id}', ['uses' => 'SerialesController@index', 'middleware' => ['operador']]);
Route::get('seriales/editar/{id}', ['uses' => 'SerialesController@edit', 'middleware' => ['operador']]);
Route::post('seriales/{id}', ['uses' => 'SerialesController@update', 'middleware' => ['operador']]);
Route::delete('seriales/eliminar/{id}', ['uses' => 'RenglonController@eliminarserial', 'middleware' => ['operador']]);

Route::get('reportes',function()
{
   return view('reportes.index');
});

Route::get('reportes/oficinas',['uses' => 'ReportesController@oficinas', 'middleware' => ['operador']]);
Route::get('reportes/departamentos',['uses' => 'ReportesController@departamentos', 'middleware' => ['operador']]);
Route::get('reportes/prestamos',['uses' => 'ReportesController@prestamos', 'middleware' => ['operador']]);
Route::get('reportes/productos',['uses' => 'ReportesController@demanda', 'middleware' => ['operador']]);
Route::get('reportes/inventario',['uses' => 'ReportesController@inventario', 'middleware' => ['operador']]);
Route::get('reportes/salidas',['uses' => 'ReportesController@salidas', 'middleware' => ['operador']]);
Route::get('reportes/asignados',['uses' => 'ReportesController@asignados', 'middleware' => ['operador']]);
Route::get('reportes/prestados',['uses' => 'ReportesController@prestados', 'middleware' => ['operador']]);


Route::get('permisos','PermisosController@index');
Route::get('crear_permisos','PermisosController@create');
Route::post('permisos','PermisosController@store');
Route::get('permisos/editar/{id}','PermisosController@edit');
Route::post('permisos/{id}','PermisosController@update');
Route::delete('permisos/eliminar/{id}','PermisosController@destroy');

Route::get('estadisticas',['uses'=>'EstadisticasController@index','middleware'=>['operador']]);

Route::get('niveles',['uses'=>'NivelesController@index','middleware'=>['operador']]);
Route::get('crear_nivel',['uses'=>'NivelesController@create','middleware'=>['operador']]);
Route::post('niveles',['uses'=>'NivelesController@store','middleware'=>['operador']]);
Route::get('niveles/editar/{id}',['uses'=>'NivelesController@edit','middleware'=>['operador']]);
Route::post('niveles/{id}',['uses'=>'NivelesController@update','middleware'=>['operador']]);

Route::get('almacen',['uses' => 'AlmacenController@index', 'middleware' => ['operador']]);
Route::get('crear_almacen',['uses' => 'AlmacenController@create', 'middleware' => ['operador']]);
Route::post('almacen',['uses' => 'AlmacenController@store', 'middleware' => ['operador']]);
Route::get('almacen/editar/{id}',['uses' => 'AlmacenController@edit', 'middleware' => ['operador']]);
Route::post('almacen/{id}',['uses' => 'AlmacenController@update', 'middleware' => ['operador']]);
Route::delete('almacen/eliminar/{id}',['uses' => 'AlmacenController@destroy', 'middleware' => ['operador']]);

Route::post('enviar', ['as' => 'enviar', 'uses' => 'EmailController@send'] );
Route::get('contacto', ['as' => 'contacto', 'uses' => 'EmailController@index'] );

Route::get('pruebasss',function(){
    dd(\App\Modelo::all()->lists('descrip_modelo','id_modelo'));
});
/*Route::get('send',function() {
    $data = [
        'title' => 'hola como estas',
        'hola' => 'epale'

    ];
    Mail::send('success', $data, function ($message)  {
        $message->to('martingomes36@gmail.com', 'martin')->subject('bienvenu');
    });
});*/

Route::get('solicitudes_almacen',function() {
    $id = Input::get('option');
    $lost = \App\Oficinas::find($id)->departamentos->lists('descrip_departamento','id_departamento');
    /*array_unshift($lost,'Debe Seleccionar un Departamento');*/
    return $lost;
});


Route::get('t_articulos',function() {
    $id = Input::get('option');
    $pre = \App\TipoRenglon::find($id)->Renglon->lists('descrip_renglon','id_renglon');
    /*array_unshift($pre,'Debe Seleccionar un Articulo');*/
    return $pre;
});

Route::get('marcas',function() {
    $id = Input::get('option');
    $level = \App\Marca::find($id)->modelos->lists('descrip_modelo','id_modelo');
    array_unshift($level,'Debe Seleccionar un Modelo');
    return $level;
});


Route::get('articulo',function() {
    $id = Input::get('option');
    $level = \App\Marca::find($id)->modelos->lists('descrip_modelo','id_modelo');
    /*array_unshift($level,'Debe Seleccionar un Modelo');*/
    return $level;
});

Route::get('modal/{id}',function($id)
{

    $seriales=\Illuminate\Support\Facades\DB::table('inventario_seriales')
        ->join('renglones','inventario_seriales.id_renglon','=','renglones.id_renglon')
        ->select('inventario_seriales.serial','renglones.descrip_renglon')
        ->where('inventario_seriales.id_renglon','=',$id)
        ->get();
    /*$seriales=\App\Seriales::where('id_renglon','=',$id)->get();*/

    $cantidad=count($seriales);

    echo "<b>Cantidad:</b>".$cantidad;
    echo "<table class='table  table-condensed table-striped'>";
      echo "<tr>";
         echo "<td style='text-align:center;'>".'<b>Articulo</b>'."</td>";
         echo "<td style='text-align:center;'>".'<b>Seriales</b>'."</td>";
         /*echo "<td style='text-align:center;'>".'<b>Seriales</b>'."</td>";*/
      echo "</tr>";

    foreach($seriales as $serial) {
        echo "<tr>";
            echo "<td style='text-align:center;'>".$serial->descrip_renglon."</td>";
            echo "<td style='text-align:center;'>".$serial->serial."</td>";
            /*echo "<td><a href='modal' class='btn btn-danger'></a></td>";*/
        echo "</tr>";

    }
      echo "</table>";
});


Route::get('solicitudes/mostrar/{id}',function($id){

    $solicitudes=\App\Solicitudes::find($id);

    echo"<table class='table table-striped table-condensed'>";
        echo "<tr>";
            echo"<td>".'<b>Solicitud</b>'."</td>";
            echo"<td>".$solicitudes->id_solicitud."</td>";
        echo "</tr>";
        echo "<tr>";
            echo"<td>".'<b>Oficina</b>'."</td>";
            echo"<td>".$solicitudes->id_oficina."</td>";
        echo "</tr>";
        echo "<tr>";
            echo"<td>".'<b>Departamento</b>'."</td>";
            echo"<td>".$solicitudes->id_departamento."</td>";
        echo "</tr>";
        echo "<tr>";
            echo"<td>".'<b>Fecha Solicitud</b>'."</td>";
            echo"<td>".$solicitudes->fecha_solicitud."</td>";
        echo "</tr>";
        echo "<tr>";
            echo"<td>".'<b>Tipo Solicitud</b>'."</td>";
            echo"<td>".$solicitudes->tipo_solicitud."</td>";
        echo "</tr>";
    if($solicitudes->desde && $solicitudes->hasta !=NULL ) {
        echo "<tr>";
            echo "<td>" . '<b>Desde</b>' . "</td>";
            echo "<td>" . $solicitudes->desde . "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>" . '<b>Hasta</b>' . "</td>";
            echo "<td>" . $solicitudes->hasta . "</td>";
        echo "</tr>";
    }
        echo "<tr>";
            echo"<td>".'<b>Beneficiario</b>'."</td>";
            echo"<td>".$solicitudes->beneficiario."</td>";
        echo "</tr>";
        echo "<tr>";
            echo"<td>".'<b>Telefono Beneficiario</b>'."</td>";
            echo"<td>".$solicitudes->telef_beneficiario."</td>";
        echo "</tr>";
        echo "<tr>";
            echo"<td>".'<b>Email Beneficiario</b>'."</td>";
            echo"<td>".$solicitudes->email_beneficiario."</td>";
        echo "</tr>";
        echo "<tr>";
            echo"<td>".'<b>Estatus</b>'."</td>";
            echo"<td>".$solicitudes->estatus."</td>";
        echo "</tr>";
});


Route::get('asignados/{id}',function($id){

    $asignados=\Illuminate\Support\Facades\DB::table('detalle_planilla_orden')
            ->join('inventario_seriales','detalle_planilla_orden.id_transaccion','=','inventario_seriales.id_transaccion')
            ->join('renglones','detalle_planilla_orden.id_renglon','=','renglones.id_renglon')
            ->select('inventario_seriales.serial','renglones.descrip_renglon')
            ->where('inventario_seriales.id_transaccion','=',$id)
            ->where('inventario_seriales.estatus','=','Asignacion')
            ->get();

    $cantidad=count($asignados);

    echo "<b>Cantidad:</b>".$cantidad;
    echo "<table class='table  table-condensed table-striped'>";
    echo "<tr>";
    echo "<td style='text-align:center;'>".'<b>Articulo</b>'."</td>";
    echo "<td style='text-align:center;'>".'<b>Seriales</b>'."</td>";
    echo "</tr>";

    foreach($asignados as $asignado) {
        echo "<tr>";
        echo "<td style='text-align:center;'>".$asignado->descrip_renglon."</td>";
        echo "<td style='text-align:center;'>".$asignado->serial."</td>";
        echo "</tr>";
    }
    echo "</table>";

});

/*Route::get('menu','HomeController@app');*/

Route::get('prestados/{id}',function($id){

    $prestados=\Illuminate\Support\Facades\DB::table('detalle_planilla_orden')
        ->join('inventario_seriales','detalle_planilla_orden.id_transaccion','=','inventario_seriales.id_transaccion')
        ->join('renglones','detalle_planilla_orden.id_renglon','=','renglones.id_renglon')
        ->select('inventario_seriales.serial','renglones.descrip_renglon')
        ->where('inventario_seriales.id_transaccion','=',$id)
        ->where('inventario_seriales.estatus','=','Prestamo')
        ->get();

    $cantidad=count($prestados);

    echo "<b>Cantidad:</b>".$cantidad;
    echo "<table class='table  table-condensed table-striped'>";
    echo "<tr>";
    echo "<td style='text-align:center;'>".'<b>Articulo</b>'."</td>";
    echo "<td style='text-align:center;'>".'<b>Seriales</b>'."</td>";
    echo "</tr>";

    foreach($prestados as $prestado) {
        echo "<tr>";
        echo "<td style='text-align:center;'>".$prestado->descrip_renglon."</td>";
        echo "<td style='text-align:center;'>".$prestado->serial."</td>";
        echo "</tr>";
    }
    echo "</table>";

});

Route::get('inventario/{id}',function($id){

    $inventario=\Illuminate\Support\Facades\DB::table('inventario')
        ->join('inventario_seriales','inventario.id_detalle','=','inventario_seriales.id_detalle')
        ->join('renglones','inventario.id_renglon','=','renglones.id_renglon')
        ->select('inventario_seriales.serial','renglones.descrip_renglon')
        ->where('inventario_seriales.id_detalle','=',$id)
        ->where('inventario_seriales.estatus','=','Stock')
        ->get();


    $cantidad=count($inventario);

    echo "<b>Cantidad:</b>".$cantidad;
    echo "<table class='table  table-condensed table-striped'>";
    echo "<tr>";
    echo "<td style='text-align:center;'>".'<b>Articulo</b>'."</td>";
    echo "<td style='text-align:center;'>".'<b>Seriales</b>'."</td>";
    echo "</tr>";

    foreach($inventario as $invent) {
        echo "<tr>";
        echo "<td style='text-align:center;'>".$invent->descrip_renglon."</td>";
        echo "<td style='text-align:center;'>".$invent->serial."</td>";
        echo "</tr>";
    }
    echo "</table>";

});