@extends('app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">SUBCATEGORIAS</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'subcategorias','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Subcategorias'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn bnt-default'])!!}
                {!!Form::close()!!}

                {!!link_to('subcategorias/crear','Crear Nueva Subcategoria',['class'=>'btn btn-primary'])!!}

                <table class="table table-bordered">
                    <tr>
                        <th width="20px" style="text-align:center;">#</th>
                        <th width="20px" style="text-align:center;">#CATEGORIA</th>
                        <th style="text-align:center;">SUBCATEGORIA</th>
                    </tr>
                    @foreach($subcategorias as $subcat )
                        <tr>
                            <td style="text-align:center;">{{$subcat->id_subcategoria}}</td>
                            <td style="text-align:center;">{{$subcat->id_categoria}}</td>
                            <td>{{$subcat->descrip_subcategoria}}</td>
                            <td width="60" align="center">
                                {!! Html::link('subcategorias/editar/'.$subcat->id_subcategoria, 'Editar', array('class' => 'btn btn-warning btn-xs')) !!}
                            </td>
                            <td width="60" align="center">
                                {!! Form::open(array('url' =>'subcategorias/.$subcat->id_subcategoria', 'method' => 'DELETE')) !!}
                                <button type="submit" class="glyphicon glyphicon-trash"></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                {!!$subcategorias->render()!!}
            </div>
        </div>
    </div>
    </div>
@endsection