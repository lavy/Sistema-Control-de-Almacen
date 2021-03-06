@extends('app')
@section('title', 'Crear Técnico')
@section('content')

        {!!Form::open(['action'=>'TecnicosController@store','files'=>'true','id'=>'form'])!!}

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
            <div class="panel-heading" style="text-align:center;">CARGAR PERSONAL DE SOPORTE</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('nombre_tecnico','Nombre de Tecnico:')!!}
                    {!!Form::text('nombre_tecnico',null,array('class'=>'form-control','type'=>'text','id'=>'nombre'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('cedula','Cedula Identidad:')!!}
                    {!!Form::text('cedula',null,array('class'=>'form-control','type'=>'text','id'=>'cedula'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('foto_t','Foto Tecnico:')!!}
                    {!!Form::file('foto_t')!!}
                </div>

                <div class="row">
                    <div class='col-md-6'>
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha Nacimiento</label>
                            <div class='input-group date' id='datetimepicker5'>
                                <input type='text' class="form-control" name="fecha_nacimiento" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="col-md-offset-5">
                {!!Form::submit('Aceptar',['class'=>'btn btn-primary','name'=>'Aceptar','id'=>'aceptar'])!!}
                {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    </div>

    {!!Form::close()!!}

    <script type="text/javascript">
       $(document).ready(function() {
            $("#cedula").blur(function () {
                var cedula = $('#cedula').val().trim();
                if (cedula != "") {
                    $.ajax({
                        method: "GET",
                        url: "tecs",
                        data: "cedula=" + cedula,
                        success: function (data) {
                            if (data == 'Disponible') {
                                $('#info').html("<input type='hidden' id='disponible' value='si' name='disponible'><div class='alert alert-success'><b>Disponible</b></div>");
                            } else {
                                $('#info').html("<input type='hidden' id='disponible' value='no' name='disponible'><div class='alert alert-danger'><b>La Cedula ya existe</b></div>");
                            }
                        }
                    });
                }
            });

           $(function () {
               $('#datetimepicker5').datetimepicker({
                   format:'DD-MM-YYYY'
               });
           });

               $('#form').submit(function(){
                   var Nombre=$('#nombre').val();
                   var Cedula=$('#cedula').val();
                   var Disponible=$('#disponible').val();

                   if(Nombre.length > 60 || Nombre.length == ""){
                       $('#info').html("<div class='alert alert-danger'><b>El Campo Nombre debe ser menor a 60 Caracteres</b></div>");
                       return false;
                   }
                   else if(Cedula.length > 8 || Cedula.length == ""){
                       $('#info').html("<div class='alert alert-danger'><b>El Campo Cedula debe ser menor o igual a 8 Caracteres</b></div>")
                       return false;
                   }
                   else if(Disponible =='no'){
                       $('#info').html("<input type='hidden' id='disponible' value='no' name='disponible'><div class='alert alert-danger'><b>La Cedula ya esta registrada</b></div>");
                       return false;
                   }
               });
        });
    </script>
@endsection