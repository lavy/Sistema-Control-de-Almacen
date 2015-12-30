@extends('app')

@section('content')
    <div class="container">
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
            <div class="panel-heading" style="text-align:center;">MODELOS</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'modelos','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Modelo'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn bnt-default'])!!}
                {!!Form::close()!!}

                {!!link_to('crear_modelos','Crear Nuevo Modelo',['class'=>'btn btn-primary'])!!}

                <table class="table table-bordered">
                    <tr>
                        <th width="20px" style="text-align:center;">#MODELO</th>
                        <th width="20px" style="text-align:center;">#MARCA</th>
                        <th style="text-align:center;">MODELOS</th>
                    </tr>
                    @foreach($modelos as $modelo )
                        <tr>
                            <td style="text-align:center;">{{$modelo->id_modelo}}</td>
                            <td style="text-align:center;">{{$modelo->descrip_marca}}</td>
                            <td>{{$modelo->descrip_modelo}}</td>
                            <td width="60" align="center">
                                {!! Html::link('modelos/editar/'.$modelo->id_modelo, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                            </td>
                            <td width="60" align="center">
                                {!! Form::open(array('url' =>'modelos/'.$modelo->id_modelo, 'method' => 'DELETE')) !!}
                                <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                {!!$modelos->render()!!}
            </div>
        </div>
    </div>
    </div>
@endsection