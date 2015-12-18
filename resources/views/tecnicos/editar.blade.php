@extends('app')
@section('content')
    <div class="container">
        {!!Form::open(['url'=>'tecnicos/'.$tecnicos->id_tecnico,'files'=>'true'])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR TÉCNICO</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('nombre_tecnico','Nombre de Tecnico:')!!}
                    {!!Form::text('nombre_tecnico',$tecnicos->nombres_apellidos,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('cedula','Cedula Identidad:')!!}
                    {!!Form::text('cedula',$tecnicos->cedula,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                {{--<div class="col-md-6">
                    --}}{{--{!!Form::label('foto','Foto del Tecnico:')!!}
                    {!!Form::file('foto',['class'=>'btn-file'])!!}--}}{{--
                </div>--}}

                <div class="col-md-6">
                    {!!Form::label('estatus','Estatus:')!!}
                    {!!Form::select('estatus',['Activo'=>'Activo','Inactivo'=>'Inactivo'],$tecnicos->estatus,['class'=>'form-control','id'=>'estatus'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('foto_t','Foto Tecnico:')!!}
                    {!!Form::file('foto_t')!!}
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
@endsection