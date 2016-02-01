@extends('app')

@section('content')
    <div class="container">
        {!!Form::open(['action'=>'SolicitudesController@store'])!!}

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

        <center><h1>Registro de Solicitudes</h1></center>
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center">DATOS SOLICITANTE</div>
            <div class="panel-body">

                {{--  <div class="col-md-6">
                      {!!Form::label('almacen','Almacen:')!!}
                      {!!Form::select('almacen',array('Por Favor Seleccione'),0,array('class'=>'form-control'))!!}
                  </div>--}}
                <div class="col-md-6">
                    {!!Form::label('oficina','Oficina:')!!}
                    {!!Form::select('oficina',$oficina,'',['class'=>'form-control','id'=>'oficina'])!!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('departamento','Departamento:')   !!}
                    <select class="form-control" id="departamento" name="departamento">
                        <option>Debe Seleccionar un Departamento</option>
                    </select>
                </div>
                <div class="col-md-6">
                    {!!Form::label('nombre_beneficiario','Nombre Beneficiario:')!!}
                    {!!Form::text('nombre_beneficiario',null,['class'=>'form-control','type'=>'text'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('telef_beneficiario','Telefono Beneficiario:')!!}
                    {!!Form::text('telef_beneficiario',null,['class'=>'form-control','type'=>'text','placeholder'=>'0426-256-6545','pattern'=>'\d{4}[\-]\d{3}[\-]\d{4}'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('email_beneficiario','Email Beneficiario:')!!}
                    {!!Form::email('email_beneficiario',null,['class'=>'form-control','type'=>'text'])!!}
                </div>

            </div>
        </div>


        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center">DATOS SOLICITUD</div>
            <div class="panel-body">

                <div class="col-md-6 col-md-offset-3 col-center-block">
                    {!!Form::label('tipo_solicitud','Tipo de Solicitud:')!!}
                    {!!Form::select('tipo_solicitud',array('Por Favor Seleccione','Asignación','Prestamo'),0,['class'=>'form-control','id'=>'tipo_solicitud'])!!}
                </div>

                <div class='col-sm-6' style="margin-top: 25px">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker5'>
                            {{--{!!Form::label('desde','Fecha De Inicio:')!!}--}}
                            <input type='text' name="desde" class="form-control"  placeholder="Desde" disabled id="datetimepicker54"/>
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
                            <input type='text' name="hasta" class="form-control" placeholder="Hasta" disabled id="datetimepicker64"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    {!!Form::label('t_articulos','Tipo de Artículos:')!!}
                    {!!Form::select('t_articulos',$t_articulo,'',['class'=>'form-control','id'=>'t_articulos'])!!}
                </div>

                <div class="col-md-6">
                    {!! Form::label('articulos','Artículo:')   !!}
                    <select class="form-control" id="articulos" name="articulos">
                        <option>Debe Seleccionar un Articulo</option>
                    </select>
                </div>

                <div class="col-md-6">
                    {!!Form::label('detalle','Detalles del Pedido:')!!}
                    {!!Form::text('detalle',null,['class'=>'form-control','type'=>'text'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('observaciones','Observaciones:')!!}
                    {!!Form::text('observaciones',null,['class'=>'form-control','type'=>'text'])!!}
                </div>

                <div class="col-md-6 col-md-offset-5 col-center-block">
                    {!!Form::submit('Aceptar',['class'=>'btn btn-primary','name'=>'Aceptar'])!!}
                    {!!link_to('menu','Salir',['class'=>'btn btn-primary'])!!}
                </div>
            </div>
        </div>
            </div>
    {!!Form::close()!!}
    </div>
    <script type="text/javascript">
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
                    daysOfWeekDisabled: [0, 6],
                    useCurrent: false, //Important! See issue #1075
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

    </script>
@endsection