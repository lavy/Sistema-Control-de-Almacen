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
        {!!Form::open(['url'=>'almacen/'.$almacen->id_almacen])!!}

        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR ALMACÉN</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('descripcion','Descripción del Almacen:')!!}
                    {!!Form::text('descripcion',$almacen->descrip_almacen,['class'=>'form-control','type'=>'text'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('direccion','Dirección:')!!}
                    {!!Form::text('direccion',$almacen->direccion,['class'=>'form-control','type'=>'text'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('telefono','Telefono:')!!}
                    {!!Form::text('telefono',$almacen->telefono,['class'=>'form-control','type'=>'text'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('persona_contacto','Persona Contacto:')!!}
                    {!!Form::text('persona_contacto',$almacen->persona_contacto_almacen,['class'=>'form-control','type'=>'text'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('telef_contacto','Telefono Contacto:')!!}
                    {!!Form::text('telef_contacto',$almacen->telef_contacto_almacen,['class'=>'form-control','type'=>'text'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('celular_contacto','Celular Contacto:')!!}
                    {!!Form::text('celular_contacto',$almacen->celular_contacto_almacen,['class'=>'form-control','type'=>'text'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('correo_contacto','Correo Contacto:')!!}
                    {!!Form::email('correo_contacto',$almacen->email_contacto_almacen,['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="col-md-offset-5" >
                {!!Form::submit('Editar',['class'=>'btn btn-primary','name'=>'Aceptar'])!!}
                {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    </div>
    {!!Form::close()!!}
    </div>
@endsection