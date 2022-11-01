<div id="chart"></div>


<!-- online -->
<!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->

<!-- offline -->
<script src="<?=base_url('asset/js/jquery-3.6.1.min.js')?>"></script>
<script src="<?=base_url('asset/js/apexcharts.js')?>"></script>

<script>
   var options = {
        //  
        series: [{
            name: "Jumlah buku",
            data:  [<?php foreach ($list as $row):?><?= $row['stok']?>,<?php endforeach ?>],
        }],
          chart: {
          height: 350,
          type: 'area',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'jumlah stok buku yang tersedia',
          align: 'left'
        },
        yaxis: {
          title: {
            text: 'Temperature'
          },
          min: 0,
          max: 35
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: [<?php foreach ($list as $row):?>"<?= $row['judul']?>",<?php endforeach ?>],
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
</script>