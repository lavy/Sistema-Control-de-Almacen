@extends('app')
@section('title', 'Tipos de Articulos')
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
            <div class="panel-heading" style="text-align:center;">TIPO DE ARTÍCULOS</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'tiporenglon','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Tipo Artículo'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
                {!!Form::close()!!}

                <p>
                {!!link_to('crear_tiporenglon','Crear Nuevo Tipo de Artículo',['class'=>'btn btn-primary'])!!}
                </p>

                <p>
                    Hay {{$trenglon->total()}}
                    @if($trenglon->total() >1)
                        Tipo de Articulos
                    @else
                        Tipo de Articulo
                    @endif
                </p>

                <table class="table table-bordered">
                    <tr>
                        <th width="20px" style="text-align:center;font:bold 14px 'cursive';">#TIPO ARTÍCULO</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">TIPO ARTICULO</th>

                    </tr>
                    @foreach($trenglon as $tiporenglon )
                        <tr>
                            <td style="text-align:center;">{{$tiporenglon->id_tipo_renglon}}</td>
                            <td>{{$tiporenglon->descrip_tipo_renglon}}</td>
                            <td width="60" align="center">
                                {!! Html::link('tiporenglon/editar/'.$tiporenglon->id_tipo_renglon, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                            </td>
                            <td width="60" align="center">
                                {!! Form::open(array('url' =>'tiporenglon/eliminar/'.$tiporenglon->id_tipo_renglon, 'method' => 'DELETE')) !!}
                                <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>

                {!! $trenglon->render() !!}
            </div>
        </div>
    </div>
    </div>
@endsection