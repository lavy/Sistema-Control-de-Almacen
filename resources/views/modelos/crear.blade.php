@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(['action'=>'ModelosController@store','id'=>'form'])!!}

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
            <div class="panel-heading" style="text-align:center;">CREAR MODELOS</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('marca','Marca:')!!}
                    {!!Form::select('marca',$marca,'',['class'=>'form-control','id'=>'marca'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('descripción','Descripción:')!!}
                    {!!Form::text('descripcion',null,array('class'=>'form-control','type'=>'text','id'=>'modelo'))!!}
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
        $(document).ready(function(){

            $('#form').submit(function(){
                var Marca=$('#marca').val();
                var Modelo=$('#modelo').val();

                if(Marca == 0){
                    $('#info').html("<div class='alert alert-danger'><b>Debe Seleccionar una Marca</b></div>");
                    return false;
                }
                else if(Modelo.length > 250 || Modelo == ""){
                    $('#info').html("<div class='alert alert-danger'><b>El Campo Descripción debe ser menor a 150 Caracteres</b></div>");
                    return false;
                }

            });
        });

    </script>
@endsection