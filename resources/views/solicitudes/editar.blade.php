@extends('app')
@section('content')
    <div class="container">
        {!!Form::open(['url'=>'solicitudes/'.$solicitud->id_solicitud])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">VER DETALLE</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('solicitud','Solicitud:')!!}
                    {!!Form::text('solicitud',$solicitud->id_solicitud,['class'=>'form-control','type'=>'text','readonly'=>true])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('oficina','Oficina:')!!}
                    {!!Form::text('oficina',$solicitud->id_oficina,array('class'=>'form-control','type'=>'text','readonly'=>true))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('departamento','Departamento:')!!}
                    {!!Form::text('departamento',$solicitud->id_departamento,array('class'=>'form-control','type'=>'text','readonly'=>true))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('fecha_solicitud','Fecha Solicitud:')!!}
                    {!!Form::text('fecha_solicitud',$solicitud->fecha_solicitud,array('class'=>'form-control','type'=>'text','readonly'=>true))!!}
                </div>
                <div class="col-md-6" id="desde">
                    {!!Form::label('desde','Desde:')!!}
                    {!!Form::text('desde',$solicitud->desde,array('class'=>'form-control','type'=>'text','id'=>'desdes','readonly'=>true))!!}
                </div>
                <div class="col-md-6" id="hasta">
                    {!!Form::label('hasta','Hasta:')!!}
                    {!!Form::text('hasta',$solicitud->hasta,array('class'=>'form-control','type'=>'text','id'=>'hastas','readonly'=>true))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('beneficiario','Beneficiario:')!!}
                    {!!Form::text('beneficiario',$solicitud->beneficiario,array('class'=>'form-control','type'=>'text','readonly'=>true))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('telef_beneficiario','Telefono Beneficiario:')!!}
                    {!!Form::text('telef_beneficiario',$solicitud->telef_beneficiario,array('class'=>'form-control','type'=>'text','readonly'=>true))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('email_beneficiario','Email Beneficiario:')!!}
                    {!!Form::text('email_beneficiario',$solicitud->email_beneficiario,array('class'=>'form-control','type'=>'text','readonly'=>true))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('tipo_solicitud','Tipo Solicitud:')!!}
                    {!!Form::text('tipo_solicitud',$solicitud->tipo_solicitud,array('class'=>'form-control','type'=>'text','readonly'=>true))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('estatus','Estatus:')!!}
                    {!!Form::text('estatus',$solicitud->estatus,array('class'=>'form-control','type'=>'text','readonly'=>true))!!}
                </div>
                <div>

                </div>

            </div>
            <div class="col-md-offset-5">
                {!!Form::submit('Editar',array('class'=>'btn btn-primary btn-md'))!!}
                {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    </div>
    {!!Form::close()!!}
    </div>

    <script>
        $('#desde').hide();
        $('#hasta').hide();

        if ($('#desdes').val() !='')
        {
            $('#desde').show();
        }

        if ($('#hastas').val() !='')
        {
            $('#hasta').show();
        }

    </script>

@endsection