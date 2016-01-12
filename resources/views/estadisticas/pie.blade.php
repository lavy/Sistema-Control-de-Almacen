@extends('app')
@section('content')
{{--
    {!!Form::open(['url'=>'almacen','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
    <div class="form-group">
    <div class='col-sm-6' style="margin-top: 25px">
        <div class="form-group">
            <div class='input-group date' id='datetimepicker5'>
                --}}{{--{!!Form::label('desde','Fecha De Inicio:')!!}--}}{{--
                <input type='text' name="desde" class="form-control"  placeholder="Desde" id="datetimepicker54"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
    </div>



    <div class='col-sm-6' style="margin-top: 25px">
        <div class="form-group">
            <div class='input-group date' id='datetimepicker6'>
                --}}{{--{!!Form::label('hasta','Fecha De Culminación:')!!}--}}{{--
                <input type='text' name="hasta" class="form-control" placeholder="Hasta"  id="datetimepicker64"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
    </div>
    </div>
    {!!Form::close()!!}--}}
    <div id="container" style="min-width: 800px; height: 600px; max-width: 1200px; margin: 0 auto"></div>

<script>
    $(function () {
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Solicitudes al Almacen por Oficinas de Nivel Superior'
            },
            tooltip: {
                pointFormat: '<b>{series.name}:</b>{point.percentage:.1f}%<br><b>Cantidad:</b>{point.y}'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: "Porcentaje",
                colorByPoint: true,
                data: [
                        <?php
                            foreach($oficina as $ofic)
                            {
                        ?>
                             ['<?php echo $ofic->oficina; ?>', <?php echo $ofic->cantidad ?>],
                        <?php
                            }
                        ?>
                ]
            }]
        });
    });
</script>
@endsection