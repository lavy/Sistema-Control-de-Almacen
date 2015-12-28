@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(['url'=>'renglones/'.$renglon->id_renglon,'files'=>'true'])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR ARTÍCULO</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('tipo_renglon','Tipo de Renglon:')!!}
                    {!!Form::select('tipo_renglon',$tipo_renglon,$renglon->id_tipo_renglon,['class'=>'form-control','id'=>'tipo_renglon'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('descripcion','Descripción:')!!}
                    {!!Form::text('descripcion',$renglon->descrip_renglon,array('class'=>'form-control'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('marca','Marca:')!!}
                    {!!Form::select('marca',$marca,'',['class'=>'form-control','id'=>'marca'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('modelo','Modelo:')!!}
                    {!!Form::select('modelo',$modelo,'',['class'=>'form-control','id'=>'modelo'])!!}
                </div>

                @foreach($seriales as $serial)
                <div class="input_fields_wrap">
                    <div class="col-md-6">
                        <label for="serial[]">Serial</label>
                        <div class="input-group">
                            <div>
                                <input type="text" name="serial[]" class="form-control" value="<?php echo $serial->seriales;?>" title="Si quiere agregar otro producto, Presione el boton (+)" data-toggle="tooltip">
                            </div>
                            {{--<span class="input-group-btn"><button class="add_field_button btn btn-info">+</button></span>--}}
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-md-6">
                    {!!Form::label('unidad_medida','Unidad de Medida:')!!}
                    {!!Form::select('unidad_medida',['Kilogramos'=>'Kilogramos','Unidades'=>'Unidades','Litros'=>'Litros','Metros'=>'Metros'],$renglon->unidad_medida,['class'=>'form-control','id'=>'unidades'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('cantidad','Cantidad:')!!}
                    {!!Form::text('cantidad',$renglon->cantidad,['class'=>'form-control','type'=>'text','id'=>'cantidad','readonly'=>'true'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('existencia_minima','Existencia Minima:')!!}
                    {!!Form::text('existencia_minima',$renglon->existencia_minima,['class'=>'form-control','type'=>'text'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('foto_articulo','Foto Articulo:')!!}
                    {!!Form::file('foto_articulo')!!}
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


            /*var cantidad=('#cantidad').val();
             if(cantidad <= 0)
             {
             alert('la cantidad no debe ser 0');
             cantidad=1;
             }*/



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

        });
    </script>
@endsection