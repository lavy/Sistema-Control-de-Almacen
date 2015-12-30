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
            <div class="panel-heading" style="text-align:center;">PROVEEDORES</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'proveedor','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Proveedor'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
                {!!Form::close()!!}

                {!!link_to('crear_proveedor','Crear Nuevo Proveedor',['class'=>'btn btn-primary'])!!}

                <table class="table table-bordered">
                    <tr>
                        <th width="20px" style="text-align:center;">#</th>
                        <th width="100px" style="text-align:center;">#NOMBRE PROVEEDOR</th>
                        <th style="text-align:center;">CONTACTO</th>
                        <th style="text-align:center;">#TELEFONO PROVEEDOR</th>
                        <th style="text-align:center;">#TELEFONO CONTACTO</th>
                        <th style="text-align:center;">EMAIL</th>
                    </tr>
                    @foreach($proveedor as $prov )
                        <tr>
                            <td style="text-align:center;">{{$prov->id_proveedor}}</td>
                            <td style="text-align:center;">{{$prov->nombre_proveedor}}</td>
                            <td style="text-align:center;">{{$prov->telef_proveedor}}</td>
                            <td style="text-align:center;">{{$prov->contacto}}</td>
                            <td style="text-align:center;">{{$prov->telef_contacto}}</td>
                            <td style="text-align:center;">{{$prov->email}}</td>
                            <td width="60" align="center">
                                {!! Html::link('proveedor/editar/'.$prov->id_proveedor, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                            </td>
                            <td width="60" align="center">
                                {!! Form::open(array('url' =>'proveedor/eliminar/'.$prov->id_proveedor, 'method' => 'DELETE')) !!}
                                <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                {!!$proveedor->render()!!}
            </div>
        </div>
    </div>
    </div>
@endsection