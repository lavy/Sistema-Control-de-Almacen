@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(['url'=>'despacho/'.$detalles->id_transaccion,'onsubmit'=>'return validacion()','class'=>'form-horizontal'])!!}

    <div class="panel panel-primary">
        <div class="panel-heading" style="text-align:center;">DETALLES DE LA ORDEN</div>
        <div class="panel-body">
            <div class="col-md-offset-5">
                <button class="add_field_button btn btn-primary ">Añadir</button>
            </div>
            {{--@foreach($solic as $sol)

                {{$sol->descrip_oficina}}
                {{$sol->descrip_departamento}}
                {{$sol->pedido}}
            @endforeach--}}
            {{--<div class="form-horizontal">--}}
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
                    {!!Form::text('cantidad',1,array('class'=>'form-control','id'=>'cantidad_pedir'))!!}
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
            {{--<div class="form-group">
               {!!Form::label('nro_orden','NRO DE ORDEN:',['class'=>'control-label col-xs-2'])!!}
               <div class="col-md-6">
                   {!!Form::text('nro_orden',$detalles->id_orden,array('class'=>'form-control','readonly'))!!}
               </div>
            </div>--}}

          {{--  @foreach($deta as $det)
                <tr>
                    <td>{!!Form::label('existencia_a','EXISTENCIA ACTUAL:')!!}</td>
                    <td>{!!Form::text('existencia_a',$det->cantidad_existencia,array('class'=>'form-control','readonly','id'=>'existencia_actual'))!!}</td>
                </tr>
                {!!Form::text('existencia_minima',$det->existencia_minima,array('id'=>'existencia_minima'))!!}
            @endforeach--}}

            {{--</div>--}}
                {{--<table class="table table-hover table-bordered">
                    <tr>
                        <td>{!!Form::label('nro_solicitud','NRO DE SOLICITUD:')!!}</td>
                        <td>{!!Form::text('nro_solicitud',$detalles->id_solicitud,array('class'=>'form-control','readonly'))!!}</td>
                    </tr>

                    <tr>
                        <td>{!!Form::label('nro_orden','NRO DE ORDEN:')!!}</td>
                        <td>{!!Form::text('nro_orden',$detalles->id_orden,array('class'=>'form-control','readonly'))!!}</td>
                    </tr>

                    <tr>
                        <td>{!!Form::label('nro_almacen','ALMACÉN:')!!}</td>
                        <td>{!!Form::text('nro_almacen',$detalles->id_almacen,array('class'=>'form-control','readonly'))!!}</td>
                    </tr>

                    <tr>
                        <td>{!!Form::label('articulo','ARTICULO:')!!}</td>
                        <td>{!!Form::text('articulo',$detalles->id_renglon,array('class'=>'form-control','readonly'=>'true','id'=>'cantidad_pedir'))!!}</td>
                    </tr>

                    <tr>
                        <td>{!!Form::label('tecnico','TÉCNICO:')!!}</td>
                        <td>{!!Form::select('tecnico',$tecnicos,'',['class'=>'form-control','id'=>'tecnico'])!!}</td>
                    </tr>

                   --}}{{-- <tr>
                        <td>{!!Form::label('cantidad','CANTIDAD:')!!}</td>
                        <td>{!!Form::text('cantidad',null,array('class'=>'form-control','id'=>'cantidad_pedir'))!!}</td>
                    </tr>--}}{{--

                    --}}{{--<div class="input_fields_wrap">
                        <div class="col-md-6">
                            <td><label for="serial[]">SERIAL:</label></td>
                            <div class="input-group">
                                <td><select name="serial[]" class="form-control" id="seriales">
                                    @foreach($seriales as $serial)
                                    <option value="{!!$serial!!}">{!!$serial!!}</option>
                                    @endforeach
                                </select></td>
                                <span class="input-group-btn"><button class="add_field_button btn btn-info">Añadir</button></span>
                            </div>
                            </div>
                        </div>--}}{{--

                    <tr class="input_fields_wraps">
                        <td><label for="serial[]">SERIAL 1</label></td>
                        <td>{!!Form::select('serial[]',$seriales,'',['class'=>'form-control','id'=>'seriales'])!!}</td>
                    </tr>

                    <div class="col-md-offset-5">
                        <button class="add_field_button btn btn-primary ">Añadir</button>
                    </div>

                    <tr  id="hijos">


                    </tr>

                    <tr>
                        <td>{!!Form::label('cantidad','CANTIDAD:')!!}</td>
                        <td>{!!Form::text('cantidad',1,array('class'=>'form-control','id'=>'cantidad_pedir'))!!}</td>
                    </tr>
                    --}}{{--</div>--}}{{--

                   --}}{{-- <div class="input_fields_wrap">
                        <div class="col-md-6">
                            <div class="input-group">
                                <td>{!!Form::label('serial[]','SERIAL:')!!}</td>
                                <td>{!!Form::select('serial[]',$seriales,'',['class'=>'form-control','id'=>'seriales'])!!}</td>
                                <span class="input-group-btn"><button class="add_field_button btn btn-info">Añadir</button></span>
                            </div>
                        </div>--}}{{--

                    --}}{{--@for($x=0;$x<5;$x++)
                        <tr>
                            <td><label for="serial[]">SERIAL:</label></td>
                            <td>{!!Form::select('serial[]',$seriales,'',['class'=>'form-control','id'=>'seriales'])!!}</td>
                        </tr>
                    @endfor--}}{{--

                @foreach($deta as $det)
                    <tr>
                        <td>{!!Form::label('existencia_a','EXISTENCIA ACTUAL:')!!}</td>
                        <td>{!!Form::text('existencia_a',$det->cantidad_existencia,array('class'=>'form-control','readonly','id'=>'existencia_actual'))!!}</td>
                    </tr>
                        {!!Form::text('existencia_minima',$det->existencia_minima,array('id'=>'existencia_minima'))!!}
                @endforeach
                </table>--}}
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
          var total=cantidad-

          if (cantidad > existencia) {
              alert('LA CANTIDAD DEBE SER MENOR A LA EXISTENCIA');
             return false;
         }

         if(){
             alert('');
             return false;
         }
        }

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


        var max_fields      = 10; //maximum input boxes allowed
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

        var sum=1;
        $('.add_field_button').on('click', function () {
            sum++;
            $('#cantidad_pedir').val(sum);
        });



    </script>
@endsection