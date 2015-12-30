@extends('app')

@section('content')
    <div class="container">
        @if($errors->has())
            <div class='alert alert-danger'>
                @foreach ($errors->all('<p>:message</p>') as $message)
                    {!! $message !!}
                @endforeach
            </div>
        @endif
        {!!Form::open(['url'=>'despacho/'.$detalles->id_transaccion,'onsubmit'=>'return validacion()','class'=>'form-horizontal'])!!}

        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">DETALLES DE LA ORDEN</div>
            <div class="panel-body">
                <div class="col-md-offset-5">
                    <button class="add_field_button btn btn-info ">+</button>
                </div>
                <div class="form-group">
                    {!!Form::label('nro_solicitud','NRO DE SOLICITUD:',['class'=>'control-label col-xs-4'])!!}
                    <div class="col-md-6">
                        {!!Form::text('nro_solicitud',$detalles->id_solicitud,array('class'=>'form-control','readonly'))!!}
                    </div>
                </div>

                <div class="form-group">
                    {!!Form::label('nro_orden','NRO DE ORDEN:',['class'=>'control-label col-xs-4'])!!}
                    <div class="col-md-6">
                        {!!Form::text('nro_orden',$detalles->id_orden,array('class'=>'form-control','readonly'))!!}
                    </div>
                </div>

                <div class="form-group">
                    {!!Form::label('nro_almacen','ALMACÉN:',['class'=>'control-label col-xs-4'])!!}
                    <div class="col-md-6">
                        {!!Form::text('nro_almacen',$detalles->id_almacen,array('class'=>'form-control','readonly'))!!}
                    </div>
                </div>

                <div class="form-group">
                    {!!Form::label('articulo','ARTICULO:',['class'=>'control-label col-xs-4'])!!}
                    <div class="col-md-6">
                        {!!Form::text('articulo',$detalles->id_renglon,array('class'=>'form-control','readonly'=>'true'))!!}
                    </div>
                </div>

                <div class="form-group">
                    {!!Form::label('tecnico','TÉCNICO:',['class'=>'control-label col-xs-4'])!!}
                    <div class="col-md-6">
                        {!!Form::select('tecnico',$tecnicos,'',['class'=>'form-control','id'=>'tecnico'])!!}
                    </div>
                </div>


                <div class="input_fields_wraps">
                    <div class="form-group">
                        <label for="serial[]" class="control-label col-xs-4">SERIAL</label>
                        <div class="col-md-6">
                            {!!Form::select('serial[]',$seriales,'',['class'=>'form-control','id'=>'seriales'])!!}
                        </div>
                    </div>
                </div>


                <div  id="hijos">


                </div>

                <div class="form-group">
                    {!!Form::label('cantidad','CANTIDAD:',['class'=>'control-label col-xs-4'])!!}
                    <div class="col-md-6">
                        {!!Form::text('cantidad',1,array('class'=>'form-control','id'=>'cantidad_pedir','readonly'=>'true'))!!}
                    </div>
                </div>

                @foreach($deta as $det)
                    <div class="form-group">
                        {!!Form::label('existencia_a','EXISTENCIA ACTUAL:',['class'=>'control-label col-xs-4'])!!}
                        <div class="col-md-6">
                            {!!Form::text('existencia_a',$det->cantidad_existencia,array('class'=>'form-control','readonly','id'=>'existencia_actual'))!!}
                        </div>
                    </div>
                    {!!Form::text('existencia_minima',$det->existencia_minima,array('id'=>'existencia_minima'))!!}
                @endforeach

            </div>
        </div>
        {!!form::submit('Aceptar',['class'=>'btn btn-success'])!!}
        {!!Form::close()!!}
    </div>

    <script type="text/javascript">
        $('#existencia_minima').hide();
        function validacion(){
            var cantidad = document.getElementById('cantidad_pedir').value;
            var existencia = document.getElementById('existencia_actual').value;
            var existencia_m = document.getElementById('existencia_minima').value;
            var total=cantidad-existencia;
           /* if (cantidad > existencia) {
                alert('LA CANTIDAD DEBE SER MENOR A LA EXISTENCIA');
                return false;
            }*/

        }
       $("#seriales").change(function() {
           $("#seriales option:selected").each(function () {
               $(this).hide();
           })
       });

        /*   var max_fields      = 10; //maximum input boxes allowed
         var wrapper         = $(".input_fields_wrap"); //Fields wrapper
         var add_button      = $(".add_field_button"); //Add button ID
         var x = 0; //initlal text box count
         $(add_button).click(function(e){ //on add input button click
         e.preventDefault();
         *//*if(x < max_fields){ //max input box allowed*//*
         x++; //text box increment
         *//*$(wrapper).append('<div class="col-md-6"><label for="serial[]">Serial '+x+'</label><td><select name="serial['+x+']" class="form-control"><option></option></select></td><span class="input-group-btn"><a href="#" class="remove_field btn btn-danger">Remover</a></span></div></div>'); //add input box*//*
         $(wrapper).clone().appendTo('.serials'); //add input box
         *//*}*//*
         });
         $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
         e.preventDefault(); $(this).parent('div').remove(); x--;
         })*/
        var existencia=$('#existencia_actual').val();
        var max_fields      = existencia; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wraps"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID
        var x = 1; //initial text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).clone().appendTo('#hijos')
                /*$(wrapper).clone().attr('id','acompañante2').appendTo('<div class="col-md-3"><input type="text" class="form-control" name="mytext[]"/><a href="#" class="remove_field btn btn-danger">Remover</a></div>'); //add input box*/
            }
        });
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('tr').remove(); x--;
        })

        $('.add_field_button').on('click', function () {
            var sum=$('#cantidad_pedir').val();
            sum++;
            $('#cantidad_pedir').val(sum);
        });
    </script>
@endsection