@extends('app')

@section('content')
    <div class="container">
        @if($errors->has())
            <div class='alert alert-danger'>
                @foreach ($errors->all('<p>:message</p>') as $message)
                    {!! $message !!}
                @endforeach
            </div>
        @endif
        {!!Form::open(['url'=>'modelos/'.$modelo->id_modelo])!!}

        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR MODELO</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('marca','Marca:')!!}
                    {!!Form::select('marca',$marca,$modelo->descrip_marca,['class'=>'form-control'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('descripcion','Descripcion:')!!}
                    {!!Form::text('descripcion',$modelo->descripcion,array('class'=>'form-control','type'=>'text'))!!}
                </div>
            </div>
            <div class="col-md-offset-5">
                {!!Form::submit('Aceptar',['class'=>'btn btn-primary','name'=>'Aceptar'])!!}
                {!!link_to('/','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    </div>

    {!!Form::close()!!}
    </div>
@endsection