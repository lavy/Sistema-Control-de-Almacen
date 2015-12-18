@extends('reportes.index')

@section('reporte')

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">SOLICITUDES DE PRESTAMOS</div>
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
                        <th style="text-align:center;font:bold 14px 'cursive';">N° PRESTAMOS</th>

                    </tr>
                    @foreach($prestamos as $prest )
                        <tr>
                            <td style="text-align:center;">{{$prest->oficina}}</td>
                            <td style="text-align:center;">{{$prest->cantidad_prestamos}}</td>
                        </tr>
                    @endforeach
                </table>

                {{--{!! $oficina->render() !!}--}}
            </div>
        </div>
    </div>
    </div>



@endsection