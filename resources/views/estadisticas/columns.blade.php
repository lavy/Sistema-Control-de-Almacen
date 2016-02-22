@extends('app')
@section('content')

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script>
    $(function () {
        // Create the chart
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Browser market shares. January, 2015 to May, 2015'
            },
            subtitle: {
                text: 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total percent market share'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },

            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [
                    <?php
                        foreach($oficina as $ofic)
                        {
                    ?>
                    ['<?php echo $ofic->oficina; ?>', <?php echo $ofic->cantidad; ?>,'<?php echo $ofic->oficina; ?>'],
                    <?php
                        }
                    ?>]
            }],
            drilldown: {
                series: [{
                        <?php
                                foreach($departamentos as $dept)
                                {
                            ?>
                    name: '<?php echo $dept->oficina; ?>',
                    id: '<?php echo $dept->oficina; ?>',
                    data:
                            ['<?php echo $dept->departamento; ?>', <?php echo $dept->cantidad; ?>],

                    <?php
                           }
                       ?>
                }]
            }
        });
    });
</script>

@push('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
@endpush

@endsection