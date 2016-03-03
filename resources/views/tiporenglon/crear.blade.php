@extends('app')
@section('title', 'Crear Tipo de Articulo')
@section('content')
    <div class="container">
        {!!Form::open(['action'=>'TiporenglonController@store','id'=>'form'])!!}

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
            <div class="panel-heading" style="text-align:center;">CREAR TIPO ARTICULO</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('categoria','Categoria:')!!}
                    {!!Form::select('categoria',$categorias,'',['class'=>'form-control','id'=>'categoria'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('descripcion','Descripción:')!!}
                    {!!Form::text('descripcion',null,array('class'=>'form-control','type'=>'text','id'=>'tipo_articulo'))!!}
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
            $("#tipo_articulo").blur(function () {
                var tipo_articulo = $('#tipo_articulo').val().trim();
                if (tipo_articulo != "") {
                    $.ajax({
                        method: "GET",
                        url: "t_articulo",
                        data: "t_articulo="+tipo_articulo,
                        success: function (data) {
                            if(data == 'Disponible'){
                                $('#info').html("<input type='hidden' id='disponible' value='si' name='disponible'><div class='alert alert-success'><b>Disponible</b></div>");
                            }else{
                                $('#info').html("<input type='hidden' id='disponible' value='no' name='disponible'><div class='alert alert-danger'><b>El Tipo de Articulo ya existe</b></div>");
                            }
                        }
                    });
                }
            });



            $('#form').submit(function() {
                var tipo_articulo = $('#tipo_articulo').val();
                var categoria = $('#categoria').val();
                var Disponible=$('#disponible').val();

                if (categoria == 0) {
                    $('#info').html("<div class='alert alert-danger'><b>Debe seleccionar una categoria</b></div>");
                    return false;
                }
                else if (tipo_articulo.length > 150 || tipo_articulo == "") {
                    $('#info').html("<div class='alert alert-danger'><b>El Campo Descripcion debe ser menor a 150 Caracteres</b></div>");
                    return false;
                }
                else if(Disponible =='no'){
                    $('#info').html("<input type='hidden' id='disponible' value='no' name='disponible'><div class='alert alert-danger'><b>El Tipo de Articulo ya esta registrado</b></div>");
                    return false;
                }
            });
        });
    </script>
@endsection