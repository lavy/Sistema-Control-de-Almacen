@extends('app')
@section('title', 'Editar Categoria')
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
        {!!Form::open(['url'=>'categorias/'.$categorias->id_categoria,'id'=>'form'])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR CATEGORIAS</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('categoria','Descripción Categoria:')!!}
                    {!!Form::text('categoria',$categorias->descrip_categoria,array('class'=>'form-control','id'=>'categoria'))!!}
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
                var Categorias=$('#categoria').val();

                if(Categorias.length > 100 || Categorias.length == ""){
                    $('#info').html("<div class='alert alert-danger'><b></b></div>")
                    return false;
                }

            })
        });
    </script>
@endsection