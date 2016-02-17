@extends('app')
@section('title', 'Crear Jefe')
@section('content')
    <div class="container">
        {!!Form::open(['action'=>'JefesController@store','id'=>'form'])!!}

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
            <div class="panel-heading" style="text-align:center;">CREAR SUPERVISOR</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('oficina','Oficina:')!!}
                    {!!Form::select('oficina',$oficinas,'',['class'=>'form-control','id'=>'oficina'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('nombre','Nombre:')!!}
                    {!!Form::text('nombre',null,array('class'=>'form-control','type'=>'text','id'=>'nombre'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('cedula','Cedula:')!!}
                    {!!Form::text('cedula',null,array('class'=>'form-control','type'=>'text','id'=>'cedula'))!!}
                </div>
                <div class="row">
                    <div class='col-md-6'>
                        <div class="form-group">
                            <label for="fecha_ingreso">Fecha Ingreso</label>
                            <div class='input-group date' id='datetimepicker5'>
                                <input type='text' class="form-control" name="fecha_ingreso" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
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
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#cedula").keyup(function (){
                var cedula = $('#cedula').val();
                if (cedula != "") {
                    $.ajax({
                        method: "GET",
                        url: "jefs",
                        data: "cedula="+cedula,
                        success: function (data) {
                            if(data == 'Disponible'){
                                $('#info').html("<input type='hidden' id='disponible' value='true' name='disponible'><div class='alert alert-success'><b>Disponible</b></div>");
                            }else if (data == 'No Disponible'){
                                $('#info').html("<input type='hidden' id='no_disponible' value='false' name='disponible'><div class='alert alert-danger'><b>Ya la Cedula Existe</b></div>");
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
                var Oficina=$('#oficina').val();
                var Nombre=$('#nombre').val();
                var Cedula=$('#cedula').val();
                var Disponible=$('#no_disponible').val();

                /*var ()
                var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
                var dtArray = currVal.match(rxDatePattern);*/

                if(Oficina == 0){
                    $('#info').html("<div class='alert alert-danger'><b>Debe Seleccionar una Oficina</b></div>")
                    return false;
                }
                else if(Nombre.length > 100 || Nombre.length == ""){
                    $('#info').html("<div class='alert alert-danger'><b>El Campo Nombre debe ser menor a 100 caracteres</b></div>")
                    return false;
                }
                else if(Cedula.length > 8 || Cedula.length == "" || isNaN(Cedula)){
                    $('#info').html("<div class='alert alert-danger'><b>El Campo Cedula debe ser menor a 8 caracteres y Numerico</b></div>")
                    return false;
                }
                else if(Disponible == true ){
                    $('#info').html("<div class='alert alert-danger'><b>La Cedula ya se encuentra registrada</b></div>")
                    return false;
                }
            })
        });

    </script>
@endsection