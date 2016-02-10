@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(['action'=>'UsuariosController@store','id'=>'form'])!!}

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
            <div class="panel-heading" style="text-align:center;">CREAR USUARIOS</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('almacen','Almacen:')!!}
                    {!!Form::select('almacen',$almacen,'',['class'=>'form-control','id'=>'almacen'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('nombre','Nombre:')!!}
                    {!!Form::text('nombre',null,array('class'=>'form-control','type'=>'text','id'=>'nombre'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('apellido','Apellido:')!!}
                    {!!Form::text('apellido',null,array('class'=>'form-control','type'=>'text','id'=>'apellido'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('email','Correo Institucional:')!!}
                    {!!Form::text('email',null,array('class'=>'form-control','type'=>'text','id'=>'correo'))!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('password','Password:')!!}
                    {!!Form::password('password',['class'=>'form-control','id'=>'contrasena'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('cedula','Cedula:')!!}
                    {!!Form::text('cedula',null,array('class'=>'form-control','type'=>'text','id'=>'cedula'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('cargo','Cargo:')!!}
                    {!!Form::text('cargo',null,array('class'=>'form-control','type'=>'text','id'=>'cargo'))!!}
                </div>
                {{--<div class="col-md-6">
                    {!!Form::label('codigo','Codigo:')!!}
                    {!!Form::text('codigo',null,array('class'=>'form-control','type'=>'text'))!!}
                </div>--}}
                <div class="col-md-6">
                    {!!Form::label('nivel_usuario','Nivel de Usuario:')!!}
                    {!!Form::select('nivel_usuario',$userlevel,'',['class'=>'form-control','id'=>'nivel_usuario'])!!}
                </div>
            </div>
            <div class="col-md-offset-5">
                {!!Form::submit('Aceptar',['class'=>'btn btn-primary','name'=>'Aceptar','id'=>'enviar'])!!}
                {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    </div>

    {!!Form::close()!!}
    </div>
    <script type="text/javascript">
     $(document).ready(function() {
         $("#correo").keyup(function () {
             var correo = $('#correo').val();
             if (correo != "") {
                 $.ajax({
                     method: "GET",
                     url: "correo_usuario",
                     data: "correo="+correo,
                     success: function (data) {
                         if(data == 'Disponible'){
                             $('#info').html("<div class='alert alert-success'><b>Disponible</b></div>");
                             return true;
                         }else{
                             $('#info').html("<div class='alert alert-danger'><b>No Disponible</b></div>");
                             return false;
                         }
                     }
                 });
             }
         });

         $('#form').submit(function(){
            var Almacen=$('#almacen').val();
            var Nombre=$('#nombre').val();
            var Apellido=$('#apellido').val();
            var Correo=$('#correo').val();
            var Contraseña=$('#contraseña').val();
            var Cedula=$('#cedula').val();
            var Cargo=$('#cargo').val();
            var Nivel_Usuario=$('#nivel_usuario').val();


             if (Almacen == 0) {
                 $('#info').html("<div class='alert alert-danger'><b>El Campo Almacen debe ser menor a 150 Caracteres</b></div>");
                 return false;
             }
             else if (Nombre.length > 60 || Nombre.length == "") {
                 $('#info').html("<div class='alert alert-danger'><b>El Campo Nombre debe ser menor a 50 Caracteres</b></div>");
                 return false;
             }
             else if (Apellido.length > 60 || Apellido.length == "") {
                 $('#info').html("<div class='alert alert-danger'><b>El Campo Apellido debe ser menor a 50 Caracteres</b></div>");
                 return false;
             }
             else if (Correo.length > 120 || Correo.length == "") {
                 $('#info').html("<div class='alert alert-danger'><b>El Campo Correo Institucional debe ser menor a 40 Caracteres</b></div>");
                 return false;
             }
             else if (Contraseña.length > 60 || Contraseña.length == "") {
                 $('#info').html("<div class='alert alert-danger'><b>El Campo Contraseña debe ser menor a 60 Caracteres</b></div>");
                 return false;
             }
             else if (Cedula.length > 11 || Cedula.length == "" || isNaN(Cedula)) {
                 $('#info').html("<div class='alert alert-danger'><b>El Campo Cedula debe ser menor a 11 Caracteres no debe estar vacio, y ser numerico</b></div>");
                 return false;
             }
             else if (Cargo.length > 100 || Cargo.length == "") {
                 $('#info').html("<div class='alert alert-danger'><b>El Campo Cargo debe ser menor a 100 Caracteres</b></div>");
                 return false;
             }
             else if (Nivel_Usuario == 0) {
                 $('#info').html("<div class='alert alert-danger'><b>Debe Seleccionar un Nivel de Usuario</b></div>");
                 return false;
             }
         });
     });
    </script>
@endsection