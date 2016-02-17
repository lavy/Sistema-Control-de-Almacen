@extends('app')
@section('title', 'Tipos de Usuario')
@section('content')

    @if($errors->has())
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
                {!! $message !!}
            @endforeach
        </div>
    @endif

    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    <div class="panel panel-primary">
        <div class="panel-heading" style="text-align:center;">GRUPOS DE USUARIO</div>
        <div class="panel-body">
            {!!Form::open(['url'=>'niveles','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
            <div class="form-group">
                {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Nivel Usuario'])!!}
            </div>
            {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
            {!!Form::close()!!}

            <p>
            {!!link_to('crear_nivel','Crear Nuevo Nivel de Usuarios',['class'=>'btn btn-primary'])!!}
            </p>

            <p>
                Hay {{$nivel->total()}}
                @if($nivel->total() >1)
                    Niveles
                @else
                    Nivel
                @endif
            </p>
            <table class="table table-bordered">
                <tr>
                    <th style="text-align:center;"># NIVEL USUARIO</th>
                    <th style="text-align:center;">NIVEL USUARIO</th>
                    <th style="text-align:center;"></th>
                </tr>
                @foreach($nivel as $niveles)
                    <tr>
                        <td style="text-align:center;">{{$niveles->UserLevelID}}</td>
                        <td style="text-align:center;">{{$niveles->UserLevelName}}</td>
                        <td width="60" align="center">
                            {!! Html::link('niveles/editar/'.$niveles->UserLevelID, 'Editar', array('class' => 'btn btn-warning btn-xs')) !!}
                        </td>
                        {{--<td width="60">
                            {!! Html::link('permisos', 'Permisos', array('class' => 'btn btn-info btn-xs')) !!}
                        </td>--}}
                  {{--       <div class="col-md-6">
                    {!!Form::label('permisos','Permisos:')!!}
                    {!!Form::text('permisos',null,array('class'=>'form-control','type'=>'text'))!!}
                </div>--}}
                    </tr>
                @endforeach
            </table>
            {!!$nivel->render()!!}
        </div>
    </div>
    </div>
@endsection