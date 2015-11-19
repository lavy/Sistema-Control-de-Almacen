{{--
@extends('app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">MARCAS</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'marcas','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Marcas'])!!}
                </div>
                    {!!Form::submit('BUSCAR',['class'=>'btn bnt-default'])!!}
                {!!Form::close()!!}

                <table class="table table-bordered">
                    <tr>
                        <th width="20px" style="text-align:center;">#</th>
                        <th style="text-align:center;">MARCAS</th>
                    </tr>
                    @foreach($marcas as $marca )
                        <tr>
                            <td style="text-align:center;">{{$marca->id_marca}}</td>
                            <td>{{$marca->descrip_marca}}</td>
                        </tr>
                    @endforeach
                </table>
                {!!$marcas->render()!!}
            </div>
        </div>
    </div>
    </div>
@endsection--}}
