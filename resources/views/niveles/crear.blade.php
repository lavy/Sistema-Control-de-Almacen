@extends('app')

@section('content')
    <div class="container">
        {!!Form::open([])!!}

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
            <div class="panel-heading" style="text-align:center;">CREAR NUEVO NIVEL</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('nivel_usuario','Nivel de Usuario:')!!}
                    {!!Form::text('nivel_usuario',null,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('nombre_nivel','Nombre de nivel:')!!}
                    {!!Form::text('nombre_nivel',null,array('class'=>'form-control','type'=>'text'))!!}
                </div>

               {{-- <div class="col-md-6">
                    {!!Form::label('permisos','Permisos:')!!}
                    {!!Form::text('permisos',null,array('class'=>'form-control','type'=>'text'))!!}
                </div>--}}
            </div>
            <div class="col-md-offset-5">
                {!!Form::submit('Aceptar',['class'=>'btn btn-primary','name'=>'Aceptar'])!!}
                {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    </div>
    {!!Form::close()!!}
    </div>
@endsection