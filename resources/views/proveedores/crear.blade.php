@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(['action'=>'ProveedorController@store'])!!}

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
            <div class="panel-heading" style="text-align:center;">CREAR PROVEEDOR</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('nombre_proveedor','Nombre Proveedor:')!!}
                    {!!Form::text('nombre_proveedor',null,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('contacto','Contacto:')!!}
                    {!!Form::text('contacto',null,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('telefono_proveedor','Telefono de Proveedor:')!!}
                    {!!Form::text('telefono_proveedor',null,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('telefono_contacto','Telefono de Contacto:')!!}
                    {!!Form::text('telefono_contacto',null,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('email','Email:')!!}
                    {!!Form::text('email',null,array('class'=>'form-control','type'=>'text'))!!}
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