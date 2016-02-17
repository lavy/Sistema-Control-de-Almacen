@extends('app')
@section('title', 'Inventario Almacen')
@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">INVENTARIO</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'inventario','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Articulo'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
                {!!Form::close()!!}

                <p>
                <a href="{{URL::to('excel_inventario')}}"><i class="fa fa-file-excel-o fa-2x" style="margin-left: 20px; "></i></a>
                </p>
                <p>
                    Hay {{$inventario->total()}}
                    @if($inventario->total() >1)
                        Articulos
                    @else
                        Articulo
                    @endif
                </p>

                <table class="table table-bordered">
                    <tr>
                        <th width="20px" style="text-align:center;font:bold 14px 'cursive';"># DETALLE</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">ALMACÉN</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">FECHA DE MOVIMIENTO</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">ARTÍCULO</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">UNIDAD DE MEDIDA</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">CANTIDAD EXISTENCIA</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">EXISTENCIA MINIMA</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">EXISTENCIA </th>

                    </tr>
                    @foreach($inventario as $invent )
                        <tr>
                            <td style="text-align:center;">{{$invent->id_detalle}}</td>
                            <td>{{$invent->descrip_almacen}}</td>
                            <td>{{$invent->fecha_movimiento}}</td>
                            <td>{{$invent->descrip_renglon}}</td>
                            <td>{{$invent->unidad_medida}}</td>
                            <td>{{$invent->cantidad_existencia}}</td>
                            <td>{{$invent->existencia_minima}}</td>
                            <td width="40" align="center">
                                {{--<a href='modal/'.$renglon->id_renglon id='$renglon->id_renglon' data-toggle='modal'   class='modalLoad btn btn-primary btn-xs' data-target='#myModal'>Detalles</a>;--}}
                                {!! Html::link('inventario/'.$invent->id_detalle, 'Existencia', array('class'=>'modalLoad glyphicon glyphicon-eye-open btn btn-primary btn-xs','data-toggle'=>'modal','data-target'=>'#myModal','id'=>'$invent->id_detalle')) !!}

                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Existencia</h4>
                                            </div>
                                            <div class="modal-body" id="bodys">

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>

                {!! $inventario->render() !!}
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $('.modalLoad').click(function() {
            $('#myModal').modal('show') // evento que lanza la ventana
            $('#modalContent').val('');
            $('#bodys').load($(this).attr('href'));
            return false;
        });
    </script>

@endsection