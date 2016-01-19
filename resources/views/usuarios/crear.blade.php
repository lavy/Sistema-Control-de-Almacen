@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(['action'=>'UsuariosController@store','id'=>'form'])!!}

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

        <div  id="info"></div>

        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">CREAR USUARIOS</div>
            <div class="panel-body">
               {{-- <div class="col-md-6">
                    {!!Form::label('oficina','Oficina:')!!}
                    {!!Form::select('oficina',array('Debe Seleccionar una oficina',$oficina),0,['class'=>'form-control','id'=>'oficina'])!!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('departamento','Departamento:')   !!}
                    <select class="form-control" id="departamento" name="departamento">
                        <option>Debe Seleccionar un Departamento</option>
                    </select>
                </div>--}}
                <div class="col-md-6">
                    {!!Form::label('almacen','Almacen:')!!}
                    {!!Form::select('almacen',$almacen,'',['class'=>'form-control','id'=>'tipo_renglon'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('nombre','Nombre:')!!}
                    {!!Form::text('nombre',null,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('apellido','Apellido:')!!}
                    {!!Form::text('apellido',null,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('email','Correo Institucional:')!!}
                    {!!Form::text('email',null,array('class'=>'form-control','type'=>'text','id'=>'correo'))!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('password','Password:')!!}
                    {!!Form::password('password',['class'=>'form-control'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('cedula','Cedula:')!!}
                    {!!Form::text('cedula',null,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('cargo','Cargo:')!!}
                    {!!Form::text('cargo',null,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                {{--<div class="col-md-6">
                    {!!Form::label('codigo','Codigo:')!!}
                    {!!Form::text('codigo',null,array('class'=>'form-control','type'=>'text'))!!}
                </div>--}}
                <div class="col-md-6">
                    {!!Form::label('nivel_usuario','Nivel de Usuario:')!!}
                    {!!Form::select('nivel_usuario',$userlevel,'',['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="col-md-offset-5">
                {!!Form::submit('Aceptar',['class'=>'btn btn-primary','name'=>'Aceptar','id'=>'enviar'])!!}
                {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    </div>

    {!!Form::close()!!}
    </div>
    <script>
     $(document).ready(function(){
        /*$('#info').hide();*/

        $("#correo").blur(function(){
            var correo=$('#correo').val();
            if(correo != "") {
                $.ajax({
                    method: "POST",
                    url: "correo",
                    data: "correo="+correo,
                    success: function (data) {
                       /* if(data != "")
                        {*/
                            /*$('#info').show();*/
                            $('#info').html(data);
                        /*}*/

                        /*alert(data);*/
                        /*if(data != 0) {
                            alert(data);
                        }*/

                    }


                });
            }
        });
     });
        /*$("form").submit(function(){
        $.ajax({
            url: 'correo',
            type: 'GET',
            data:correo,
            success: function(data){
                return data;
            }
        })
        });*/
    </script>
@endsection