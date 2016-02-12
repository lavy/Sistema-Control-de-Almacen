@extends('app')
@section('content')
    <div class="container">
        {!!Form::open(['action'=>'RenglonController@store','files'=>'true','id'=>'form'])!!}

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
            <div class="panel-heading" style="text-align:center;">CREAR ARTÍCULO </div>
            <div class="panel-body">

                <div class="col-md-6">
                    {!!Form::label('tipo_renglon','Tipo de Artículo:')!!}
                    {!!Form::select('tipo_renglon',$trenglon,'',['class'=>'form-control','id'=>'tipo_articulo'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('descripcion','Descripción del Artículo:')!!}
                    {!!Form::text('descripcion',null,['class'=>'form-control','type'=>'text','id'=>'articulo'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('marca','Marca:')!!}
                    {!!Form::select('marca',$marca,'',['class'=>'form-control','id'=>'marca'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('modelo','Modelo:')!!}
                    {!!Form::select('modelo',$modelo,'',['class'=>'form-control','id'=>'modelo'])!!}
                </div>


                    <div class="input_fields_wrap">
                        <div class="col-md-6">
                            <label for="serial[]">Serial</label>
                            <div class="input-group">
                                <div><input type="text" name="serial[]" class="form-control" title="Si quiere agregar otro producto, Presione el boton (+)" data-toggle="tooltip"></div>
                                <span class="input-group-btn"><button class="add_field_button btn btn-info">+</button></span>
                            </div>
                        </div>
                    </div>
                <div class="col-md-6">
                    {!!Form::label('unidad_medida','Unidad de Medida:')!!}
                    {!!Form::select('unidad_medida',['Kilogramos'=>'Kilogramos','Unidades'=>'Unidades','Litros'=>'Litros','Metros'=>'Metros'],'1',['class'=>'form-control','id'=>'unidades'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('cantidad','Cantidad:')!!}
                    {!!Form::text('cantidad',1,['class'=>'form-control','type'=>'text','id'=>'cantidad','readonly'=>'true'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('existencia_minima','Existencia Minima:')!!}
                    {!!Form::text('existencia_minima',null,['class'=>'form-control','type'=>'text','id'=>'existencia_minima'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('foto_articulo','Foto Articulo:')!!}
                    {!!Form::file('foto_articulo')!!}
                </div>
            </div>
            <div class="col-md-offset-5" >
                {!!Form::submit('Aceptar',['class'=>'btn btn-primary','name'=>'Aceptar'])!!}
                {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    </div>
    {!!Form::close()!!}
    </div>

    <script>
        $(document).ready(function () {

            $('#marca').change(function () {
                $.get("{{ url('articulo')}}",
                        {option: $(this).val()},
                        function (data) {
                            $('#modelo').empty();
                            $.each(data, function (key, element) {
                                $('#modelo').append("<option value='" + key + "'>" + element + "</option>");
                            });
                        });
            });

//                var max_fields      = 10; //maximum input boxes allowed
                var wrapper         = $(".input_fields_wrap"); //Fields wrapper
                var add_button      = $(".add_field_button"); //Add button ID

                var x = 0; //initlal text box count
                $(add_button).click(function(e){ //on add input button click
                    e.preventDefault();
                    /*if(x < max_fields){ //max input box allowed*/
                        x++; //text box increment
                        $(wrapper).append('<div class="col-md-6"><label for="serial[]">Serial '+x+'</label><div class="input-group"><input type="text" title="Si quiere quitar este producto, Presione el boton (-)" data-toggle="tooltip" name="serial['+x+']" class="form-control"/></div><a href="#" class="remove_field btn btn-danger">-</a>'); //add input box
                    /*}*/
                });

                $(wrapper).on("click",".remove_field",function(e){ //user click on remove text
                    e.preventDefault(); $(this).parent('div').remove(); x--;
                });


                $('.add_field_button').on('click', function () {
                    var total=$('#cantidad').val()
                        total++;
                    $('#cantidad').val(total);
                });

                $(wrapper).on('click','.remove_field', function(){
                    var total=$('#cantidad').val();
                        total--;
                    $('#cantidad').val(total);
                });

                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })


            $('#form').submit(function(){
               var Tipo_Articulo=$('#tipo_articulo').val();
               var Articulo=$('#articulo').val();
               var Marca=$('#marca').val();
               var Modelo= $('#modelo').val();
               var Existencia_Minima=$('#existencia_minima').val();

                if(Tipo_Articulo == 0){
                    $('#info').html("<div class='alert alert-danger'><b>Debe Seleccionar un Tipo de Articulo</b></div>")
                    return false;
                }
                else if(Articulo.length > 250 || Articulo == ""){
                    $('#info').html("<div class='alert alert-danger'><b>El campo Articulo debe ser menor a 250 caracteres</b></div>")
                    return false;
                }
                else if(Marca == 0){
                    $('#info').html("<div class='alert alert-danger'><b>Debe Seleccionar una Marca</b></div>")
                    return false;
                }
                else if(Modelo == 0){
                    $('#info').html("<div class='alert alert-danger'><b>Debe Seleccionar una Modelo</b></div>")
                    return false;
                }
                else if(Existencia_Minima.length > 11 && isNaN(Existencia_Minima)){
                    $('#info').html("<div class='alert alert-danger'><b>El campo Existencia Minima debe ser Numerico y menor a 11 caracteres </b></div>")
                    return false;
                }

            });

        });
    </script>
@endsection

