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

        {!!Form::open(['url'=>'tiporenglon/'.$trenglon->id_tipo_renglon])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR TIPO DE RENGLON</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('descripcion','Nueva Descripción:')!!}
                    {!!Form::text('descripcion',$trenglon->descrip_tipo_renglon,array('class'=>'form-control','id'=>'tipo_articulo'))!!}
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

    <script>
     $(document).ready(function(){
        $('#form').submit(function() {
            var tipo_articulo = $('#tipo_articulo').val();

            if (tipo_articulo.length > 150 || tipo_articulo == "") {
                $('#info').html("<div class='alert alert-danger'><b>El Campo Descripcion debe ser menor a 150 Caracteres</b></div>");
                return false;
            }
        })
     });
    </script>
@endsection