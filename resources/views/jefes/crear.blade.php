@extends('app')
@section('content')
    <div class="container">
        {!!Form::open(['action'=>'JefesController@store'])!!}

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
            <div class="panel-heading" style="text-align:center;">CREAR JEFE</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('oficina','Oficina:')!!}
                    {!!Form::select('oficina',$oficinas,'',['class'=>'form-control'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('nombre','Nombre:')!!}
                    {!!Form::text('nombre',null,array('class'=>'form-control','type'=>'text'))!!}
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
            $("#cedula").keyup(function () {
                var cedula = $('#cedula').val();
                if (cedula != "") {
                    $.ajax({
                        method: "GET",
                        url: "jefs",
                        data: "cedula="+cedula,
                        success: function (data) {
                            if(data == 'Disponible'){
                                $('#info').html("<div class='alert alert-success'><b>Disponible</b></div>");
                            }else{
                                $('#info').html("<div class='alert alert-danger'><b>No Disponible</b></div>");
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
        });

    </script>
@endsection