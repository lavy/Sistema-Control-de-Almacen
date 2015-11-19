@extends('app')

@section('content')
    <div class="container">
        {!! Form::open(array('url' =>'solicitudes/eliminar/'.$solicitudes->id_solicitud, 'method' => 'DELETE')) !!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">TRANSFERENCIA DE SOLICITUD AL ALMACEN</div>
            <div class="panel-body">

                <p>IMPORTANTE SI NO ESTÁ SEGURO DE PROCESAR LA SOLICITUD, <b>NO PULSE EL BOTON</b>
                "Transferir Solicitud al Almacén" ESTA ACCIÓN NO SE PODRÁ DESHACER Y LA SOLICITUD SERÁ
                TRANSFERIDA AUTOMATICAMENTE CON LOS DATOS DE SU SESION (NOMBRE Y APELLIDO), PARA GENERAR
                LA ORDEN DE SUMINISTRO.</p>


                <table class="table table-bordered">
                    <tr>
                        <th width="20px" style="text-align:center;font:bold 14px 'cursive';">{!!Form::label('solicitud','# SOLICITUD:')!!}</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">{!!Form::label('fecha_solicitud','FECHA SOLICITUD:')!!}</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">{!!Form::label('oficina','OFICINA:')!!}</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">{!!Form::label('departamento','DEPARTAMENTO:')!!}</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">{!!Form::label('beneficiario','BENEFICIARIO:')!!}</th>
                        <th style="text-align:center;font:bold 14px 'cursive';"> {!!Form::label('telef_beneficiario','TELEFONOS:')!!}</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">{!!Form::label('detalles','DETALLES:')!!}</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">{!!Form::label('estatus','ESTATUS:')!!}</th>

                    </tr>
                        <tr>
                            <td style="text-align:center;">{!!Form::text('solicitud',$solicitudes->id_solicitud,['class'=>'form-control','disabled'=>'true','type'=>'text'])!!}</td>
                            <td style="text-align:center;">{!!Form::text('fecha_solicitud',$solicitudes->fecha_solicitud,['class'=>'form-control','disabled'=>'true','type'=>'text'])!!}</td>
                            <td>{!!Form::text('oficina',$solicitudes->id_oficina,['class'=>'form-control','disabled'=>'true','type'=>'text'])!!}</td>
                            <td>{!!Form::text('departamento',$solicitudes->id_departamento,['class'=>'form-control','disabled'=>'true','type'=>'text'])!!}</td>
                            <td>{!!Form::text('beneficiario',$solicitudes->beneficiario,['class'=>'form-control','disabled'=>'true','type'=>'text'])!!}</td>
                            <td>{!!Form::text('telef_beneficiario',$solicitudes->telef_beneficiario,['class'=>'form-control','disabled'=>'true','type'=>'text'])!!}</td>
                            <td>{!!Form::text('detalles',$solicitudes->pedido,['class'=>'form-control','disabled'=>'true','type'=>'text'])!!}</td>
                            <td>{!!Form::text('estatus',$solicitudes->estatus,['class'=>'form-control','disabled'=>'true','type'=>'text'])!!}</td>
                        </tr>
                </table>

                <div class="col-md-offset-4">
                    {!!Form::submit('Transferir Solicitud al Almacén',array('class'=>'btn btn-primary'))!!}
                    {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
                </div>

            </div>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
@endsection
