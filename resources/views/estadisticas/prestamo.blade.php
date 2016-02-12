@extends('app')
@section('content')

    <div id="container" style="min-width: 800px; height: 600px; max-width: 1200px; margin-top:20px"></div>

    <script type="text/javascript">
        $(function () {
            $('#container').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Solicitudes de Prestamos por Oficinas de Nivel Superior Al <?php echo date('d-m-Y'); ?>'
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
                            foreach($prestamos as $prest)
                            {
                        ?>
                        ['<?php echo $prest->oficina; ?>', <?php echo $prest->cantidad_prestamos ?>],
                        <?php
                            }
                        ?>
                    ]
                }]
            });
        });
    </script>
    @push('scripts')
    <script src="{{asset('highcharts/highcharts.js')}}"></script>
    <script src="{{asset('highcharts/exporting.js')}}"></script>
    @endpush
@endsection