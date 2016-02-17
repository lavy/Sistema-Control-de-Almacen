@extends('app')
@section('title', 'Editar Marca')
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
        {!!Form::open(['url'=>'marcas/'.$marca->id_marca,'id'=>'form'])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR MARCAS</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('proveedor','Proveedor:')!!}
                    {!!Form::select('proveedor',$proveedor,$marca->id_proveedor,['class'=>'form-control','id'=>'proveedor'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('descripcion','Nueva Descripción:')!!}
                    {!!Form::text('descripcion',$marca->descrip_marca,array('class'=>'form-control','id'=>'marca'))!!}
                </div>
            </div>
            <div class="col-md-offset-5">
                {!!Form::submit('Editar',array('class'=>'btn btn-primary btn-md'))!!}
                {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    </div>
    {!!Form::close()!!}
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#form').submit(function(){
                var Proveedor=$('#proveedor').val();
                var Marca=$('#marca').val();

                if(Proveedor == 0){
                    $('#info').html("<div class='alert alert-danger'><b>Debe Seleccionar un Proveedor</b></div>")
                    return false;
                }
                else if(Marca.length > 250 || Marca.length == ""){
                    $('#info').html("<div class='alert alert-danger'><b>El Campo Descripción debe ser menor a 250 caracteres</b></div>")
                    return false;
                }

            })
        });
    </script>
@endsection