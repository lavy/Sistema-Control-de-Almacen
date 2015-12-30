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
        {!!Form::open(['url'=>'jefes/'.$jefes->id_jefe])!!}
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">EDITAR JEFES</div>
            <div class="panel-body">
                <div class="col-md-6">
                    {!!Form::label('oficina','Oficina:')!!}
                    {!!Form::select('oficina',$oficinas,$jefes->id_oficina,['class'=>'form-control'])!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('nombre','Nombre:')!!}
                    {!!Form::text('nombre',$jefes->nombre,array('class'=>'form-control','type'=>'text'))!!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('cedula','Cedula:')!!}
                    {!!Form::text('cedula',$jefes->cedula,array('class'=>'form-control','type'=>'text'))!!}
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
        $(function () {
            $('#datetimepicker5').datetimepicker({
                format:'DD-MM-YYYY'
            });
        });
    </script>
@endsection