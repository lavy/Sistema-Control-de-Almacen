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
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">TÉCNICOS</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'tecnico','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Técnicos'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
                {!!Form::close()!!}

                <p>
                {!!link_to('crear_tecnico','Crear Nuevo Técnico',['class'=>'btn btn-primary'])!!}
                </p>

                <p>
                    Hay {{$tecnicos->total()}}
                    @if($tecnicos->total() >1)
                        Tecnicos
                    @else
                        Técnico
                    @endif
                </p>
                <table class="table table-bordered">
                    <tr>
                        <th width="20px" style="text-align:center;font:bold 14px 'cursive';">#</th>
                        <th  style="text-align:center;font:bold 14px 'cursive';">NOMBRE Y APELLIDO</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">FECHA NACIMIENTO</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">CEDULA</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">FOTO</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">ESTADO</th>

                    </tr>
                    @foreach($tecnicos as $tecnico )
                        <tr>
                            <td style="text-align:center;">{{$tecnico->id_tecnico}}</td>
                            <td style="text-align:center;">{{$tecnico->nombres_apellidos}}</td>
                            <td style="text-align:center;">{{$tecnico->fecha_nacimiento}}</td>
                            <td style="text-align:center;">{{$tecnico->cedula}}</td>
                            <td style="text-align:center;"><img src="tecnicos/{{$tecnico->foto_tecnico}}" class="shown" width="80" height="80" ></td>
                            @if($tecnico->estatus !='Activo')
                            <td style="text-align:center;" class="danger">{{$tecnico->estatus}}</td>
                            @else
                            <td style="text-align:center;" class="success">{{$tecnico->estatus}}</td>
                            @endif
                            <td width="60" align="center">
                                {!! Html::link('tecnicos/editar/'.$tecnico->id_tecnico, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                            </td>
                            <td width="60" align="center">
                                {!! Form::open(array('url' =>'tecnicos/eliminar/'.$tecnico->id_tecnico, 'method' => 'DELETE')) !!}
                                <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>

                {!! $tecnicos->render() !!}
            </div>
        </div>
    </div>
    </div>
@endsection