@extends('app')
@section('title', 'Crear Departamento')
@section('content')
        {!!Form::open(['action'=>'DepartamentosController@store','id'=>'form'])!!}

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
            <div class="panel-heading" style="text-align:center;">CREAR DEPARTAMENTO</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('oficina','Oficina:')!!}
                    {!!Form::select('oficina',$oficina,['Por Favor Seleccione'],['class'=>'form-control','id'=>'oficina'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('descripción','Descripción:')!!}
                    {!!Form::text('descripcion',null,array('class'=>'form-control','type'=>'text','id'=>'departamento'))!!}
                </div>
            </div>
            <div class="col-md-offset-5">
                {!!Form::submit('Aceptar',['class'=>'btn btn-primary','name'=>'Aceptar'])!!}
                {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    {!!Form::close()!!}


    <script type="text/javascript">
        $(document).ready(function() {
            $("#departamento").keyup(function () {
                var departamento = $('#departamento').val();
                if (departamento != "") {
                    $.ajax({
                        method: "GET",
                        url: "deptos",
                        data: "depto="+departamento,
                        success: function (data) {
                            if(data == 'Disponible'){
                                $('#info').html("<input type='hidden' id='disponible' value='true' name='disponible'><div class='alert alert-success'><b>Disponible</b></div>");
                            }else{
                                $('#info').html("<input type='hidden' id='disponible' value='false' name='disponible'><div class='alert alert-danger'><b>Ya el Departamento Existe</b></div>");
                            }
                        }
                    });
                }
            });

            $('#form').submit(function(){
                var Oficina=$('#oficina').val();
                var Departamento=$('#departamento').val();
                var Disponible=$('#disponible').val();

                if(Oficina == 0){
                    $('#info').html("<div class='alert alert-danger'><b>Debe Seleccionar una Oficina</b></div>");
                    return false;
                }
                else if(Departamento.length > 250 || Departamento == ""){
                    $('#info').html("<div class='alert alert-danger'><b>El Campo Descripción debe ser menor a 250 Caracteres</b></div>");
                    return false;
                }
                else if(Disponible != true  ){
                    $('#info').html("<div class='alert alert-danger'><b>El Departamento ya se encuentra registrado</b></div>")
                    return false;
                }

            });
        });
    </script>
@endsection