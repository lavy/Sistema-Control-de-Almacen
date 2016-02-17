@extends('app')
@section('title', 'Ordenes de Despachos')
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
            {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
            {!!Form::close()!!}

            <p>POR FAVOR PULSE EL BOTON <b>DETALLES</b> PARA COMPLEMENTAR LA ORDEN DE SUMINISTROS</p>
            <table class="table table-bordered">
                <tr>
                    <th style="text-align:center;">PDF</th>
                    <th style="text-align:center;">DETALLE ORDEN</th>
                    <th style="text-align:center;">DEVOLUCIONES</th>
                    <th style="text-align:center;"># TRANSACCIÓN</th>
                    <th style="text-align:center;">#ORDEN</th>
                    <th style="text-align:center;">ALMACEN</th>
                    <th style="text-align:center;"># SOLICITUD</th>
                    <th style="text-align:center;">ARTICULO</th>
                    <th style="text-align:center;">TIPO SOLICITUD</th>

                </tr>
                @foreach($orden as $ord )
                    <tr>
                        @if($ord->cantidad !=NULL && $ord->estatus_orden !='Cerrada')
                            <td>{!!link_to('despacho/pdf/'.$ord->id_orden,'Planilla',['class'=>'btn btn-primary btn-md'])!!}</td>
                        @else
                            <td>{!!link_to('#','Planilla',['class'=>'btn btn-primary btn-md','disabled'=>'true'])!!}</td>
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

                        @if($ord->cantidad ===NULL && Auth::user()->UserLevel ==0)
                        <td width="60" align="center">
                           {!! Html::link('#','Devolucion',array('class' => 'btn btn-warning btn-md','disabled'=>'true')) !!}
                        </td>
                        @elseif($ord->cantidad != NULL && Auth::user()->UserLevel ==0)
                        <td width="60" align="center">
                            {!! Html::link('devolucion/'.$ord->id_transaccion,'Devolucion',array('class' => 'btn btn-warning btn-md')) !!}
                        </td>
                        @endif

                        <td style="text-align:center;">{{$ord->id_transaccion}}</td>
                        <td style="text-align:center;">{{$ord->id_orden}}</td>
                        <td style="text-align:center;">{{$ord->descrip_almacen}}</td>
                        <td style="text-align:center;">{{$ord->id_solicitud}}</td>
                        <td style="text-align:center;">{{$ord->descrip_renglon}}</td>
                        <td style="text-align:center;">{{$ord->tipo_solicitud}}</td>
                    </tr>
                @endforeach
            </table>

           {!!$orden->render()!!}
        </div>
    </div>
    </div>
@endsection