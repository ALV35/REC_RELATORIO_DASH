<?= $this->extend('default') ?>
<?= $this->section('content') ?>
<section>
    <?php
    $input = array_column($this->data['todasEntradas'], "input");
    $output = array_column($this->data['outputAll'], "output");
    $cash_balance = round($this->data['balanco_caixa'], 2);
    ?>
    <div class="wrap">
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Data','Entrada', 'Saída', 'Total'],
          <?php
                    $values = $this->data['lista'];
                    foreach ($values as $value) {
                    ?>['<?php echo $value['date']; ?>', parseFloat(<?php echo $input[0]; ?>), parseFloat(<?php echo $output[0]; ?>), parseFloat(<?php echo $input[0] - $output[0]; ?>)],
                      ['<?php echo $value['date']; ?>', parseFloat(<?php echo $input[1]; ?>), parseFloat(<?php echo $output[1]; ?>), parseFloat(<?php echo $input[1] - $output[1]; ?>)],
                      ['<?php echo $value['date']; ?>', parseFloat(<?php echo $input[2]; ?>), parseFloat(<?php echo $output[2]; ?>), parseFloat(<?php echo $input[2] - $output[2]; ?>)],
                      ['<?php echo $value['date']; ?>', parseFloat(<?php echo $input[3]; ?>), parseFloat(<?php echo $output[3]; ?>), parseFloat(<?php echo $input[3] - $output[3]; ?>)],
                      ['<?php echo $value['date']; ?>', parseFloat(<?php echo $input[4]; ?>), parseFloat(<?php echo $output[4]; ?>), parseFloat(<?php echo $input[4] - $output[4]; ?>)],
                      ['<?php echo $value['date']; ?>', parseFloat(<?php echo $input[5]; ?>), parseFloat(<?php echo $output[5]; ?>), parseFloat(<?php echo $input[5] - $output[5]; ?>)],<?php } ?>
        ]);

        var options = {
          title : 'Movimentos',
          hAxis: {title: 'Data'},
          seriesType: 'bars',
          series: {5: {type: 'line'}},
          colors : ['#006400', '#ff0000', '#091c47', '#000', '#000'],
          isStacked: true,
          vAxis: {title: 'Entrada'}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    
    <div id="chart_div" style="width: 100vw; height: 500px;"></div>
    <h2 style='margin-left: 14vw'>Levantamento dos Registros: <?php echo $cash_balance; ?></h2>
  </body>
    </div>
</section>
<?= $this->endSection() ?>