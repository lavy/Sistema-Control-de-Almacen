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
                    {!!Form::text('cantidad',0,array('class'=>'form-control','id'=>'cantidad_pedir'))!!}
                </div>

                @foreach($deta as $det)
                    <div class="col-md-6">
                        {!!Form::label('existencia_a','EXISTENCIA:')!!}
                        {!!Form::text('existencia_a',$det->cantidad_existencia,array('class'=>'form-control','readonly','id'=>'existencia_actual'))!!}
                    </div>
                    <div class="col-md-6">
                        {!!Form::label('existencia_minima','EXISTENCIA MINIMA:')!!}
                        {!!Form::text('existencia_minima',$det->existencia_minima,array('class'=>'form-control','id'=>'existencia_minima','readonly'=>'true'))!!}
                    </div>
                @endforeach

            </div>
        </div>
        {!!form::submit('Aceptar',['class'=>'btn btn-success'])!!}
        {!!Form::close()!!}
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#form').submit(function(){
            var cantidad=$('#cantidad_pedir').val();
            var existencia=$('#existencia_actual').val();
            var existencia_m=$('#existencia_minima').val();
            var total=existencia-cantidad;

                if(isNaN(cantidad) || cantidad <= 0 || cantidad.length == ""){
                    $('#info').html("<div class='alert alert-danger'><b>La cantidad debe ser númerica, mayor que cero</b></div>")
                    return false;
                }
                else if(cantidad > existencia || cantidad == existencia){
                    $('#info').html("<div class='alert alert-danger'><b>La cantidad debe ser menor que existencia</b></div>")
                    return false;
                }
                else if(total <= existencia_m ){
                    $('#info').html("<div class='alert alert-danger'><b>La existencia minima es '+existencia_m+', por favor inserte otra cantidad.</b></div>")
                    return false;
                }

            });


            $('.selectpicker').selectpicker({
                style: 'btn-default',
                size: 10
            });
        $('.selectpicker').countSelectedText();

        $('.selectpicker').change(function () {
            /*var valor = $(this).val();*/
            if($('.selectpicker option:selected')){
                var sum=$('#cantidad_pedir').val();
                sum++;
                $('#cantidad_pedir').val(sum);
            }else
            {
                $('span').addClass('uncheck');
            var rest=$('#cantidad_pedir').val();
            rest--;
            $('#cantidad_pedir').val(rest);
            }
        });

        });
    </script>
@endsection