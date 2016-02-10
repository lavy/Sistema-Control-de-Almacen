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
        {!!Form::open(['url'=>'despacho/'.$detalles->id_transaccion,'onsubmit'=>'return validacion()','class'=>'form-horizontal','id'=>'form'])!!}

        <div id="info"></div>

        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">DETALLES DE LA ORDEN</div>
            <div class="panel-body">


                <table class="table table-bordered">
                    <tr>
                        <th>Nro de Solicitud</th>
                        <th>Nro de Orden</th>
                        <th>Solicitud</th>
                        <th>Articulo</th>
                    </tr>
                    <tr>
                        <td>{{$detalles->id_solicitud}}</td>
                        <td>{{$detalles->id_orden}}</td>
                     @foreach($almacen as $almac)
                        <td>{{$almac->descrip_almacen}}</td>
                        <td>{{$almac->descrip_renglon}}</td>
                     @endforeach
                    </tr>
                </table>

                <div class="col-md-6">
                    {!!Form::label('tecnico','TÉCNICO:')!!}
                    {!!Form::select('tecnico',$tecnicos,'',['class'=>'form-control','id'=>'tecnico'])!!}
                </div>

                <div class="col-md-6">
                      <label for="serial[]">SERIAL</label>
                      {!!Form::select('serial[]',$seriales,'',['class'=>'form-control selectpicker','id'=>'seriales','multiple','data-live-search'=>'true'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('cantidad','CANTIDAD:')!!}
                    {!!Form::text('cantidad',0,array('class'=>'form-control','id'=>'cantidad_pedir','readonly'=>'true'))!!}
                </div>

                @foreach($deta as $det)
                    <div class="col-md-6">
                        {!!Form::label('existencia_a','EXISTENCIA:')!!}
                        {!!Form::text('existencia_a',$det->cantidad_existencia,array('class'=>'form-control','readonly','id'=>'existencia_actual'))!!}
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
        $(document).ready(function(){
            $('#form').submit(function(){
            var cantidad=$('#cantidad_pedir').val();
            var existencia=$('#existencia_actual').val();
            var existencia_m=$('#existencia_minima').val();
            var total=cantidad-existencia;
                if(isNaN(cantidad)){
                    $('#info').html("<div class='alert alert-danger'><b>La cantidad debe ser númerica</b></div>")
                    return false;
                }
            /*
            var cantidad = document.getElementById('cantidad_pedir').value;
            var existencia = document.getElementById('existencia_actual').value;
            var existencia_m = document.getElementById('existencia_minima').value;
            var total=cantidad-existencia;*/
           /* if (cantidad > existencia) {
                $('#info').html("<div class='alert alert-danger'><b>La Cantidad a Solicitar debe ser Menor a la Existencia</b></div>")
                *//*alert('LA CANTIDAD DEBE SER MENOR A LA EXISTENCIA');*//*
                return false;
            }*/
            });



            $('.selectpicker').selectpicker({
                style: 'btn-default',
                size: 10
            });


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

        /*var selecciones=$('.selectpicker');*/
        $('.selectpicker').change(function () {
            /*var valor = $(this).val();*/
            if('li.selected == elected'){
                var sum=$('#cantidad_pedir').val();
                sum++;
                $('#cantidad_pedir').val(sum);
            }else
            {
            var rest=$('#cantidad_pedir').val();
            rest--;
            $('#cantidad_pedir').val(rest);
            }
        });

        });
    </script>
@endsection