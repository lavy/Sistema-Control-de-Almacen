@extends('app')
@section('title', 'Editar Departamento')
@section('content')

        @if($errors->has())
            <div class='alert alert-danger'>
                @foreach ($errors->all('<p>:message</p>') as $message)
                    {!! $message !!}
                @endforeach
            </div>
        @endif
        <div id="info"></div>
        {!!Form::open(['url'=>'departamentos/'.$departamento->id_departamento,'id'=>'form'])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR DEPARTAMENTOS</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('oficina','Oficina:')!!}
                    {!!Form::select('oficina',$oficina,$departamento->id_oficina,['class'=>'form-control','id'=>'oficina'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('descripcion','Nueva Descripción:')!!}
                    {!!Form::text('descripcion',$departamento->descrip_departamento,['class'=>'form-control','id'=>'departamento'])!!}
                </div>
            </div>
            <div class="col-md-offset-5">
                {!!Form::submit('Editar',array('class'=>'btn btn-primary btn-md'))!!}
                {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    {!!Form::close()!!}

        <script type="text/javascript">
            $(document).ready(function() {
                $('#form').submit(function(){
                    var Oficina=$('#oficina').val();
                    var Departamento=$('#departamento').val();

                    if(Oficina == 0){
                        $('#info').html("<div class='alert alert-danger'><b>Debe Seleccionar una Oficina</b></div>");
                        return false;
                    }
                    else if(Departamento.length > 250 || Departamento == ""){
                        $('#info').html("<div class='alert alert-danger'><b>El Campo Descripción debe ser menor a 250 Caracteres</b></div>");
                        return false;
                    }

                });
            });
        </script>

@endsection