@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content')
<!-- HTML -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div class="row">
    <div class="col-md-6 col-sm-12">
        <figure class="highcharts-figure">
            <div id="containerRumahTersedia"></div>
        </figure>
    </div>
    <div class="col-md-6 col-sm-12">
        <figure class="highcharts-figure">
            <div id="containerDetailChecking"></div>
        </figure>
    </div>
    <div class="col-md-6 col-sm-12">
        <figure class="highcharts-figure">
            <div id="konsumenKeBank"></div>
        </figure>
    </div>
     <div class="col-md-6 col-sm-12">
        <figure class="highcharts-figure">
            <div id="containerStatusKonsumen"></div>
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
    const categories = @json(array_map(fn($item) => $item->hasil_checking, $detailChecking));
    const dataJumlah = @json(array_map(fn($item) => (int) $item->jumlah_konsumen, $detailChecking));

   Highcharts.chart('containerDetailChecking', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Konsumen Berdasarkan Hasil Checking'
        },
        subtitle: {
            text: 'Source: Laporan Bulanan'
        },
        xAxis: {
            categories: categories,
            crosshair: true,
            title: {
                text: 'Hasil Checking'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Konsumen (Rumah)'
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
        series: [{
            name: 'Jumlah Konsumen',
            data: dataJumlah
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

    <script>
Highcharts.chart('konsumenKeBank', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Konsumen yang datang ke Bank'
    },
    subtitle: {
        text:
            'Source: Laporan Perusahaan'
    },
    xAxis: {
        categories: [@foreach ($konsumenKeBank as $item)
        '{{ $item->nama_bank }}',
        @endforeach],
        crosshair: true,
        accessibility: {
            description: 'Nama Bank'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: ' Jumlah Konsumen'
        }
    },
    tooltip: {
        valueSuffix: ' Konsumen'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Jumlah Konsumen ',
            data: [@foreach ($konsumenKeBank as $item)
            {{ $item->jumlah }},
            @endforeach]
        }
    ]
});
</script>




  <script>
Highcharts.chart('containerStatusKonsumen', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Konsumen Berdasarkan Status Konsumen'
    },
    subtitle: {
        text:
            'Source: Laporan Bulanan'
    },
    xAxis: {
        categories: [@foreach ($statusKonsumen as $item)
        '{{ $item->status_pernikahan}}',
        @endforeach],
        crosshair: true,
        accessibility: {
            description: 'Status Pernikahan'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: ' Jumlah Konsumen'
        }
    },
    tooltip: {
        valueSuffix: ' Konsumen'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Jumlah Konsumen ',
            data: [@foreach ($statusKonsumen as $item)
            {{ $item->jumlah_konsumen }},
            @endforeach]
        }
    ]
});
</script>


@endsection
