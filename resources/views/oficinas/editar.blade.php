@extends('app')

@section('content')

        @if($errors->has())
            <div class='alert alert-danger'>
                @foreach ($errors->all('<p>:message</p>') as $message)
                    {!! $message !!}
                @endforeach
            </div>
        @endif
        {!!Form::open(['url'=>'oficinas/'.$oficina->id_oficina,'id'=>'form'])!!}

        <div id="info"></div>

        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR OFICINA</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('descripcion','Nueva Descripción:')!!}
                    {!!Form::text('descripcion',$oficina->descrip_oficina,['class'=>'form-control','id'=>'oficina'])!!}
                </div>
            </div>
            <div class="col-md-offset-5">
                {!!Form::submit('Editar',array('class'=>'btn btn-primary btn-md'))!!}
                {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>

    {!!Form::close()!!}


    <script type="text/javascript">
        $(document).ready(function(){
        $('#form').submit(function(){
            var Oficina=$('#oficina').val();



            if(Oficina.length > 150 || Oficina == ""){
                $('#info').html("<div class='alert alert-danger'><b>El Campo Descripción debe ser menor a 150 Caracteres</b></div>");
                return false;
            }
            });
        });
    </script>
@endsection