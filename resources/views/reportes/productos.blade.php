@extends('reportes.index')
@section('title','Demanda de Productos')
@section('reporte')

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">DEMANDA DE PRODUCTOS</div>
            <div class="panel-body">

                {!!Form::open(['url'=>'reportes/productos','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Renglón','id'=>'buscar'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
                {!!Form::close()!!}

                {!!link_to('menu','<-Atras',['class'=>'btn btn-primary'])!!}

                <table class="table table-bordered">
                    <tr>
                        <th width="20px" style="text-align:center;font:bold 14px 'cursive';">ARTICULO</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">CANTIDAD DE PEDIDOS</th>
                    </tr>
                    @foreach($demandas as $demanda )
                        <tr>
                            <td style="text-align:center;">{{$demanda->articulo}}</td>
                            <td style="text-align:center;">{{$demanda->cantidad}}</td>
                            {{--<td width="60" align="center">
                                {!! Html::link('oficinas/editar/'.$demanda->id_almacen, 'Editar', array('class' => 'btn btn-warning btn-xs')) !!}
                            </td>
                            <td width="60" align="center">
                                {!! Form::open(array('url' =>'oficinas/eliminar/'.$demanda->id_almacen, 'method' => 'DELETE')) !!}
                                <button type="submit" class="glyphicon glyphicon-trash"></button>
                            </td>--}}
                        </tr>
                    @endforeach
                </table>
                {{--{!!$demandas->render()!!}--}}
            </div>
        </div>
    </div>
    </div>
@endsection