@extends('reportes.index')
@section('title','Salidas del Almacen')
@section('reporte')

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">SALIDAS ALMACEN</div>
            <div class="panel-body">

                {!!Form::open(['url'=>'reportes/salidas','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Almacén','id'=>'buscar'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
                {!!Form::close()!!}

                {!!link_to('menu','<-Atras',['class'=>'btn btn-primary'])!!}

                <table class="table table-bordered">
                    <tr>
                        <th style="text-align:center;font:bold 14px 'cursive';"># ORDEN</th>
                        <th style="text-align:center;font:bold 14px 'cursive';"># SOLICITUD</th>
                        <th style="text-align:center;font:bold 14px 'cursive';"># ALMACEN</th>
                        <th style="text-align:center;font:bold 14px 'cursive';"># RENGLON</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">CANTIDAD DESPACHADA</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">FECHA ORDEN</th>
                    </tr>
                    @foreach($salidas as $salida )
                        <tr>
                            <td style="text-align:center;">{{$salida->id_orden}}</td>
                            <td style="text-align:center;">{{$salida->id_solicitud}}</td>
                            <td style="text-align:center;">{{$salida->id_almacen}}</td>
                            <td style="text-align:center;">{{$salida->id_renglon}}</td>
                            <td style="text-align:center;">{{$salida->cantidad_despachada}}</td>
                            <td style="text-align:center;">{{$salida->fecha_orden}}</td>
                        </tr>
                    @endforeach
                </table>

                {!! $salidas->render() !!}
            </div>
        </div>
    </div>
    </div>



@endsection