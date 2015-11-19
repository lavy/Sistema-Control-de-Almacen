@extends('reportes.index')

@section('reporte')

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">SOLICITUDES POR DEPARTAMENTOS</div>
            <div class="panel-body">

                {!!Form::open(['url'=>'oficinas','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Oficina','id'=>'buscar'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
                {!!Form::close()!!}



                <table class="table table-bordered">
                    <tr>
                     {{--   <th width="20px" style="text-align:center;font:bold 14px 'cursive';">OFICINA N°</th>--}}
                        <th style="text-align:center;font:bold 14px 'cursive';">DESCRIPCIÓN DEPARTAMENTO</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">N° SOLICITUDES</th>

                    </tr>
                    @foreach($departamento as $dept )
                        <tr>
                     {{--       <td style="text-align:center;">{{$dept->id_departamento}}</td>--}}
                            <td style="text-align:center;">{{$dept->departamento}}</td>
                            <td style="text-align:center;">{{$dept->cantidad}}</td>
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

                {{--{!! $oficina->render() !!}--}}
            </div>
        </div>
    </div>
    </div>



@endsection