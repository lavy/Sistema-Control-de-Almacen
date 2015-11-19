@extends('app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">ARTICULOS</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'articulos','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Articulo'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn bnt-default'])!!}
                {!!Form::close()!!}

                {{--{!!link_to('categorias/crear','Crear Nueva Ca',['class'=>'btn btn-primary'])!!}--}}

                <table class="table table-bordered">
                    <tr>
                        <th width="100px" style="text-align:center;">#</th>
                        <th width="500px" style="text-align:center;">CATEGORIA</th>
                        <th width="500px" style="text-align:center;">SUBCATEGORIA</th>
                        <th width="500px" style="text-align:center;">MARCA</th>
                        <th width="500px" style="text-align:center;">MODELO</th>
                        <th width="500px" style="text-align:center;">COD FABRICANTE</th>
                        <th width="500px" style="text-align:center;">EXISTENCIA INICIAL</th>
                        <th width="500px" style="text-align:center;">MINIMO</th>
                        <th width="500px" style="text-align:center;">UNIDAD MEDIDA</th>
                       {{-- <th width="500px" style="text-align:center;">UNIDAD_MEDIDA</th>
                        <th width="500px" style="text-align:center;">UNIDAD_MEDIDA</th>--}}
                    </tr>
                    @foreach($articulos as $articulo )
                        <tr>
                            <td style="text-align:center;">{{$articulo->id_articulo}}</td>
                            <td style="text-align:center;">{{$articulo->id_categoria}}</td>
                            <td style="text-align:center;">{{$articulo->id_subcategoria}}</td>
                            <td style="text-align:center;">{{$articulo->id_marca}}</td>
                            <td style="text-align:center;">{{$articulo->id_modelo}}</td>
                            <td style="text-align:center;">{{$articulo->codigo_fabricante}}</td>
                            <td style="text-align:center;">{{$articulo->existencia}}</td>
                            <td style="text-align:center;">{{$articulo->cant_minima}}</td>
                            <td style="text-align:center;">{{$articulo->unidad_medida}}</td>
                           {{-- <td width="20px" align="center">
                                {!! Html::link('categorias/editar/'.$articulo->id_categoria, 'Editar', array('class' => 'btn btn-warning btn-xs')) !!}
                            </td>
                            <td width="20px" align="center">
                                {!! Form::open(array('url' =>'articulos/'.$articulo->id_articulo, 'method' => 'DELETE')) !!}
                                <button type="submit" class="glyphicon glyphicon-trash"></button>
                                {!! Form::close() !!}
                            </td>--}}
                        </tr>
                    @endforeach
                </table>
                {!!$articulos->render()!!}
            </div>
        </div>
    </div>
    </div>
@endsection