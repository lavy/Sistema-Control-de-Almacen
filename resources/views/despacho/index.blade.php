@extends('app')
@section('content')

    @if($errors->has())
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
                {!! $message !!}
            @endforeach
        </div>
    @endif

    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    <div class="panel panel-primary">
        <div class="panel-heading" style="text-align:center;">ORDENES DE DESPACHOS Y/O SALIDAS DE ALMACEN</div>
        <div class="panel-body">
            {!!Form::open(['url'=>'despacho','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
            <div class="form-group">
                {!!Form::text('buscar',null,['class'=>'form-control text-uppercase','placeholder'=>'Busqueda por #Orden'])!!}
            </div>
            {!!Form::submit('BUSCAR',['class'=>'btn bnt-default'])!!}
            {!!Form::close()!!}


            <p>POR FAVOR PULSE EL BOTON <b>DETALLES</b> PARA COMPLEMENTAR LA ORDEN DE SUMINISTROS</p>
            <table class="table table-bordered">
                <tr>
                    <th style="text-align:center;">PDF</th>
                    <th style="text-align:center;">REVERSAR</th>
                    <th style="text-align:center;">DETALLE ORDEN</th>
                    <th style="text-align:center;">DEVOLUCIONES</th>
                    <th style="text-align:center;"># TRANSACCIÓN</th>
                    <th style="text-align:center;">#ORDEN</th>
                    <th style="text-align:center;">ALMACEN</th>
                    <th style="text-align:center;"># SOLICITUD</th>
                    <th style="text-align:center;">ARTICULO</th>

                    {{--<th style="text-align:center;">OFICINA</th>
                    <th style="text-align:center;">DEPARTAMENTO</th>
                    <th style="text-align:center;">FECHA ORDEN</th>
                    <th style="text-align:center;">HORA ORDEN</th>--}}
                </tr>
                @foreach($orden as $ord )
                    <tr>
                        @if($ord->cantidad !=NULL)
                            <td>{!!link_to('despacho/pdf/'.$ord->id_orden,'Planilla',['class'=>'btn btn-primary btn-md'])!!}</td>
                        @else
                            <td>{!!link_to('#','Planilla',['class'=>'btn btn-primary btn-md','disabled'=>'true'])!!}</td>
                        @endif

                        @if($ord->cantidad !=NULL)
                            <td>{!!link_to('despacho/editar/'.$ord->id_transaccion,'Reversar',['class'=>'btn btn-info btn-md'])!!}</td>
                        @else
                            <td>{!!link_to('#','Reversar',['class'=>'btn btn-info btn-md','disabled'=>'true'])!!}</td>
                        @endif

                        @if($ord->cantidad ===NULL)
                        <td width="60" align="center">
                            {!! Html::link('despacho/detalle/'.$ord->id_transaccion,'Detalles',array('class' => 'btn btn-success btn-md')) !!}
                        </td>
                        @else
                        <td width="60" align="center">
                            {!! Html::link('#','Detalles',array('class' => 'btn btn-success btn-md','disabled'=>'true')) !!}
                        </td>
                        @endif

                        @if($ord->cantidad ===NULL)
                        <td width="60" align="center">
                           {!! Html::link('#','Devolucion',array('class' => 'btn btn-warning btn-md','disabled'=>'true')) !!}
                        </td>
                        @else
                        <td width="60" align="center">
                            {!! Html::link('devolucion/'.$ord->id_transaccion,'Devolucion',array('class' => 'btn btn-warning btn-md')) !!}
                        </td>
                        @endif

                        <td style="text-align:center;">{{$ord->id_transaccion}}</td>
                        <td style="text-align:center;">{{$ord->id_orden}}</td>
                        <td style="text-align:center;">{{$ord->descrip_almacen}}</td>
                        <td style="text-align:center;">{{$ord->id_solicitud}}</td>
                        <td style="text-align:center;">{{$ord->descrip_renglon}}</td>
                    </tr>
                @endforeach
            </table>

           {!!$orden->render()!!}
        </div>
    </div>
    </div>
@endsection