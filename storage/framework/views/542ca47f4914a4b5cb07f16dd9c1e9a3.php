<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
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
    </div>
</div>


<!-- CSS -->
 <style>
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
        categories: [<?php $__currentLoopData = $rumahTersedia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        '<?php echo e($item->nama_proyek); ?>',
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>],
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
            data: [<?php $__currentLoopData = $rumahTersedia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($item->jumlah); ?>,
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
        }
    ]
});
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Pemula\projectAkhirPw\resources\views/dashboard/index.blade.php ENDPATH**/ ?>