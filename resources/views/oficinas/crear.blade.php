@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(['action'=>'OficinasController@store'])!!}

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
    </div>
    {!!Form::close()!!}
    </div>
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
                                $('#info').html("<div class='alert alert-success'><b>Disponible</b></div>");
                            }else{
                                $('#info').html("<div class='alert alert-danger'><b>No Disponible</b></div>");
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection