@extends('app')
@section('title', 'Editar Tipo Usuario')
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

    <div id="info"></div>
    <div class="container">
        {!!Form::open(['url'=>'niveles/'.$nivel->UserLevelID,'id'=>'form'])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR NIVEL USUARIO</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('nombre_nivel','Nivel Usuario:')!!}
                    {!!Form::text('nombre_nivel',$nivel->UserLevelName,array('class'=>'form-control','id'=>'nivel'))!!}
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