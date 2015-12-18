@extends('reportes.index')

@section('reporte')

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">ARTICULOS ASIGNADOS</div>
            <div class="panel-body">

                {!!Form::open(['url'=>'oficinas','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Beneficiario','id'=>'buscar'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
                {!!Form::close()!!}

                {!!link_to('menu','<-Atras',['class'=>'btn btn-primary'])!!}

                <table class="table table-bordered">
                    <tr>
                        <th style="text-align:center;font:bold 14px 'cursive';">TRANSACCION</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">SOLICITUD</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">BENEFICIARIO</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">TELEFONO</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">CORREO</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">CANTIDAD</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">CANTIDAD</th>
                        {{--<th style="text-align:center;font:bold 14px 'cursive';">N° PRESTAMOS</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">N° PRESTAMOS</th>--}}

                    </tr>
                    @foreach($asignados as $asig )
                        <tr>
                            <td style="text-align:center;">{{$asig->id_transaccion}}</td>
                            <td style="text-align:center;">{{$asig->id_solicitud}}</td>
                            <td style="text-align:center;">{{$asig->beneficiario}}</td>
                            <td style="text-align:center;">{{$asig->telef_beneficiario}}</td>
                            <td style="text-align:center;">{{$asig->email}}</td>
                            <td style="text-align:center;">{{$asig->cantidad}}</td>
                            <td width="40" align="center">
                                {{--<a href='modal/'.$renglon->id_renglon id='$renglon->id_renglon' data-toggle='modal'   class='modalLoad btn btn-primary btn-xs' data-target='#myModal'>Detalles</a>;--}}
                                {!! Html::link('asignados/'.$asig->id_transaccion, 'Seriales', array('class'=>'modalLoad glyphicon glyphicon-eye-open btn btn-primary btn-xs','data-toggle'=>'modal','data-target'=>'#myModal','id'=>'$asig->id_transaccion')) !!}

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
                            </td>
                            {{--<td style="text-align:center;">{{$asig->beneficiario}}</td>
                            <td style="text-align:center;">{{$asig->beneficiario}}</td>--}}
                        </tr>
                    @endforeach
                </table>

                {{--{!! $oficina->render() !!}--}}
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