@extends('app')

@section('content')

        {!!Form::open(['action'=>'ArticulosController@store'])!!}

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

        <center><h1>Registro de Articulos</h1></center>
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center">DATOS ARTICULO</div>
            <div class="panel-body">
               <div class="col-md-6">
                    {!!Form::label('categoria','Categoria:')!!}
                    {!!Form::select('categoria',array('Debe Seleccionar una Categoria',$categoria),0,['class'=>'form-control','id'=>'categoria'])!!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('subcategorias','Subcategoria:')   !!}
                    <select class="form-control" id="subcategoria" name="subcategorias">
                        <option>Debe Seleccionar una Subcategoria</option>
                    </select>
                </div>
                <div class="col-md-6">
                    {!! Form::label('marca','Marca:')   !!}
                    {!!Form::select('marca',array('Debe Seleccionar una Marca',$marca),0,['class'=>'form-control'])!!}
                    {{--<select class="form-control" id="marca" name="marcas">
                        <option>Debe Seleccionar una Marca</option>
                    </select>--}}
                </div>
                <div class="col-md-6">
                    {!! Form::label('modelos','Modelo:')   !!}
                    <select class="form-control" id="modelo" name="modelos">
                        <option>Debe Seleccionar un Modelo</option>
                    </select>
                </div>
               {{-- <div class="col-md-6">
                    {!!Form::label('articulo','Articulo:')!!}
                    {!!Form::text('articulo',null,['class'=>'form-control','type'=>'text'])!!}
                </div>--}}
                {{--<div class="col-md-6">
                    {!!Form::label('descrip_articulo','Descripción del Articulo:')!!}
                    {!!Form::text('descrip_articulo',null,['class'=>'form-control','type'=>'text'])!!}
                </div>
--}}

                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align:center">DATOS UNICOS DE CADA ARTICULO</div>
                    <div class="panel-body">
                            <div class="input_fields_wrap">
                                <div class="col-md-3">


                                        {!!Form::label('mytext','Serial')!!}
                                        {!!Form::text('mytext[]',null,['class'=>'form-control','type'=>'text'])!!}

                                </div>
                                <div class="col-md-3">
                                        {!!Form::label('imei','Imei:')!!}
                                        {!!Form::text('imei[]',null,['class'=>'form-control','type'=>'text'])!!}

                                </div>
                                <button class="add_field_button btn btn-primary ">Añadir</button>
                            </div>
                        </div>
                    </div>

                {{--<div class="input_fields_wrap">
                    <button class="add_field_button">Add More Fields</button>
                    <div><input type="text" name="mytext[]"></div>
                </div>--}}
                <div class="col-md-6">
                    {!!Form::label('color','Color:')!!}
                    {!!Form::text('color',null,['class'=>'form-control','type'=>'text'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('codigo_fabricante','Codigo Fabricante:')!!}
                    {!!Form::text('codigo_fabricante',null,['class'=>'form-control','type'=>'text'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('unidad_medida','Unidad Medida:')!!}
                    {!!Form::text('unidad_medida',null,['class'=>'form-control','type'=>'text'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('existencia','Existencia:')!!}
                    {!!Form::text('existencia',null,['class'=>'form-control','type'=>'text'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('cant_minima','Cantidad Minima:')!!}
                    {!!Form::text('cant_minima',null,['class'=>'form-control','type'=>'text'])!!}
                </div>
                <div class="col-md-offset-5">
                    {!!Form::submit('Aceptar', ["class" => "btn btn-primary",'name'=>'Aceptar'])!!}
                    {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
                </div>

            </div>
        </div>
    {!!Form::close()!!}

    <script>
        $(document).ready(function (){
            $('#categoria').change(function () {
                $.get("{{ url('categorias')}}",
                        {option: $(this).val()},
                        function (data) {
                            $('#subcategoria').empty();
                            $.each(data, function (key, element) {
                                $('#subcategoria').append("<option value='" + key + "'>" + element + "</option>");
                            });
                        });
            });

            $('#marca').change(function () {
                $.get("{{ url('marcas')}}",
                        {option: $(this).val()},
                        function (data) {
                            $('#modelo').empty();
                            $.each(data, function (key, element) {
                                $('#modelo').append("<option value='" + key + "'>" + element + "</option>");
                            });
                        });
            });


        });


            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="col-md-3"><input type="text" class="form-control" name="mytext[]"/><a href="#" class="remove_field btn btn-danger">Remover</a></div>'); //add input box
                }
            });

            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="col-md-3"><input type="text" class="form-control" name="imei[]"/><a href="#" class="remove_field btn btn-danger">Remover</a></div>'); //add input box
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })

    </script>
@endsection