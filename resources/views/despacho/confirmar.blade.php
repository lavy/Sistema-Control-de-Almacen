@extends('app')

@section('content')


    {!!Form::open(['url'=>'despacho/pdf/'.$despacho->id_orden])!!}

    <div class="panel panel-primary">
        <div class="panel-heading" style="text-align:center;">DATOS PARA LA GENERACIÓN DE LA PLANILLA DE LA ORDEN</div>
        <div class="panel-body">

        <div class="col-md-6">
            {!!Form::label('entregado','Entregado por:')!!}
            {!!Form::text('entregado',null,array('class'=>'form-control','type'=>'text'))!!}
        </div>
        <div class="col-md-6">
            {!!Form::label('fecha_entrega','Fecha de Entrega:')!!}
            {!!Form::text('fecha_entrega',null,array('class'=>'form-control','type'=>'text'))!!}
        </div>
        <div class="col-md-6">
            {!!Form::label('hora_entrega','Hora de entrega:')!!}
            {!!Form::text('hora_entrega',null,array('class'=>'form-control','type'=>'text'))!!}
        </div>
        <div class="col-md-6">
            {!!Form::label('nombre_recibido','Nombre Persona Recibe:')!!}
            {!!Form::text('nombre_recibido',null,array('class'=>'form-control','type'=>'text'))!!}
        </div>
        <div class="col-md-6">
            {!!Form::label('cedula_recibido','Cedula Persona Recibe:')!!}
            {!!Form::text('cedula_recibido',null,array('class'=>'form-control','type'=>'text'))!!}
        </div>
        <div class="col-md-6">
            {!!Form::label('fecha_recibido','Fecha de Recibido:')!!}
            {!!Form::text('fecha_recibido',null,array('class'=>'form-control','type'=>'text'))!!}
        </div>
        <div class="col-md-6">
            {!!Form::label('hora_recibido','Hora de Recibido:')!!}
            {!!Form::text('hora_recibido',null,array('class'=>'form-control','type'=>'text'))!!}
        </div>
        <div class="col-md-6">
            {!!Form::label('estatus','Estatus Orden:')!!}
            {!!Form::text('estatus',null,array('class'=>'form-control','type'=>'text'))!!}
        </div>
        <div class="col-md-6">
            {!!Form::label('codigo_usuario','Codigo Usuario:')!!}
            {!!Form::text('codigo_usuario',null,array('class'=>'form-control','type'=>'text'))!!}
        </div>
        <div class="col-md-6">
            {!!Form::label('codigo_usuario','Codigo Usuario:')!!}
            {!!Form::text('codigo_usuario',null,array('class'=>'form-control','type'=>'text'))!!}
        </div>

        <div class="col-md-offset-4">
            {!!link_to('despacho/pdf/'.$despacho->id_orden,'Generar Planilla en PDF',['class'=>'btn btn-primary btn-md'])!!}
            {!!link_to('menu','Volver al menu',['class'=>'btn btn-primary btn-md'])!!}
        </div>
    {!!Form::close()!!}


    {{-- @if($errors->has())
         <div class='alert alert-danger'>
             @foreach ($errors->all('<p>:message</p>') as $message)
                 {!! $message !!}
             @endforeach
         </div>
     @endif

     @if (Session::has('message'))
         <div class="alert alert-success">{{ Session::get('message') }}</div>
     @endif --}}

          {{--  {!!Form::open(['url'=>'despacho','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
            <div class="form-group">
                {!!Form::text('buscar',null,['class'=>'form-control text-uppercase','placeholder'=>'BUSQUEDA POR ORDEN'])!!}
            </div>
            {!!Form::submit('BUSCAR',['class'=>'btn bnt-default'])!!}
            {!!Form::close()!!}--}}


            {{-- <table class="table table-bordered">
                 <tr>
                     <th width="20px" style="text-align:center;"># SOLICITUD</th>
                     <th style="text-align:center;">FECHA SOLICITUD</th>
                     <th style="text-align:center;">OFICINA</th>
                     <th style="text-align:center;">DEPARTAMENTO</th>
                     <th style="text-align:center;">BENEFICIARIO</th>
                     <th style="text-align:center;">DETALLE</th>
                     --}}{{--<th style="text-align:center;">COD_USUA</th>--}}{{--
                 </tr>
                 @foreach($solicitudess as $solicitud )
                     <tr>
                         <td style="text-align:center;">{{$solicitud->id_solicitud}}</td>
                         <td style="text-align:center;">{{$solicitud->fecha_solicitud}}</td>
                         <td style="text-align:center;">{{$solicitud->id_oficina}}</td>
                         <td style="text-align:center;">{{$solicitud->id_departamento}}</td>
                         <td style="text-align:center;">{{$solicitud->beneficiario}}</td>
                         <td style="text-align:center;">{{$solicitud->pedido}}</td>
                     </tr>
                 @endforeach
             </table>--}}
           {{-- <p>POR FAVOR PULSE EL BOTON <b>DETALLES</b> PARA COMPLEMENTAR LA ORDEN DE SUMINISTROS</p>
            <table class="table table-bordered">
                <tr>
                    <th style="text-align:center;">ACTA ENTREGA</th>
                    <th style="text-align:center;">DETALLE ORDEN</th>
                    <th style="text-align:center;">ID ORDEN</th>
                    <th style="text-align:center;">ALMACEN</th>
                    <th style="text-align:center;">ID SOLICITUD</th>
                    <th style="text-align:center;">OFICINA</th>
                    <th style="text-align:center;">DEPARTAMENTO</th>
                    <th style="text-align:center;">FECHA Y HORA ORDEN</th>
                </tr>--}}
               {{-- @foreach($orden as $ord )
                    <tr>
                        <td>{!!link_to('despacho/pdf','',['class'=>'glyphicon glyphicon-print glyphicon-md'])!!}</td>
                        <td width="60" align="center">
                            {!! Html::link('despacho/detalle/'.$ord->id_orden,'Detalles',array('class' => 'btn btn-success btn-md')) !!}
                        </td>
                        <td style="text-align:center;">{{$ord->id_orden}}</td>
                        <td style="text-align:center;">{{$ord->id_almacen}}</td>
                        <td style="text-align:center;">{{$ord->id_solicitud}}</td>
                        --}}{{--<td style="text-align:center;">{{$despacho->id_solicitud}}</td>--}}{{--
                        <td style="text-align:center;">{{$ord->id_oficina}}</td>
                        --}}{{--<td style="text-align:center;">{{$despacho->fecha_orden}}</td>--}}{{--
                        <td style="text-align:center;">{{$ord->id_departamento}}</td>
                        <td style="text-align:center;">{{$ord->fecha_hora_orden}}</td>
                    </tr>
                @endforeach--}}
           {{-- </table>--}}


            {{--   </table>--}}
     {{--       {!!$orden->render()!!}
        </div>
    </div>
    </div>--}}
@endsection