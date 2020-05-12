<link rel="stylesheet" href="css/main.css">
<div class="ctexto"> 
    <div class="menuchart">
      <div>
      <p class="h6 ctexto1">FILTRAR POR</p><br>
      
        <div class="spacemenu">
          <a href="?pagina=gsetor" class="btn btn-secondary"> SETOR</a>
          <a href="?pagina=gresponsavel" class="btn btn-secondary"> RESPONSÁVEL</a>
          <a href="?pagina=gprioridade" class="btn btn-secondary"> PRIORIDADE</a>
        </div>
      </div>
    </div><br>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],

        <?php

        while($linha = mysqli_fetch_array($consulta_gprioridade)){
        $setor = $linha['Prioridade'];
        $qtd = $linha['Qtd'];

        ?>

        
          ['<?php echo $setor ?>',  <?php echo $qtd ?>],

          <?php } ?>

        ]);

      

        var options = {
          title: 'Chamados por PRIORIDADE'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


<div id="piechart" style="width: 370px; height: 500px;"></div>

</div>
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='60'>";
?>