@extends('app')
@section('content')
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