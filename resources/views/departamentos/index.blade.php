@extends('app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">DEPARTAMENTOS</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'departamentos','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Departamento','id'=>'buscar'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
                {!!Form::close()!!}

                {!!link_to('crear_departamentos','Crear Nuevo Departamento',['class'=>'btn btn-primary'])!!}

                <table class="table table-bordered">
                    <tr>
                        <th width="20px" style="text-align:center;">#OFICINA</th>
                        <th width="100px" style="text-align:center;">#DEPARTAMENTO</th>

                    </tr>
                    @foreach($departamentos as $departamento )
                        <tr>
                            <td style="text-align:center;">{{$departamento->id_oficina}}</td>
                            <td>{{$departamento->id_departamento}}</td>
                            <td>{{$departamento->descrip_departamento}}</td>
                            <td width="60" align="center">
                                {!! Html::link('departamentos/editar/'.$departamento->id_departamento, 'Editar', array('class' => 'btn btn-warning btn-xs')) !!}
                            </td>
                            <td width="60" align="center">
                                {!! Form::open(array('url' =>'departamentos/'.$departamento->id_departamento, 'method' => 'DELETE')) !!}
                                <button type="submit" class="glyphicon glyphicon-trash"></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                {!!$departamentos->render()!!}
            </div>
        </div>
    </div>
    </div>

    <script>
        $('#buscar').keyup(function()
        {
            $(this).val($(this).val().toUpperCase())
        });

    </script>
@endsection