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
            <div class="panel-heading" style="text-align:center;">OFICINAS</div>
            <div class="panel-body">

                {!!Form::open(['url'=>'oficinas','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Oficina','id'=>'buscar'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
                {!!Form::close()!!}

                {!!link_to('crear_oficinas','Crear Nueva Oficina',['class'=>'btn btn-primary'])!!}
                {{--{!!asset('oficinas/crear','Crear Nueva Oficina',['class'=>'btn btn-primary'])!!}--}}

                <table class="table table-bordered">
                    <tr>
                        <th width="20px" style="text-align:center;font:bold 14px 'cursive';">#</th>
                        <th style="text-align:center;font:bold 14px 'cursive';">OFICINAS</th>
                    </tr>
                    @foreach($oficinas as $oficina )
                        <tr>
                            <td style="text-align:center;">{{$oficina->id_oficina}}</td>
                            <td>{{$oficina->descrip_oficina}}</td>
                            <td width="60" align="center">
                                {!! Html::link('oficinas/editar/'.$oficina->id_oficina, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                            </td>
                            <td width="60" align="center">
                                {!! Form::open(array('url' =>'oficinas/eliminar/'.$oficina->id_oficina, 'method' => 'DELETE')) !!}
                                <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>

                {!! $oficinas->render() !!}
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
