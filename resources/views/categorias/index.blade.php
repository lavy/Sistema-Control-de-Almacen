@extends('app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">CATEGORIAS</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'categorias','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Categorias'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn bnt-default'])!!}
                {!!Form::close()!!}

                {!!link_to('categorias/crear','Crear Nueva Categoria',['class'=>'btn btn-primary'])!!}

                <table class="table table-bordered">
                    <tr>
                        <th width="100px" style="text-align:center;">#</th>
                        <th width="500px" style="text-align:center;">CATEGORIAS</th>

                    </tr>
                    @foreach($categorias as $categoria )
                        <tr>
                            <td style="text-align:center;">{{$categoria->id_categoria}}</td>
                            <td style="text-align:center;">{{$categoria->descrip_categoria}}</td>
                            <td width="20px" align="center">
                                {!! Html::link('categorias/editar/'.$categoria->id_categoria, 'Editar', array('class' => 'btn btn-warning btn-xs')) !!}
                            </td>
                            <td width="20px" align="center">
                                {!! Form::open(array('url' =>'categorias/eliminar/'.$categoria->id_categoria, 'method' => 'DELETE')) !!}
                                <button type="submit" class="glyphicon glyphicon-trash"></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                {!!$categorias->render()!!}
            </div>
        </div>
    </div>
    </div>
@endsection