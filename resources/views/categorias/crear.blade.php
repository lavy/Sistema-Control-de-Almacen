@extends('app')
@section('title', 'Crear Categoria')
@section('content')
    <div class="container">
        {!!Form::open(['action'=>'CategoriasController@store','id'=>'form'])!!}

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

        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">CREAR CATEGORIA</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('categoria','Categoria:')!!}
                    {!!Form::text('categoria',null,array('class'=>'form-control','type'=>'text','id'=>'categoria'))!!}
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