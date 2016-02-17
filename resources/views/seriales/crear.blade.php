@extends('app')
@section('title', 'Crear Serial')
@section('content')
    <div class="container">
        {!!Form::open(['action'=>'SerialesController@store'])!!}

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
            <div class="panel-heading" style="text-align:center;">EDITAR SERIALES</div>
            <div class="panel-body">
                {{--<div class="col-md-6">
                    {!!Form::label('oficina','Oficina:')!!}
                    {!!Form::select('oficina',$oficina,['Por Favor Seleccione'],['class'=>'form-control'])!!}
                </div>--}}
                <div class="col-md-6">
                    {!!Form::label('serial','Serial:')!!}
                    {!!Form::text('serial',null,array('class'=>'form-control','type'=>'text'))!!}
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