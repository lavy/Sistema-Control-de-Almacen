@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(['url'=>'departamentos/'.$departamento->id_departamento])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR DEPARTAMENTOS</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('descripcion','Nueva Descripción:')!!}
                    {!!Form::text('descripcion',$departamento->descrip_departamento,array('class'=>'form-control'))!!}
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