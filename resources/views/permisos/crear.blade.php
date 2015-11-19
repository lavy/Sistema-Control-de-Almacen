@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(['action'=>'PermisosController@store'])!!}

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
            <div class="panel-heading" style="text-align:center;">CREAR PERMISO</div>
            <div class="panel-body">
               {{-- <div class="col-md-6">
                    {!!Form::label('numero_p','Número Permiso:')!!}
                    {!!Form::text('numero_p',null,array('class'=>'form-control','type'=>'text'))!!}
                </div>--}}
                <div class="col-md-6">
                    {!!Form::label('opcion','Opción Menu:')!!}
                    {!!Form::select('opcion',$permisos,'',['class'=>'form-control'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('nivel_usuario','Nivel Usuario:')!!}
                    {!!Form::select('nivel_usuario',$userlevel,'',['class'=>'form-control'])!!}
                </div>
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