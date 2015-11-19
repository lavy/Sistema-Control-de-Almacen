@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(['url'=>'subcategorias/'.$subcat->id_subcategoria])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR SUBCATEGORIA</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('descripcion','Descripción:')!!}
                    {!!Form::text('descripcion',$subcat->descrip_subcategoria,array('class'=>'form-control','type'=>'text'))!!}
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
@endsection