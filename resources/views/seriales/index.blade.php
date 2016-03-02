@extends('app')
@section('title', 'Seriales')
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
            <div class="panel-heading" style="text-align:center;">SERIALES</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'seriales','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Artículo'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn bnt-default'])!!}
                {!!Form::close()!!}

                <table class="table table-bordered">
                    <tr>
                        <th width="20px" style="text-align:center;font:bold 14px 'cursive';">#</th>
                        <th width="10px" style="text-align:center;font:bold 14px 'cursive';">SERIALES</th>
                    </tr>
                    @foreach($serial as $seriales )
                        <tr>
                            <td style="text-align:center;">{{$seriales->id_serial}}</td>
                            <td style="text-align:center;">{{$seriales->serial}}</td>


                            {{--<td width="40" align="center">--}}

                            {{--</td>--}}

                            <td width="60" align="center">
                                {!! Html::link('seriales/editar/'.$seriales->id_serial, '', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                            </td>
                            {{--<td width="60" align="center">
                                {!! Form::open(array('url' =>'seriales/eliminar/'.$seriales->id_serial, 'method' => 'DELETE')) !!}
                                <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs"></button>
                                {!! Form::close() !!}
                            </td>--}}
                        </tr>
                    @endforeach


                </table>

                {!! $serial->render() !!}
            </div>
        </div>
    </div>
    </div>

@endsection