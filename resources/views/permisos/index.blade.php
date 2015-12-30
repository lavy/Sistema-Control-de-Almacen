@extends('app')

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
            <div class="panel-heading" style="text-align:center;">OPCIONES PERFILES</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'permisos','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por nombre'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn bnt-default'])!!}
                {!!Form::close()!!}

                {!!link_to('crear_permisos','Crear Nuevos Permisos',['class'=>'btn btn-primary'])!!}

                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="20px" style="text-align:center;font:bold 14px 'cursive';"># OPCION</th>
                        <th width="20px" style="text-align:center;font:bold 14px 'cursive';">NOMBRE</th>
                        <th width="20px" style="text-align:center;font:bold 14px 'cursive';">NIVEL DE USUARIO</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($menus as $menu)
                        <tr>
                            <td style="text-align:center;">{{$menu->id_opcion}}</td>
                            <td style="text-align:center;">{{$menu->nombre}}</td>
                            <td style="text-align:center;">{{$menu->UserLevelName}}</td>
                            <td width="60" align="center">
                                {!! Html::link('permisos/editar/'.$menu->id_opcion, 'Editar', array('class' => 'btn btn-warning btn-xs')) !!}
                            </td>
                            <td width="60" align="center">
                                {!! Form::open(array('url' =>'permisos/eliminar/'.$menu->id_opcion, 'method' => 'DELETE')) !!}
                                <button type="submit" class="glyphicon glyphicon-trash"></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>

                {!! $menus->render() !!}
            </div>
        </div>
    </div>
@endsection