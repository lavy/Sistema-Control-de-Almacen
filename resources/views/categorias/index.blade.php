@extends('app')
@section('title', 'Categorias')
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
            <div class="panel-heading" style="text-align:center;">CATEGORIAS</div>
            <div class="panel-body">
                {!!Form::open(['url'=>'categoria','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                <div class="form-group">
                    {!!Form::text('buscar',null,['class'=>'form-control','placeholder'=>'Busqueda por Marcas'])!!}
                </div>
                {!!Form::submit('BUSCAR',['class'=>'btn btn-default'])!!}
                {!!Form::close()!!}

                <p>
                    {!!link_to('crear_categorias','Crear Nueva Categoria',['class'=>'btn btn-primary'])!!}
                </p>

                <p>
                    Hay {{$categorias->total()}}
                    @if($categorias->total() >1)
                        Categorias
                    @else
                        Categoria
                    @endif
                </p>
                <table class="table table-bordered">
                    <tr>
                        <th width="20px" style="text-align:center;">#</th>
                        <th style="text-align:center;">CATEGORIA</th>
                    </tr>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td style="text-align:center;">{{$categoria->id_categoria}}</td>
                            <td>{{$categoria->descrip_categoria}}</td>
                            <td width="60" align="center">
                                {!! Html::link('categorias/editar/'.$categoria->id_categoria, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                            </td>
                            <td width="60" align="center">
                                {!! Form::open(array('url' =>'categorias/eliminar/'.$categoria->id_categoria, 'method' => 'DELETE')) !!}
                                <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
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