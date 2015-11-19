@extends('app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">INVENTARIO</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'inventario','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Articulo'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn bnt-default'])!!}
                {!!Form::close()!!}


                <table class="table table-bordered">
                    <tr>
                        <th width="20px" style="text-align:center;font:bold 14px 'cursive';"># DETALLE</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">ALMACÉN</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">FECHA DE MOVIMIENTO</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">ARTÍCULO</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">UNIDAD DE MEDIDA</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">CANTIDAD EXISTENCIA</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">EXISTENCIA MINIMA</th>

                    </tr>
                    @foreach($inventario as $invent )
                        <tr>
                            <td style="text-align:center;">{{$invent->id_detalle}}</td>
                            <td>{{$invent->descrip_almacen}}</td>
                            <td>{{$invent->fecha_movimiento}}</td>
                            <td>{{$invent->descrip_renglon}}</td>
                            <td>{{$invent->unidad_medida}}</td>
                            <td>{{$invent->cantidad_existencia}}</td>
                            <td>{{$invent->existencia_minima}}</td>
                        </tr>
                    @endforeach
                </table>

                {!! $inventario->render() !!}
            </div>
        </div>
    </div>
    </div>
@endsection