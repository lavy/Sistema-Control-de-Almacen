@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(['action'=>'AlmacenController@store'])!!}

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
            <div class="panel-heading" style="text-align:center;">CREAR ALMACÉN</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('descripcion','Descripción del Almacen:')!!}
                    {!!Form::text('descripcion',null,['class'=>'form-control','type'=>'text'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('direccion','Dirección:')!!}
                    {!!Form::text('direccion',null,['class'=>'form-control','type'=>'text'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('telefono','Telefono:')!!}
                    {!!Form::text('telefono',null,['class'=>'form-control','type'=>'text'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('persona_contacto','Persona Contacto:')!!}
                    {!!Form::text('persona_contacto',null,['class'=>'form-control','type'=>'text'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('telef_contacto','Telefono Contacto:')!!}
                    {!!Form::text('telef_contacto',null,['class'=>'form-control','type'=>'text'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('celular_contacto','Celular Contacto:')!!}
                    {!!Form::text('celular_contacto',null,['class'=>'form-control','type'=>'text'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('correo_contacto','Correo Contacto:')!!}
                    {!!Form::email('correo_contacto',null,['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="col-md-offset-5" >
                {!!Form::submit('Aceptar',['class'=>'btn btn-primary','name'=>'Aceptar'])!!}
                {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    </div>
    {!!Form::close()!!}
    </div>
@endsection
