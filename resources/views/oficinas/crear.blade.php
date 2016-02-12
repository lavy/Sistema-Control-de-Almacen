@extends('app')

@section('content')

        {!!Form::open(['action'=>'OficinasController@store','id'=>'form'])!!}

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
            <div class="panel-heading" style="text-align:center;">CREAR OFICINA</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('descripcion','Descripción:')!!}
                    {!!Form::text('descripcion',null,array('class'=>'form-control','type'=>'text','id'=>'oficina'))!!}
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
            $("#oficina").keyup(function () {
                var oficina = $('#oficina').val();
                if (oficina != "") {
                    $.ajax({
                        method: "GET",
                        url: "ofic",
                        data: "ofic="+oficina,
                        success: function (data) {
                            if(data == 'Disponible'){
                                $('#info').html("<input type='hidden' id='disponible' value='true' name='disponible'><div class='alert alert-success'><b>Disponible</b></div>");
                            }else{
                                $('#info').html("<input type='hidden' id='disponible' value='false' name='disponible'><div class='alert alert-danger'><b>Ya esta Oficina esta registrada</b></div>");
                            }
                        }
                    });
                }
            });

            $('#form').submit(function(){
                var Oficina=$('#oficina').val();
                var Disponible=$('#disponible').val();

                if(Oficina.length > 250 || Oficina == ""){
                    $('#info').html("<div class='alert alert-danger'><b>El Campo Descripción debe ser menor a 250 Caracteres</b></div>");
                    return false;
                }
                else if(Disponible != true  ){
                    $('#info').html("<div class='alert alert-danger'><b>La Oficina ya se encuentra registrada</b></div>")
                    return false;
                }

            });
        });
    </script>
@endsection