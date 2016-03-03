@extends('app')
@section('title', 'Crear Solicitud')
@section('content')
    <div class="container">
        {!!Form::open(['action'=>'SolicitudesController@store','id'=>'form'])!!}

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
        <center><h1>Registro de la Solicitud</h1></center>
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center">DATOS SOLICITANTE</div>
            <div class="panel-body">

                <div class="col-md-6">
                    {!!Form::label('oficina','Oficina:')!!}
                    {!!Form::select('oficina',$oficina,'',['class'=>'form-control','id'=>'oficina'])!!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('departamento','Departamento:')   !!}
                    <select class="form-control" id="departamento" name="departamento">
                        <option value="0">Debe Seleccionar un Departamento</option>
                    </select>
                </div>
                <div class="col-md-6">
                    {!!Form::label('nombre_beneficiario','Nombre Beneficiario:')!!}
                    {!!Form::text('nombre_beneficiario',null,['class'=>'form-control','type'=>'text','id'=>'nombre'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('telef_beneficiario','Telefono Beneficiario:')!!}
                    {!!Form::text('telef_beneficiario',null,['class'=>'form-control','type'=>'text','placeholder'=>'Ej: 04262566545','id'=>'telefono'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('email_beneficiario','Email Beneficiario:')!!}
                    {!!Form::email('email_beneficiario',null,['class'=>'form-control','type'=>'text','id'=>'correo'])!!}
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
                    {!!Form::label('categoria','Categoria:')!!}
                    {!!Form::select('categoria',$categorias,'',['class'=>'form-control','id'=>'categoria'])!!}
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
                    {!!Form::text('detalle',null,['class'=>'form-control','type'=>'text','id'=>'detalle','placeholder'=>'Importancia'])!!}
                </div>

                <div class="col-md-6">
                    {!!Form::label('observaciones','Observaciones:')!!}
                    {!!Form::text('observaciones',null,['class'=>'form-control','type'=>'text','id'=>'observacion','placeholder'=>'Se necesita para:'])!!}
                </div>

                <div class="col-md-6 col-md-offset-5 col-center-block" style="margin-top: 20px">
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
                    minDate: new Date(),
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


         $('#oficina').change(function() {
            var Oficina=$('#oficina').val();
            if (Oficina == 0) {
                $('#departamento').empty();
                $('#departamento').append("<option value='0'>Debe Seleccionar un Departamento</option>");
            }
        });

        $('#t_articulos').change(function() {
            var Tipo_articulo=$('#t_articulos').val();
            if (Tipo_articulo == 0) {
                $('#articulos').empty();
                $('#articulos').append("<option value='0'>Debe Seleccionar un Articulo</option>");
            }
        });



        $('#form').submit(function() {
            var Oficina=$('#oficina').val();
            var Departamento=$('#departamento').val();
            var Nombre = $('#nombre').val();
            var Telefono = $('#telefono').val();
            var Correo = $('#correo').val();
            var Tipo_Solicitud=$('#tipo_solicitud').val();
            var Tipo_articulo=$('#t_articulos').val();
            var Articulo=$('#articulos').val();
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
            else if(Tipo_articulo == 0){
                $('#info').html("<div class='alert alert-danger'><b>Debe Seleccionar Un Tipo de Articulo</b></div>");
                return false;
            }
            else if(Articulo == 0){
                $('#info').html("<div class='alert alert-danger'><b>Debe Seleccionar Un Articulo</b></div>");
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