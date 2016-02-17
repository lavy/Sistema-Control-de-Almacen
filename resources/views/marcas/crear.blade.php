@extends('app')
@section('title', 'Crear Marca')
@section('content')
    <div class="container">
        {!!Form::open(['action'=>'MarcasController@store','id'=>'form'])!!}

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
            <div class="panel-heading" style="text-align:center;">CREAR MARCA</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('proveedor','Proveedor:')!!}
                    {!!Form::select('proveedor',$proveedor,'',['class'=>'form-control','id'=>'proveedor'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('descripcion','Descripción:')!!}
                    {!!Form::text('descripcion',null,array('class'=>'form-control','type'=>'text','id'=>'marca'))!!}
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
            $("#marca").keyup(function () {
                var marca = $('#marca').val();
                if (marca != "") {
                    $.ajax({
                        method: "GET",
                        url: "marcs",
                        data: "marca="+marca,
                        success: function (data) {
                            if(data == 'Disponible'){
                                $('#info').html("<input type='hidden' id='disponible' value='true' name='disponible'><div class='alert alert-success'><b>Disponible</b></div>");
                            }else{
                                $('#info').html("<input type='hidden' id='disponible' value='false' name='disponible'><div class='alert alert-danger'><b>Ya esta Marca ha sido registrada</b></div>");
                            }
                        }
                    });
                }
            });

            $('#form').submit(function(){
                var Proveedor=$('#proveedor').val();
                var Marca=$('#marca').val();
                var Disponible=$('#disponible').val();

                if(Proveedor == 0){
                    $('#info').html("<div class='alert alert-danger'><b>Debe Seleccionar un Proveedor</b></div>")
                    return false;
                }
                else if(Marca.length > 250 || Marca.length == ""){
                    $('#info').html("<div class='alert alert-danger'><b>El Campo Descripción debe ser menor a 250 caracteres</b></div>")
                    return false;
                }
                else if(Disponible != true  ){
                    $('#info').html("<div class='alert alert-danger'><b>La Marca ya se encuentra registrada</b></div>")
                    return false;
                }

            })
        });
    </script>

@endsection