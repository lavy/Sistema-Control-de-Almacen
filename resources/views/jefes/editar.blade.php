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
        {!!Form::open(['url'=>'jefes/'.$jefes->id_jefe,'id'=>'form'])!!}
            <div id="info"></div>
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR JEFES</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('oficina','Oficina:')!!}
                    {!!Form::select('oficina',$oficinas,$jefes->id_oficina,['class'=>'form-control','id'=>'oficina'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('nombre','Nombre:')!!}
                    {!!Form::text('nombre',$jefes->nombre,array('class'=>'form-control','type'=>'text','id'=>'nombre'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('cedula','Cedula:')!!}
                    {!!Form::text('cedula',$jefes->cedula,array('class'=>'form-control','type'=>'text','id'=>'cedula'))!!}
                </div>
                <div class="row">
                    <div class='col-md-6'>
                        <div class="form-group">
                            <label for="fecha_ingreso">Fecha Ingreso</label>
                            <div class='input-group date' id='datetimepicker5'>
                                {!!Form::text('fecha_ingreso',$jefes->fecha_ingreso,array('class'=>'form-control','type'=>'text','readonly'=>'true'))!!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                            </div>
                        </div>
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
    <script type="text/javascript">
     $(document).ready(function(){
        $(function () {
            $('#datetimepicker5').datetimepicker({
                format:'DD-MM-YYYY'
            });
        })


         $('#form').submit(function(){
             var Oficina=$('#oficina').val();
             var Nombre=$('#nombre').val();
             var Cedula=$('#cedula').val();
             /*var ()
              var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
              var dtArray = currVal.match(rxDatePattern);*/

             if(Oficina == 0){
                 $('#info').html("<div class='alert alert-danger'><b>Debe Seleccionar una Oficina</b></div>")
                 return false;
             }
             else if(Nombre.length > 100 || Nombre.length == ""){
                 $('#info').html("<div class='alert alert-danger'><b>El Campo Nombre debe ser menor a 100 caracteres</b></div>")
                 return false;
             }
             else if(Cedula.length > 11 || Cedula.length == ""){
                 $('#info').html("<div class='alert alert-danger'><b>El Campo Cedula debe ser menor a 11 caracteres</b></div>")
                 return false;
             }
         })
     });
    </script>
@endsection