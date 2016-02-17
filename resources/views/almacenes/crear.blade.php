@extends('app')

@section('title', 'Crear Almacen')

@section('content')

        {!!Form::open(['action'=>'AlmacenController@store','id'=>'form'])!!}

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
            <div class="panel-heading" style="text-align:center;">CREAR ALMACÉN</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('descripcion','Descripción del Almacen:')!!}
                    {!!Form::text('descripcion',null,['class'=>'form-control','type'=>'text','id'=>'descripcion'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('direccion','Dirección:')!!}
                    {!!Form::text('direccion',null,['class'=>'form-control','type'=>'text','id'=>'direccion'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('telefono','Telefono:')!!}
                    {!!Form::text('telefono',null,['class'=>'form-control','type'=>'text','id'=>'telefono'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('persona_contacto','Persona Contacto:')!!}
                    {!!Form::text('persona_contacto',null,['class'=>'form-control','type'=>'text','id'=>'contacto'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('telef_contacto','Telefono Contacto:')!!}
                    {!!Form::text('telef_contacto',null,['class'=>'form-control','type'=>'text','id'=>'telefono_c'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('celular_contacto','Celular Contacto:')!!}
                    {!!Form::text('celular_contacto',null,['class'=>'form-control','type'=>'text','id'=>'celular_c'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('correo_contacto','Correo Contacto:')!!}
                    {!!Form::email('correo_contacto',null,['class'=>'form-control','id'=>'correo'])!!}
                </div>
            </div>
            <div class="col-md-offset-5" >
                {!!Form::submit('Aceptar',['class'=>'btn btn-primary','name'=>'Aceptar'])!!}
                {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    {!!Form::close()!!}


    <script type="text/javascript">
        $(document).ready(function(){

           $('#form').submit(function(){
              var Almacen=$('#descripcion').val();
              var Direccion=$('#direccion').val();
              var Telefono=$('#telefono').val();
              var Persona=$('#contacto').val();
              var Telefono_C=$('#telefono_c').val();
              var Celular_C=$('#celular_c').val();
              var correo=$('#correo').val();

               if(Almacen.length > 150 || Almacen.length == ""){
                   $('#info').html("<div class='alert alert-danger'><b>El Campo Descripción debe ser menor a 150 Caracteres</b></div>");
                   return false;
               }


               else if(Direccion.length > 250 || Direccion.length == ""){
                   $('#info').html("<div class='alert alert-danger'><b>El Campo Direccion debe ser menor a 250 Caracteres</b></div>")
                   return false;
               }

               else if(Telefono.length != 11 || Telefono.length == "" || isNaN(Telefono)){
                   $('#info').html("<div class='alert alert-danger'><b>El Campo Telefono debe ser menor a 11 Caracteres, no debe estar vacio y debe ser numerico</b></div>")
                   return false;
               }

               else if(Persona.length > 50 || Persona.length == ""){
                   $('#info').html("<div class='alert alert-danger'><b>El Campo Persona Contacto debe ser menor a 50 Caracteres</b></div>")
                   return false;
               }

               else if(Telefono_C.length != 11 || Telefono_C.length == "" || isNaN(Telefono_C)){
                   $('#info').html("<div class='alert alert-danger'><b>El Campo Telefono Contacto debe ser menor a 11 Caracteres, no debe estar vacio y debe ser numerico</b></div>")
                   return false;
               }

               else if(Celular_C.length != 11 || Celular_C.length == "" || isNaN(Celular_C)){
                   $('#info').html("<div class='alert alert-danger'><b>El Campo Celular Contacto debe ser menor a 11 Caracteres, no debe estar vacio y debe ser numerico</b></div>")
                   return false;
               }
               else if(correo.length > 50 || correo.length == ""){
                   $('#info').html("<div class='alert alert-danger'><b>El Campo Celular Contacto debe ser menor a 50 Caracteres</b></div>")
                   return false;
               }
           });
        });


    </script>
@endsection
