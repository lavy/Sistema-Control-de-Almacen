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
                    <th style="text-align:center;">BLOQUEAR PDF</th>
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
                        @if(Auth::user()->UserLevel ==0 && $ord->estatus_orden !='Cerrada')
                            <td>
                                <a href="{{URL::to('cerrar_planilla/'.$ord->id_orden)}}"><i class="fa fa-close fa-2x" style="margin-left: 20px;" title="Bloquear Planilla" data-toggle="tooltip"></i></a>
                            </td>
                        @elseif($ord->estatus_orden =='Cerrada')
                            <td>
                                <i class="fa fa-check fa-2x" style="margin-left: 20px;" title="Planilla Bloqueada" data-toggle="tooltip"></i>
                            </td>
                        @endif
                        @if($ord->cantidad !=NULL && $ord->estatus_orden !='Cerrada')
                            <td>
                                <a href="{{URL::to('despacho/pdf/'.$ord->id_orden)}}"><i class="fa fa-file-pdf-o fa-2x" title="Planilla Orden" data-toggle="tooltip"></i></a>
                            </td>
                        @else
                            <td>
                                <i class="fa fa-file-pdf-o fa-2x"  title="Planilla Bloqueada" data-toggle="tooltip"></i>
                            </td>
                        @endif

                        @if($ord->cantidad ===NULL)
                        <td width="60" align="center">
                            <a href="{{URL::to('despacho/detalle/'.$ord->id_transaccion)}}"><i class="fa fa-pencil fa-2x" title="Complementar Orden" data-toggle="tooltip"></i></a>
                            {{--{!! Html::link('despacho/detalle/'.$ord->id_transaccion,'Detalles',array('class' => 'btn btn-success btn-md')) !!}--}}
                        </td>
                        @else
                        <td width="60" align="center">
                            <i class="fa fa-pencil fa-2x" title="Complementar Orden" data-toggle="tooltip"></i>
                            {{--{!! Html::link('#','Detalles',array('class' => 'btn btn-success btn-md','disabled'=>'true')) !!}--}}
                        </td>
                        @endif

                        @if($ord->cantidad ===NULL && Auth::user()->UserLevel ==0)
                        <td width="60" align="center">
                            <a href="{{URL::to('devolucion/'.$ord->id_transaccion)}}"><i class="fa fa-undo fa-2x" title="Devoluciones" data-toggle="tooltip"></i></a>
                           {{--{!! Html::link('#','Devolucion',array('class' => 'btn btn-warning btn-md','disabled'=>'true')) !!}--}}
                        </td>
                        @elseif($ord->cantidad != NULL && Auth::user()->UserLevel ==0)
                        <td width="60" align="center">
                            <i class="fa fa-undo fa-2x" title="Devoluciones" data-toggle="tooltip"></i>
                            {{--{!! Html::link('devolucion/'.$ord->id_transaccion,'Devolucion',array('class' => 'btn btn-warning btn-md')) !!}--}}
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
    <script type="text/javascript">
        $(document).ready(function(){
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        });

    </script>
@endsection