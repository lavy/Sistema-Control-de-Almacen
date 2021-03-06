@extends('app')
@section('title', 'Crear Proveedor')
@section('content')
    <div class="container">
        {!!Form::open(['action'=>'ProveedorController@store','id'=>'form'])!!}

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
        <div id="info"></div>
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">CREAR PROVEEDOR</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('nombre_proveedor','Nombre Proveedor:')!!}
                    {!!Form::text('nombre_proveedor',null,array('class'=>'form-control','type'=>'text','id'=>'proveedor'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('contacto','Contacto:')!!}
                    {!!Form::text('contacto',null,array('class'=>'form-control','type'=>'text','id'=>'contacto'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('telefono_proveedor','Telefono de Proveedor:')!!}
                    {!!Form::text('telefono_proveedor',null,array('class'=>'form-control','type'=>'text','id'=>'telefono_p'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('telefono_contacto','Telefono de Contacto:')!!}
                    {!!Form::text('telefono_contacto',null,array('class'=>'form-control','type'=>'text','id'=>'telefono_c'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('email','Email:')!!}
                    {!!Form::text('email',null,array('class'=>'form-control','type'=>'text','id'=>'correo'))!!}
                </div>
            </div>
            <div class="col-md-offset-5">
                {!!Form::submit('Aceptar',['class'=>'btn btn-primary','name'=>'Aceptar'])!!}
                {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    </div>

    {!!Form::close()!!}
    </div>
    <script type="text/javascript">
     $(document).ready(function(){
        $("#proveedor").keyup(function () {
            var proveedor = $('#proveedor').val().trim();
            if (proveedor != "") {
                $.ajax({
                    method: "GET",
                    url: "provs",
                    data: "proveedor="+proveedor,
                    success: function (data) {
                        if (data == 'Disponible') {
                            $('#info').html("<input type='hidden' id='disponible' value='si' name='disponible'><div class='alert alert-success'><b>Disponible</b></div>");
                        } else {
                            $('#info').html("<input type='hidden' id='disponible' value='no' name='disponible'><div class='alert alert-danger'><b>El Proveedor ya existe</b></div>");
                        }
                    }
                });
            }
        });

        $('#form').submit(function() {
            var Proveedor = $('#proveedor').val();
            var Contacto = $('#contacto').val();
            var Telefono_P = $('#telefono_p').val();
            var Telefono_C = $('#telefono_c').val();
            var Correo = $('#correo').val();
            var Disponible=$('disponible').val();

            if (Proveedor.length > 150 || Proveedor.length == "") {
                $('#info').html("<div class='alert alert-danger'><b>El Campo Nombre Proveedor debe ser menor a 150 Caracteres</b></div>");
                return false;
            }
            else if (Contacto.length > 40 || Contacto.length == "") {
                $('#info').html("<div class='alert alert-danger'><b>El Campo Contacto debe ser menor a 40 Caracteres</b></div>");
                return false;
            }
            else if (Telefono_P.length > 11 || Telefono_P.length == "" || isNaN(Telefono_P)) {
                $('#info').html("<div class='alert alert-danger'><b>El Campo Telefono Proveedor debe ser menor a 40 Caracteres, no debe estar vacio y debe ser numerico</b></div>");
                return false;
            }
            else if (Telefono_C.length > 11 || Telefono_C.length == "" || isNaN(Telefono_C)) {
                $('#info').html("<div class='alert alert-danger'><b>El Campo Telefono Contacto debe ser menor a 40 Caracteres, no debe estar vacio y debe ser numerico</b></div>");
                return false;
            }
            else if (Correo.length > 40 || Correo.length == "") {
                $('#info').html("<div class='alert alert-danger'><b>El Campo Email debe ser menor a 40 Caracteres</b></div>");
                return false;
            }
            else if(Disponible =='no'){
                $('#info').html("<input type='hidden' id='disponible' value='no' name='disponible'><div class='alert alert-danger'><b>El Proveedor ya esta registrado</b></div>");
                return false;
            }

        })
     });
    </script>
@endsection