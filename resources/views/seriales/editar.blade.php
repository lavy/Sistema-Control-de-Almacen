@extends('app')
@section('title', 'Editar Serial')
@section('content')
    <div class="container">
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
        {!!Form::open(['url'=>'seriales/'.$serial->id_serial])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR SERIAL</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('serial','Serial:')!!}
                    {!!Form::text('serial',$serial->serial,array('class'=>'form-control'))!!}
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