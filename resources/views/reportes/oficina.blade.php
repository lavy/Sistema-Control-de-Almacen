@extends('reportes.index')

@section('reporte')

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">SOLICITUDES POR OFICINAS</div>
            <div class="panel-body">

                {!!Form::open(['url'=>'oficinas','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Oficina','id'=>'buscar'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
                {!!Form::close()!!}

                {!!link_to('menu','<-Atras',['class'=>'btn btn-primary'])!!}

                <table class="table table-bordered">
                    <tr>
                        <th style="text-align:center;font:bold 14px 'cursive';">DESCRIPCIÓN OFICINA</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">TOTAL SOLICITUDES</th>

                    </tr>
                    @foreach($oficinas as $oficina )
                        <tr>
                            <td style="text-align:center;">{{$oficina->oficina}}</td>
                            <td style="text-align:center;">{{$oficina->cantidad}}</td>
                            {{--<td width="60" align="center">
                                {!! Html::link('oficinas/editar/'.$oficina->id_oficina, 'Editar', array('class' => 'btn btn-warning btn-xs')) !!}
                            </td>
                            <td width="60" align="center">
                                {!! Form::open(array('url' =>'oficinas/eliminar/'.$oficina->id_oficina, 'method' => 'DELETE')) !!}
                                <button type="submit" class="glyphicon glyphicon-trash"></button>
                                {!! Form::close() !!}
                            </td>--}}
                        </tr>
                    @endforeach
                </table>

               {{-- {!! $oficina->render() !!}--}}
            </div>
        </div>
    </div>
    </div>



@endsection