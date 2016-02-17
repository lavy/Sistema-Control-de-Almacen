@extends('reportes.index')
@section('title','Historico De Inventarios')
@section('reporte')

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">HISTORICO INVENTARIOS</div>
            <div class="panel-body">

                {!!Form::open(['url'=>'reportes/inventario','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Fecha Movimiento','id'=>'buscar'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
                {!!Form::close()!!}

                {!!link_to('menu','<-Atras',['class'=>'btn btn-primary'])!!}

                <table class="table table-bordered">
                    <tr>
                        <th style="text-align:center;font:bold 14px 'cursive';">DETALLE</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">TRANSACCIÓN</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">ALMACÉN</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">FECHA_MOVIMIENTO</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">RENGLON</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">UNIDAD MEDIDA</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">CANTIDAD</th>

                    </tr>
                    @foreach($inventario as $invent )
                        <tr>
                            <td style="text-align:center;">{{$invent->id_detalle}}</td>
                            <td style="text-align:center;">{{$invent->id_transaccion}}</td>
                            <td style="text-align:center;">{{$invent->id_almacen}}</td>
                            <td style="text-align:center;">{{$invent->fecha_movimiento}}</td>
                            <td style="text-align:center;">{{$invent->id_renglon}}</td>
                            <td style="text-align:center;">{{$invent->unidad_medida}}</td>
                            <td style="text-align:center;">{{$invent->cantidad_existencia}}</td>
                        </tr>
                    @endforeach
                </table>

                {!! $inventario->render() !!}
            </div>
        </div>
    </div>
    </div>



@endsection