@extends('app')
@section('content')
    <div class="container">
        {!!Form::open(['action'=>'RenglonController@store'])!!}

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
            <div class="panel-heading" style="text-align:center;">CREAR ARTÍCULO</div>
            <div class="panel-body">

                {{--<div class="col-md-6">
                    {!!Form::label('almacen','Almacen:')!!}
                    {!!Form::select('almacen',$almacen,'',['class'=>'form-control','id'=>'tipo_renglon'])!!}
                </div>
--}}
                <div class="col-md-6">
                    {!!Form::label('tipo_renglon','Tipo de Artículo:')!!}
                    {!!Form::select('tipo_renglon',$trenglon,'',['class'=>'form-control','id'=>'tipo_renglon'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('descripcion','Descripción del Artículo:')!!}
                    {!!Form::text('descripcion',null,['class'=>'form-control','type'=>'text'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('marca','Marca:')!!}
                    {!!Form::select('marca',$marca,'',['class'=>'form-control','id'=>'marca'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('modelo','Modelo:')!!}
                    {!!Form::select('modelo',$modelo,'',['class'=>'form-control','id'=>'modelo'])!!}
                </div>
               {{-- <div class="col-md-6">
                    {!!Form::label('codigo_fabricante','Codigo Fabricante:')!!}
                    {!!Form::text('codigo_fabricante',null,['class'=>'form-control','type'=>'text'])!!}
                </div>--}}
           {{--     <div class="col-md-6" id="imei">
                    {!!Form::label('imei','IMEI:')!!}
                    {!!Form::text('imei',null,['class'=>'form-control','type'=>'text'])!!}
                </div>--}}

                    <div class="input_fields_wrap">
                        <div class="col-md-6">
                            <label for="serial[]">Serial</label>
                            <div class="input-group">
                                <div><input type="text" name="serial[]" class="form-control"></div>
                                <span class="input-group-btn"><button class="add_field_button btn btn-info">Añadir</button></span>
                            </div>
                        </div>
                    </div>
                <div class="col-md-6">
                    {!!Form::label('unidad_medida','Unidad de Medida:')!!}
                    {!!Form::select('unidad_medida',$unidades,'',['class'=>'form-control','id'=>'unidades'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('cantidad','Cantidad:')!!}
                    {!!Form::text('cantidad',1,['class'=>'form-control','type'=>'text','id'=>'cantidad'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('existencia_minima','Existencia Minima:')!!}
                    {!!Form::text('existencia_minima',null,['class'=>'form-control','type'=>'text'])!!}
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
                        $(wrapper).append('<div class="col-md-6"><label for="serial[]">Serial '+x+'</label><div class="input-group"><input type="text" name="serial['+x+']" class="form-control"/><span class="input-group-btn"><a href="#" class="remove_field btn btn-danger">Remover</a></span></div></div>'); //add input box
                    /*}*/
                });

                $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                    e.preventDefault(); $(this).parent('.input_group').remove(); x--;
                })

                var sum=1;
                $('.add_field_button').on('click', function () {
                    sum++;
                    $('#cantidad').val(sum);
                });
          });
    </script>

@endsection

