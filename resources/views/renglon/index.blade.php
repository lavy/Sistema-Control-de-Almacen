@extends('app')
@section('title', 'Articulos')
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
                {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
                {!!Form::close()!!}

                <p>
                {!!link_to('crear_renglones','Crear Nuevo Artículo',['class'=>'btn btn-primary'])!!}

                <a href="{{URL::to('excel_renglon')}}"><i class="fa fa-file-excel-o fa-2x" style="margin-left: 20px; "></i></a>
                </p>

                <p>
                    Hay {{$renglones->total()}}
                    @if($renglones->total() >1)
                        Articulos
                    @else
                        Articulo
                    @endif
                </p>

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
                            <td style="text-align:center;"><img src="articulos/{{$renglon->foto_producto}}" width="80px" height="80px" alt="Foto del Producto"></td>

                            <td width="40" align="center">
                                {!! Html::link('modal/'.$renglon->id_renglon, '', array('class'=>'modalLoad glyphicon glyphicon-eye-open btn btn-primary btn-xs','data-toggle'=>'modal','data-target'=>'#myModal','id'=>'$renglon->id_renglon','title'=>'Lista de Articulos','data-toggle'=>'tooltip')) !!}
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

                                {!! Html::link('renglones/editar/'.$renglon->id_renglon, '', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs','title'=>'Editar Caracteristica Articulo','data-toggle'=>'tooltip')) !!}

                                {!! Html::link('seriales/'.$renglon->id_renglon, '', array('class' => 'glyphicon glyphicon-zoom-in btn btn-info btn-xs','title'=>'Seriales del Articulo','data-toggle'=>'tooltip')) !!}
                                {!! Form::open(array('url' =>'renglones/eliminar/'.$renglon->id_renglon, 'method' => 'DELETE','title'=>'Eliminar Articulo','data-toggle'=>'tooltip')) !!}
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

    <script type="text/javascript">
        $(document).ready(function(){
            $('.modalLoad').click(function() {
                $('#myModal').modal('show') // evento que lanza la ventana
                $('#modalContent').val('');
                $('#bodys').load($(this).attr('href'));
                return false;
            });

            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        });
    </script>
@endsection