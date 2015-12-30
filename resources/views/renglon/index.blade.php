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
            <div class="panel-heading" style="text-align:center;">ENTRADA DE ARTÍCULOS</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'renglones','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Artículo'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn bnt-default'])!!}
                {!!Form::close()!!}

                {!!link_to('crear_renglones','Crear Nuevo Artículo',['class'=>'btn btn-primary'])!!}

                <table class="table table-bordered">
                    <tr>
                        <th width="20px" style="text-align:center;font:bold 14px 'cursive';">#ARTICULO</th>
                        <th width="10px" style="text-align:center;font:bold 14px 'cursive';">TIPO ARTICULO</th>
                        {{--<th width="10px" style="text-align:center;font:bold 14px 'cursive';">CODIGO FABRICANTE</th>--}}
                        <th width="10px" style="text-align:center;font:bold 14px 'cursive';">DESCRIPCION</th>
                        <th width="10px" style="text-align:center;font:bold 14px 'cursive';">MARCA</th>
                        <th width="10px" style="text-align:center;font:bold 14px 'cursive';">MODELO</th>
                        <th width="10px" style="text-align:center;font:bold 14px 'cursive';">UNIDAD MEDIDA</th>
                        <th width="10px" style="text-align:center;font:bold 14px 'cursive';">CANTIDAD</th>
                        <th width="10px"style="text-align:center;font:bold 14px 'cursive';">EXISTENCIA MINIMA</th>
                        <th width="10px" style="text-align:center;font:bold 14px 'cursive';">FOTO PRODUCTO</th>

                    </tr>
                    @foreach($renglones as $renglon )
                        <tr>
                            <td style="text-align:center;">{{$renglon->id_renglon}}</td>
                            <td style="text-align:center;">{{$renglon->descrip_tipo_renglon}}</td>
                            {{--<td>{{$renglon->codigo_fabricante}}</td>--}}
                            <td>{{$renglon->descrip_renglon}}</td>
                            <td>{{$renglon->descrip_marca}}</td>
                            <td>{{$renglon->descrip_modelo}}</td>
                            <td>{{$renglon->unidad_medida}}</td>
                            <td>{{$renglon->cantidad}}</td>
                            <td>{{$renglon->existencia_minima}}</td>
                            <td><center><img src="articulos/{{$renglon->foto_producto}}" width="80px" height="80px"></center></td>


                            <td width="40" align="center">
                                {{--<a href='modal/'.$renglon->id_renglon id='$renglon->id_renglon' data-toggle='modal'   class='modalLoad btn btn-primary btn-xs' data-target='#myModal'>Detalles</a>;--}}
                                {!! Html::link('modal/'.$renglon->id_renglon, '', array('class'=>'modalLoad glyphicon glyphicon-eye-open btn btn-primary btn-xs','data-toggle'=>'modal','data-target'=>'#myModal','id'=>'$renglon->id_renglon')) !!}

                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Seriales</h4>
                                            </div>
                                            <div class="modal-body" id="bodys">

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{--</td>--}}

                            {{--<td width="60" align="center">--}}
                                {!! Html::link('renglones/editar/'.$renglon->id_renglon, '', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                            {{--</td>
                            <td width="60" align="center">--}}
                                {!! Form::open(array('url' =>'renglones/eliminar/'.$renglon->id_renglon, 'method' => 'DELETE')) !!}
                                <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs"></button>
                                {!! Form::close() !!}

                            </td>
                        </tr>
                    @endforeach


                </table>

                {!! $renglones->render() !!}
            </div>
        </div>
    </div>
    </div>

    <script>
        $('.modalLoad').click(function() {
            $('#myModal').modal('show') // evento que lanza la ventana
            $('#modalContent').val('');
            $('#bodys').load($(this).attr('href'));
            return false;
        });
    </script>
@endsection