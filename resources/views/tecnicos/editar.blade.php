@extends('app')
@section('content')

        @if($errors->has())
            <div class='alert alert-danger'>
                @foreach ($errors->all('<p>:message</p>') as $message)
                    {!! $message !!}
                @endforeach
            </div>
        @endif
        <div id="info"></div>
        {!!Form::open(['url'=>'tecnicos/'.$tecnicos->id_tecnico,'files'=>'true','id'=>'form'])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR TÉCNICO</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('nombre_tecnico','Nombre de Tecnico:')!!}
                    {!!Form::text('nombre_tecnico',$tecnicos->nombres_apellidos,array('class'=>'form-control','type'=>'text','id'=>'nombre'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('cedula','Cedula Identidad:')!!}
                    {!!Form::text('cedula',$tecnicos->cedula,array('class'=>'form-control','type'=>'text','id'=>'cedula'))!!}
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

    {!!Form::close()!!}

    <script type="text/javascript">
        $(document).ready(function(){
           $('#form').submit(function(){
               var Nombre=$('#nombre').val();
               var Cedula=$('#cedula').val();

               if(Nombre > 60 || Nombre == ""){
                   $('#info').html("<div class='alert alert-danger'><b>El campo Nombre del Técnico debe ser menor a 60 Caracteres</b></div>");
                   return false;
               }
               else if(Cedula > 11 || Cedula == ""){
                   $('#info').html("<div class='alert alert-danger'><b>El campo Cedula debe ser menor a 11 Caracteres</b></div>");
                   return false;
               }
           })
        });
    </script>
@endsection