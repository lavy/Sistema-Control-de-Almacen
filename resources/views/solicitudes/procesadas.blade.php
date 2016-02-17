@extends('app')
@section('title', 'Solicitudes Procesadas')
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
            <div class="panel-heading" style="text-align:center;">SOLICITUDES PROCESADAS</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'solicitudes','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Beneficiario'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn bnt-default'])!!}
                {!!Form::close()!!}

                {!!link_to('solicitudes','<-Atras',['class'=>'btn btn-primary'])!!}

                <table class="table table-bordered">
                    <tr>
                        {{--<th width="20px" style="text-align:center;font:bold 14px 'cursive';"># SOLICITUD</th>--}}
                        <th style="text-align:center;font:bold 14px 'cursive';">FECHA SOLICITUD</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">BENEFICIARIO</th>
                        {{--<th style="text-align:center;font:bold 14px 'cursive';">DEPARTAMENTO</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">BENEFICIARIO</th>--}}
                        <th style="text-align:center;font:bold 14px 'cursive';">TELEFONO</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">DETALLES</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">ESTATUS</th>
                        {{--<th style="text-align:center;font:bold 14px 'cursive';">ACCIONES</th>--}}
                    </tr>
                    @foreach($solicitudes as $solicitud )
                        <tr>
                            {{--<td style="text-align:center;">{{$solicitud->id_solicitud}}</td>--}}
                            <td style="text-align:center;">{{$solicitud->fecha_solicitud}}</td>
                           {{-- <td>{{$solicitud->descrip_oficina}}</td>
                            <td>{{$solicitud->descrip_departamento}}</td>--}}
                            <td>{{$solicitud->beneficiario}}</td>
                            <td>{{$solicitud->telef_beneficiario}}</td>
                            <td>{{$solicitud->pedido}}</td>
                            <td>{{$solicitud->estatus}}</td>
                            {{--<td>

                                {!! Html::link('solicitudes/mostrar/'.$solicitud->id_solicitud, 'Ver Solicitud', array('class'=>'modalLoad btn btn-info btn-xs','data-toggle'=>'modal','data-target'=>'#myModal','id'=>'$solicitud->id_solicitud')) !!}

                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Solicitud--}}{{-- N°{{$solicitud->id_solicitud}}--}}{{--</h4>
                                            </div>
                                            <div class="modal-body" id="bodyes">

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>--}}

                        </tr>
                    @endforeach
                </table>

                {!! $solicitudes->render() !!}
            </div>
        </div>
    </div>
    </div>

  {{--  <script type="text/javascript">
        $('.modalLoad').click(function() {
            $('#myModal').modal('show') // evento que lanza la ventana
            $('#modalContent').val('');
            $('#bodyes').load($(this).attr('href'));
            return false;
        });
    </script>--}}
@endsection