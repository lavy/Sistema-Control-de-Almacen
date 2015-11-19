@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(array('method'=>'post'))!!}
        <form action="" method="post">
            <div class="form-group">
                <h1>SERVICIO DE PRÉSTAMO</h1>

                <h4>OFICINA DE TECNOLOGÍA, INFORMÁTICA Y TELECOMUNICACIONES</h4>

                <div class="panel panel-primary">
                    <div class="panel-heading" style="text-align:center;">DATOS DEL TRABAJADOR(A)</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            {!!Form::label('nombre','NOMBRES Y APELLIDOS:')!!}
                            {!!Form::select('nombre',array('Por Favor Seleccione'),0,array('class'=>'form-control')) !!}
                        </div>
                        <div class="col-md-6">
                            {!!Form::label('ci','CEDULA DE IDENTIDAD:')!!}
                            {!!Form::text('ci','null',['class'=>'form-control','type'=>'text'])!!}
                        </div>
                        <div class="col-md-6">
                            {!!Form::label('cargo','CARGO:')!!}
                            {!!Form::select('cargo','null',array('Por Favor Seleccione'),0,array('class'=>'form-control'))!!}
                        </div>
                        <div class="col-md-6">
                            {!!Form::label('ubicacion','UBICACIÓN ADMINISTRATIVA:')!!}
                            {!!Form::text('ubicacion',null,['class'=>'form-control','type'=>'text'])!!}
                        </div>
                        <div class="col-md-9">
                            PRESTAMO DE:{!!Form::select('prestamo',null,array('Por Favor Seleccione'),0,array('class'=>'form-control'))!!}
                        </div>
                        <div class="col-md-6">
                            {!!Form::label('horas','N° HORAS:')!!}
                            {!Form::text('horas','null',['class'=>'form-control','type'=>'text'])!!}
                        </div>
                        <div class="col-md-6">
                            {!!Form::label('dias','N° DIAS:')!!}
                            {!!Form::text('dias','null',['class'=>'form-control','type'=>'text'])!!}
                        </div>
                        <div class="col-md-6">
                            {!!Form::label('fecha_inicio','FECHA DE INICIO:')!!}
                            {!!Form::text('fecha_inicio','null',['class'=>'form-control','type'=>'text'])!!}
                        </div>
                        <div class="col-md-6">
                            {!!Form::label('fecha_culminacion','FECHA DE CULMINACIÓN:')!!}
                            {!!Form::text('fecha_culminacion','null',['class'=>'form-control','type'=>'text'])!!}
                        </div>
                        <div class="col-md-9">
                            {!!Form::label('comentarios','COMENTARIOS:')!!}
                            {!!Form::text('comentarios','null',['class'=>'form-control'])!!}
                        </div>
                        <div class="col-md-6">
                            {!!Form::label('coordinación','COORDINACIÓN::')!!}
                            {!!Form::text('coordinacion','null',['class'=>'form-control','type'=>'text'])!!}
                        </div>
                        <div class="col-md-6">
                            {!!Form::label('fecha_s','FECHA SOLICITUD:')!!}
                            {!!Form::text('fecha_s','null',['class'=>'form-control','type'=>'text'])!!}
                        </div>
                        <div class="col-md-6">
                            {!!Form::label('firma_t','FIRMA DEL TRABAJADOR:')!!}
                            {!!Form::text('firma_t','null',['class'=>'form-control','type'=>'text'])!!}
                        </div>

                    </div>
                </div>
            </div>
    </div>

    </div>
    {!!Form::close()!!}
    </div>
@endsection