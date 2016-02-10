@extends('app')
@section('content')

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
            <div class="panel-heading" style="text-align:center;">JEFES</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'jefes','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Jefes'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
                {!!Form::close()!!}

                <p>
                {!!link_to('crear_jefes','Crear Nuevo Jefe',['class'=>'btn btn-primary'])!!}
                </p>

                <p>
                    Hay {{$jefes->total()}}
                    @if($jefes->total() >1)
                        Jefes
                    @else
                        Jefe
                    @endif
                </p>


                <table class="table table-bordered">
                    <tr>
                        <th style="text-align:center;">#</th>
                        <th style="text-align:center;">OFICINA</th>
                        <th style="text-align:center;">NOMBRE JEFE</th>
                        <th style="text-align:center;">CÉDULA</th>
                        <th style="text-align:center;">FECHA INGRESO</th>
                    </tr>
                    @foreach($jefes as $jefe )
                        <tr>
                            <td style="text-align:center;">{{$jefe->id_jefe}}</td>
                            <td style="text-align:center;">{{$jefe->descrip_oficina}}</td>
                            <td style="text-align:center;">{{$jefe->nombre}}</td>
                            <td style="text-align:center;">{{$jefe->cedula}}</td>
                            <td style="text-align:center;">{{date("d-m-Y",strtotime(($jefe->fecha_ingreso)))}}</td>
                            <td width="60" align="center">
                                {!! Html::link('jefes/editar/'.$jefe->id_jefe, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                {!!$jefes->render()!!}
            </div>
        </div>
    </div>
@endsection