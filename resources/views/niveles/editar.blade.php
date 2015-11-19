@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(['url'=>'nivel/'.$nivel->UserLevelID])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR OFICINA</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('nivel_usuario','Nivel Usuario:')!!}
                    {!!Form::text('nivel_usuario',$nivel->UserLevelID,array('class'=>'form-control'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('nombre_nivel','Nivel Usuario:')!!}
                    {!!Form::text('nombre_nivel',$nivel->UserLevelName,array('class'=>'form-control'))!!}
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