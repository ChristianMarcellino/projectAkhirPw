@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content')
<!-- HTML -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div class="row">
    <div class="col-6">
        <figure class="highcharts-figure">
            <div id="containerRumahTersedia"></div>
        </figure>
        <figure class="highcharts-figure">
            <div id="container"></div>
        </figure>
    </div>
</div>


<!-- CSS -->
 
 <style>
    .highcharts-figure,
.highcharts-data-table table {
    min-width: 320px;
    max-width: 660px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tbody tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

.highcharts-description {
    margin: 0.3rem 10px;
}

.highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tbody tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

.highcharts-description {
    margin: 0.3rem 10px;
}

 </style>

 <!-- js -->
  <script>

    Highcharts.chart('containerDetailCheking', {
        chart: {
            type: 'pie',
            custom: {},
            events: {
                render() {
                    const chart = this,
                        series = chart.series[0];
                    let customLabel = chart.options.chart.custom.label;

                    if (!customLabel) {
                        customLabel = chart.options.chart.custom.label =
                            chart.renderer.label(
                                'Total<br/>' +
                                '<strong>' + series.data.reduce((a, b) => a + b.y, 0) + '</strong>'
                            )
                                .css({
                                    color: '#000',
                                    textAnchor: 'middle'
                                })
                                .add();
                    }

                    const x = series.center[0] + chart.plotLeft,
                        y = series.center[1] + chart.plotTop -
                            (customLabel.attr('height') / 2);

                    customLabel.attr({ x, y });
                    customLabel.css({
                        fontSize: `${series.center[2] / 12}px`
                    });
                }
            }
        },
        title: { text: 'Detail Hasil Checking Konsumen' },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
        },
        legend: { enabled: false },
        plotOptions: {
            series: {
                innerSize: '75%',
                dataLabels: [{
                    enabled: true,
                    distance: 20,
                    format: '{point.name}'
                }, {
                    enabled: true,
                    distance: -15,
                    format: '{point.percentage:.0f}%',
                    style: { fontSize: '0.9em' }
                }]
            }
        },
        series: [{
            name: 'Konsumen',
            colorByPoint: true,
            data: chartData
        }]
    });
  </script>
  <script>
Highcharts.chart('containerRumahTersedia', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Rumah yang Tersedia per Proyek'
    },
    subtitle: {
        text:
            'Source: Laporan Bulanan'
    },
    xAxis: {
        categories: [@foreach ($rumahTersedia as $item)
        '{{ $item->nama_proyek }}',
        @endforeach],
        crosshair: true,
        accessibility: {
            description: 'Nama Proyek'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: ' Rumah'
        }
    },
    tooltip: {
        valueSuffix: ' Rumah'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Rumah',
            data: [@foreach ($rumahTersedia as $item)
            {{ $item->jumlah }},
            @endforeach]
        }
    ]
});
  </script>
@endsection