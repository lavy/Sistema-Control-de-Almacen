@extends('app')

@section('content')
    <div class="container">
        @if($errors->has())
            <div class='alert alert-danger'>
                @foreach ($errors->all('<p>:message</p>') as $message)
                    {!! $message !!}
                @endforeach
            </div>
        @endif

        <div id="info"></div>
        {!!Form::open(['url'=>'modelos/'.$modelo->id_modelo,'id'=>'form'])!!}

        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR MODELO</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('marca','Marca:')!!}
                    {!!Form::select('marca',$marca,$modelo->descrip_marca,['class'=>'form-control','id'=>'marca'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('descripcion','Descripcion:')!!}
                    {!!Form::text('descripcion',$modelo->descrip_modelo,array('class'=>'form-control','type'=>'text','id'=>'modelo'))!!}
                </div>
            </div>
            <div class="col-md-offset-5">
                {!!Form::submit('Aceptar',['class'=>'btn btn-primary','name'=>'Aceptar'])!!}
                {!!link_to('/','Salir',['class'=>'btn btn-primary'])!!}
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
                    $('#info').html("<div class='alert alert-danger'><b>El Campo Descripción debe ser menor a 250 Caracteres</b></div>");
                    return false;
                }

            });
        });

    </script>

@endsection