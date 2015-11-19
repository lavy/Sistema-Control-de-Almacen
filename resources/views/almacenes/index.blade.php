@extends('app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">ALMACENES</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'almacen','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Almacén'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn bnt-default'])!!}
                {!!Form::close()!!}

                {!!link_to('crear_almacen','Crear Nuevo Almacén',['class'=>'btn btn-primary'])!!}

                <table class="table table-bordered">
                    <tr>
                        <th width="100px" style="text-align:center;">#</th>
                        <th width="500px" style="text-align:center;">ALMACÉN</th>
                        <th width="500px" style="text-align:center;">DIRECCIÓN</th>
                        <th width="500px" style="text-align:center;">TELEFONO</th>

                    </tr>
                    @foreach($almacenes as $almacen )
                        <tr>
                            <td style="text-align:center;">{{$almacen->id_almacen}}</td>
                            <td style="text-align:center;">{{$almacen->descrip_almacen}}</td>
                            <td style="text-align:center;">{{$almacen->direccion}}</td>
                            <td style="text-align:center;">{{$almacen->telefono}}</td>

                                <td width="20px" align="center">
                                    {!! Html::link('almacen/editar/'.$almacen->id_almacen, 'Editar', array('class' => 'btn btn-warning btn-xs')) !!}
                                </td>
                                <td width="20px" align="center">
                                    {!! Form::open(array('url' =>'almacen/eliminar/'.$almacen->id_almacen, 'method' => 'DELETE')) !!}
                                    <button type="submit" class="glyphicon glyphicon-trash"></button>
                                </td>
                        </tr>
                    @endforeach
                </table>
                {!!$almacenes->render()!!}
            </div>
        </div>
    </div>
    </div>
@endsection