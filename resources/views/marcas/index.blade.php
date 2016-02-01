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
            <div class="panel-heading" style="text-align:center;">MARCAS</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'marca','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Marcas'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn bnt-default'])!!}
                {!!Form::close()!!}

                {!!link_to('crear_marcas','Crear Nueva Marca',['class'=>'btn btn-primary'])!!}

                <table class="table table-bordered">
                    <tr>
                        <th width="20px" style="text-align:center;">#</th>
                        <th style="text-align:center;">MARCAS</th>
                    </tr>
                    @foreach($marcas as $marca )
                        <tr>
                            <td style="text-align:center;">{{$marca->id_marca}}</td>
                            <td>{{$marca->descrip_marca}}</td>
                            <td width="60" align="center">
                                {!! Html::link('marcas/editar/'.$marca->id_marca, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                            </td>
                            <td width="60" align="center">
                                {!! Form::open(array('url' =>'marcas/eliminar/'.$marca->id_marca, 'method' => 'DELETE')) !!}
                                <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                            </td>
                        </tr>

                    @endforeach
                </table>
                {!!$marcas->render()!!}
            </div>
        </div>
    </div>
    </div>
@endsection