@extends('app')
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
                {!!Form::submit('Aceptar',['class'=>'btn btn-primary','name'=>'Aceptar'])!!}
                {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    </div>

    {!!Form::close()!!}

    <script type="text/javascript">
       $(document).ready(function() {
            $("#cedula").keyup(function () {
                var cedula = $('#cedula').val();
                if (cedula != "") {
                    $.ajax({
                        method: "GET",
                        url: "tecs",
                        data: "cedula=" + cedula,
                        success: function (data) {
                            if (data == 'Disponible') {
                                $('#info').html("<input type='hidden' id='disponible' value='true' name='disponible'><div class='alert alert-success'><b>Disponible</b></div>");
                            } else {
                                $('#info').html("<input type='hidden' id='disponible' value='false' name='disponible'><div class='alert alert-danger'><b>La Cedula ya existe</b></div>");
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

                   if(Nombre.length > 60 || Nombre == ""){
                       $('#info').html("<div class='alert alert-danger'><b>El Campo Nombre debe ser menor a 60 Caracteres</b></div>");
                       return false;
                   }
                   else if(Cedula.length > 11 || Cedula == ""){
                       $('#info').html("<div class='alert alert-danger'><b>El Campo Cedula debe ser menor a 11 Caracteres</b></div>")
                       return false;
                   }
                   else if(Disponible != true  ){
                       $('#info').html("<div class='alert alert-danger'><b>La Cedula ya se encuentra registrada</b></div>")
                       return false;
                   }
               });
        });
    </script>
@endsection