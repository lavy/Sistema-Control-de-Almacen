@extends('app')
@section('content')
    <div class="container">
        {!!Form::open(['url'=>'solicitudes/'.$solicitud->id_solicitud,'id'=>'form'])!!}
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
        <center><h1>Editar Solicitud</h1></center>
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">DATOS SOLICITANTE</div>
            <div class="panel-body">

                <div class="col-md-6">
                    {!!Form::label('oficina','Oficina:')!!}
                    {!!Form::select('oficina',$oficina,$solicitud->id_oficina,['class'=>'form-control','id'=>'oficina'])!!}
                    {{--{!!Form::text('oficina',$solicitud->id_oficina,array('class'=>'form-control','type'=>'text'))!!}--}}
                </div>
                <div class="col-md-6">
                    {!! Form::label('departamento','Departamento:')   !!}
                    {!!Form::select('departamento',$departamento,$solicitud->id_departamento,['class'=>'form-control','id'=>'departamento'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('nombre_beneficiario','Beneficiario:')!!}
                    {!!Form::text('nombre_beneficiario',$solicitud->beneficiario,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('telef_beneficiario','Telefono Beneficiario:')!!}
                    {!!Form::text('telef_beneficiario',$solicitud->telef_beneficiario,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('email_beneficiario','Email Beneficiario:')!!}
                    {!!Form::text('email_beneficiario',$solicitud->email_beneficiario,array('class'=>'form-control','type'=>'text'))!!}
                </div>

            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center">DATOS SOLICITUD</div>
            <div class="panel-body">
                <div  class="col-md-6 col-md-offset-3 col-center-block">
                    {!!Form::label('tipo_solicitud','Tipo Solicitud:')!!}
                    {!!Form::select('tipo_solicitud',array('Por Favor Seleccione','Asignación','Prestamo'),$solicitud->tipo_solicitud,['class'=>'form-control','id'=>'tipo_solicitud'])!!}
                </div>

                <div class='col-sm-6' style="margin-top: 25px">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker5'>
                            {{--{!!Form::label('desde','Fecha De Inicio:')!!}--}}
                            <input type='text'  value="{{$solicitud->desde}}" name="desde" class="form-control"  placeholder="Desde" disabled id="datetimepicker54"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                </div>



                <div class='col-sm-6' style="margin-top: 25px">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker6'>
                            {{--{!!Form::label('hasta','Fecha De Culminación:')!!}--}}
                            <input type='text' name="hasta" value="{{$solicitud->hasta}}" class="form-control" placeholder="Hasta" disabled id="datetimepicker64"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    {!!Form::label('t_articulos','Tipo de Artículos:')!!}
                    {!!Form::select('t_articulos',$t_articulo,$solicitud->id_tipo_renglon,['class'=>'form-control','id'=>'t_articulos'])!!}
                </div>

                <div class="col-md-6">
                    {!! Form::label('articulos','Artículo:')   !!}
                    {!!Form::select('articulos',$articulo,$solicitud->id_renglon,['class'=>'form-control','id'=>'articulos'])!!}
                </div>
                {{--<div class="col-md-6">
                    {!!Form::label('estatus','Estatus:')!!}
                    {!!Form::text('estatus',$solicitud->estatus,array('class'=>'form-control','type'=>'text'))!!}
                </div>--}}
                <div class="col-md-6">
                    {!!Form::label('detalle','Detalles del Pedido:')!!}
                    {!!Form::text('detalle',$solicitud->pedido,['class'=>'form-control','type'=>'text'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('observaciones','Observaciones:')!!}
                    {!!Form::text('observaciones',$solicitud->observaciones,['class'=>'form-control','type'=>'text'])!!}
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
            $('#datetimepicker5').hide();
            $('#datetimepicker6').hide();

            $('#oficina').change(function () {
                $.get("{{ url('solicitudes_almacen')}}",
                        {option: $(this).val()},
                        function (data) {
                            $('#departamento').empty();
                            $.each(data, function (key, element) {
                                $('#departamento').append("<option value='" + key + "'>" + element + "</option>");
                            });
                        });
            });

            $(function () {
                $('#datetimepicker5').datetimepicker({
                    minDate: new Date(),
                    daysOfWeekDisabled: [0, 6],
                    useCurrent:true,
                    format:'DD-MM-YYYY',
                    locale:'es'

                });
                $('#datetimepicker6').datetimepicker({
                    useCurrent: false, //Important! See issue #1075
                    daysOfWeekDisabled: [0, 6],
                    format:'DD-MM-YYYY',
                    locale:'es'
                });

                $("#datetimepicker5").on("dp.change", function (e) {
                    $('#datetimepicker6').data("DateTimePicker").minDate(e.date);
                });

                $("#datetimepicker6").on("dp.change", function (e) {
                    $('#datetimepicker5').data("DateTimePicker").maxDate(e.date);
                });
            });

            $('#t_articulos').change(function () {
                $.get("{{ url('t_articulos')}}",
                        {option: $(this).val()},
                        function (data) {
                            $('#articulos').empty();
                            $.each(data, function (key, element) {
                                $('#articulos').append("<option value='" + key + "'>" + element + "</option>");
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

            $('#tipo_solicitud').click(function(){
                var valor=$('#tipo_solicitud option:selected').html();
                if (valor==='Prestamo'){
                    $('#datetimepicker54').attr('disabled',false);
                }else{
                    $('#datetimepicker54').attr('disabled',true);
                }
            });

            $('#tipo_solicitud').click(function(){
                var valor=$('#tipo_solicitud option:selected').html();
                if (valor==='Prestamo'){
                    $('#datetimepicker5').show();
                }else{
                    $('#datetimepicker5').hide();
                }
            });

            $('#tipo_solicitud').click(function(){
                var valor=$('#tipo_solicitud option:selected').html();
                if (valor==='Prestamo'){
                    $('#datetimepicker6').show();
                }else{
                    $('#datetimepicker6').hide();
                }
            });

            $('#tipo_solicitud').click(function(){
                var valor=$('#tipo_solicitud option:selected').html();
                if (valor==='Prestamo'){
                    $('#datetimepicker64').attr('disabled',false);
                }else{
                    $('#datetimepicker64').attr('disabled',true);
                }
            });
        });
        $('#desde').hide();
        $('#hasta').hide();

        if ($('#desdes').val() !='')
        {
            $('#desde').show();
        }

        if ($('#hastas').val() !='')
        {
            $('#hasta').show();
        }


        $('#form').submit(function() {
            var Oficina=$('#oficina').val();
            var Departamento=$('#Departamento').val();
            var Nombre = $('#nombre').val();
            var Telefono = $('#telefono').val();
            var Correo = $('#correo').val();
            var Tipo_Solicitud=$('#tipo_solicitud').val();
            var Detalle = $('#detalle').val();
            var Observacion = $('#observacion').val();
            var desde=$('#datetimepicker54').val();
            var hasta=$('#datetimepicker64').val();
            var seleccionado=$('#tipo_solicitud option:selected').html();


            if(Oficina == 0){
                $('#info').html("<div class='alert alert-danger'><b>Debe Seleccionar una Oficina</b></div>");
                return false;
            }
            else if(Departamento == 0){
                $('#info').html("<div class='alert alert-danger'><b>Debe Seleccionar un Departamento</b></div>");
                return false;
            }
            else if (Nombre.length > 50 || Nombre.length == "") {
                $('#info').html("<div class='alert alert-danger'><b>El Campo Nombre Beneficiario debe ser menor a 50 Caracteres</b></div>");
                return false;
            }
            else if (Telefono.length > 11 || Telefono.length == "" || isNaN(Telefono)) {
                $('#info').html("<div class='alert alert-danger'><b>El Campo Telefono Beneficiario debe ser menor a 11 Caracteres, no debe estar vacio y debe ser numerico</b></div>");
                return false;
            }
            else if (Correo.length > 60 || Correo.length == "") {
                $('#info').html("<div class='alert alert-danger'><b>El Campo Correo Beneficiario debe ser menor a 60 Caracteres</b></div>");
                return false;
            }
            else if(Tipo_Solicitud == 0){
                $('#info').html("<div class='alert alert-danger'><b>Debe Seleccionar Un tipo de Solicitud</b></div>");
                return false;
            }
            else if (Detalle.length > 250 || Detalle.length == "") {
                $('#info').html("<div class='alert alert-danger'><b>El Campo Detalle Pedido Contacto debe ser menor a 250 Caracteres</b></div>");
                return false;
            }
            else if (Observacion.length > 250 || Observacion.length == "") {
                $('#info').html("<div class='alert alert-danger'><b>El Campo Observacion debe ser menor a 250 Caracteres</b></div>");
                return false;
            }
            else if (seleccionado === 'Prestamo'){
                if(desde.length == "" || hasta.length == ""){
                    $('#info').html("<div class='alert alert-danger'><b>El Campo desde y hasta no debe estar vacio</b></div>");
                    return false;
                }
            }
        });

    </script>

@endsection