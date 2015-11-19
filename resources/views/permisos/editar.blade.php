@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(['url'=>'permisos/'.$permisos->id_opcion])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR PERMISO</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('opcion','Opción Menu:')!!}
                    {!!Form::select('opcion',$permisos->id_opcion,'',['class'=>'form-control'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('nivel_usuario','Nivel Usuario:')!!}
                    {!!Form::select('nivel_usuario',$permisos->UserLevelID,'',['class'=>'form-control'])!!}
                </div>
               {{-- <div class="col-md-6">
                    {!!Form::label('descripcion','Nueva Descripción:')!!}
                    {!!Form::text('descripcion',$oficina->descrip_oficina,array('class'=>'form-control'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('descripcion','Nueva Descripción:')!!}
                    {!!Form::text('descripcion',$oficina->descrip_oficina,array('class'=>'form-control'))!!}
                </div>--}}
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