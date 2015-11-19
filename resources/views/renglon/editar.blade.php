@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(['url'=>'renglones/'.$renglon->id_renglon])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR ARTÍCULO</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('tipo_renglon','Tipo de Renglon:')!!}
                    {!!Form::select('tipo_renglon',array('Por Favor Seleccione',$renglon->id_tipo_renglon),0,['class'=>'form-control','id'=>'tipo_renglon'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('codigo_fabricante','Codigo Fabricante:')!!}
                    {!!Form::text('codigo_fabricante',$renglon->codigo_fabricante,['class'=>'form-control','type'=>'text'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('descripcion','Nueva Descripción:')!!}
                    {!!Form::text('descripcion',$renglon->descrip_renglon,array('class'=>'form-control'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('unidad_medida','Unidad de Medida:')!!}
                    {!!Form::text('unidad_medida',$renglon->unidad_medida,['class'=>'form-control','type'=>'text'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('existencia_minima','Existencia Minima:')!!}
                    {!!Form::text('existencia_minima',$renglon->existencia_minima,['class'=>'form-control','type'=>'text'])!!}
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