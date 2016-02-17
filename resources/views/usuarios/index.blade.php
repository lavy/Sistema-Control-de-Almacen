@extends('app')
@section('title', 'Usuarios')
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
        <div class="panel-heading" style="text-align:center;">USUARIOS</div>
        <div class="panel-body">
            {!!Form::open(['url'=>'usuarios','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
            <div class="form-group">
                {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por usuario','id'=>'buscar'])!!}
            </div>
            {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
            {!!Form::close()!!}

            <p>
            {!!link_to('crear_usuarios','Crear Nuevo Usuario',['class'=>'btn btn-primary'])!!}
            </p>

            <p>
                Hay {{$usuarios->total()}}
                @if($usuarios->total() >1)
                    Usuarios
                @else
                    Usuario
                @endif
            </p>
            <table class="table table-bordered">
                <tr>
                    <th style="text-align:center;">NOMBRE</th>
                    <th style="text-align:center;">EMAIL</th>
                    <th style="text-align:center;">CEDULA</th>
                    <th style="text-align:center;">CODIGO</th>
                    <th style="text-align:center;">NIVEL USUARIO</th>
                </tr>
                @foreach($usuarios as $usuario )
                    <tr>
                        <td style="text-align:center;">{{$usuario->nombre.' '.$usuario->apellido}}</td>
                        <td style="text-align:center;">{{$usuario->email}}</td>
                        <td style="text-align:center;">{{$usuario->ci_usua}}</td>
                        <td style="text-align:center;">{{$usuario->cod_usua}}</td>
                        <td style="text-align:center;">{{$usuario->UserLevelName}}</td>
                        <td align="center">
                            {!! Html::link('usuarios/editar/'.$usuario->cod_usua, 'Cambio de Password', array('class' => 'btn btn-warning btn-xs')) !!}
                        </td>
                        <td  align="center">
                            {!! Form::open(array('url' =>'usuarios/eliminar/'.$usuario->cod_usua, 'method' => 'DELETE')) !!}
                            <button type="submit" class="glyphicon glyphicon-trash"></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
            {!!$usuarios->render()!!}
        </div>
    </div>
    </div>
@endsection