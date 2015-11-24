@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(['url'=>'despacho/'.$detalles->id_transaccion,'onsubmit'=>'return validacion()'])!!}

    <div class="panel panel-primary">
        <div class="panel-heading" style="text-align:center;">DETALLES DE LA ORDEN</div>
        <div class="panel-body">
            {{--@foreach($solic as $sol)

                {{$sol->descrip_oficina}}
                {{$sol->descrip_departamento}}
                {{$sol->pedido}}
            @endforeach--}}
                <table class="table table-hover table-bordered">
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

                    <tr>
                        <td>{!!Form::label('cantidad','CANTIDAD:')!!}</td>
                        <td>{!!Form::text('cantidad',null,array('class'=>'form-control','id'=>'cantidad_pedir'))!!}</td>
                    </tr>

                    {{--<div class="input_fields_wrap">
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
                        </div>--}}

                    <tr class="input_fields_wraps">
                        <td><label for="serial[]">SERIAL 1</label></td>
                        <td>{!!Form::select('serial[]',$seriales,'',['class'=>'form-control','id'=>'seriales'])!!}</td>
                    </tr>

                    <div class="col-md-offset-5">
                        <button class="add_field_button btn btn-primary ">Añadir</button>
                    </div>

                    <tr  id="hijos">


                    </tr>
                    {{--</div>--}}

                   {{-- <div class="input_fields_wrap">
                        <div class="col-md-6">
                            <div class="input-group">
                                <td>{!!Form::label('serial[]','SERIAL:')!!}</td>
                                <td>{!!Form::select('serial[]',$seriales,'',['class'=>'form-control','id'=>'seriales'])!!}</td>
                                <span class="input-group-btn"><button class="add_field_button btn btn-info">Añadir</button></span>
                            </div>
                        </div>--}}

                    {{--@for($x=0;$x<5;$x++)
                        <tr>
                            <td><label for="serial[]">SERIAL:</label></td>
                            <td>{!!Form::select('serial[]',$seriales,'',['class'=>'form-control','id'=>'seriales'])!!}</td>
                        </tr>
                    @endfor--}}

                @foreach($deta as $det)
                    <tr>
                        <td>{!!Form::label('existencia_a','EXISTENCIA ACTUAL:')!!}</td>
                        <td>{!!Form::text('existencia_a',$det->cantidad_existencia,array('class'=>'form-control','readonly','id'=>'existencia_actual'))!!}</td>
                    </tr>
                        {!!Form::text('existencia_minima',$det->existencia_minima,array('id'=>'existencia_minima'))!!}
                @endforeach
                </table>
            </div>
        </div>
                {!!form::submit('Aceptar',['class'=>'btn btn-success'])!!}
    {!!Form::close()!!}
    </div>

    <script type="text/javascript">
        $('#existencia_minima').hide();

//      function validacion(){
//          var cantidad = document.getElementById('cantidad_pedir').value;
//          var existencia = document.getElementById('existencia_actual').value;
//          var existencia_m = document.getElementById('existencia_minima').value;
//
//          if (cantidad < existencia) {
//              alert('LA CANTIDAD DEBE SER MENOR A LA EXISTENCIA');
//              return false;
//          }
//
//
//        }

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

    </script>
@endsection