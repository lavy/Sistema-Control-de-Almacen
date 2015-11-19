@extends('app')
@section('content')
    <div class="container">
        {!!Form::open(['url'=>'usuarios/'.$usuarios->cod_usua])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR SUBCATEGORIA</div>
            <div class="panel-body">
               <div class="col-md-6">
                    {!!Form::label('nombre','Nombre:')!!}
                    {!!Form::text('nombre',$usuarios->nombre,['class'=>'form-control','type'=>'text'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('apellido','Apellido:')!!}
                    {!!Form::text('apellido',$usuarios->apellido,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('email','Correo Institucional:')!!}
                    {!!Form::text('email',$usuarios->email,['class'=>'form-control','type'=>'text'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('password','Nueva contraseña:')!!}
                    {!!Form::password('password',['class'=>'form-control'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('cedula','Cedula:')!!}
                    {!!Form::text('cedula',$usuarios->ci_usua,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('cargo','Cargo:')!!}
                    {!!Form::text('cargo',$usuarios->cargo,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                {{--<div class="col-md-6">
                    {!!Form::label('codigo','Codigo:')!!}
                    {!!Form::text('codigo',null,array('class'=>'form-control','type'=>'text'))!!}
                </div>--}}
                {{--<div class="col-md-6">
                    {!!Form::label('nivel_usuario','Nivel de Usuario:')!!}
                    {!!Form::select('nivel_usuario',$usuarios->Userevel,'',['class'=>'form-control'])!!}
                </div>--}}
                <div class="col-md-6">
                    {!!Form::label('nivel_usuario','Nivel de Usuario:')!!}
                    {!!Form::text('nivel_usuario',$usuarios->UserLevel,array('class'=>'form-control','type'=>'text'))!!}
                </div>
            </div>
            <div class="col-md-offset-5">
                {!!Form::submit('Editar',array('class'=>'btn btn-primary btn-md'))!!}
                {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    </div>
    {!!Form::close()!!}
    </div>
@endsection