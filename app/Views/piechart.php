<?php
$total= ($total[0]->count + $total2[0]->count2 + $total3[0]->count3) ;
$total2 = $pie4[0]->count4 + $pie5[0]->count5 + $pie6[0]->count6 + $pie7[0]->count7 +$pie8[0]->count8 +$pie9[0]->count9 +$pie10[0]->count10 +$pie11[0]->count11 +$pie12[0]->count12 +$pie13[0]->count13;
$dataPoints = array( 
	array("label"=>"Peralatan - [ Komputer ]", "y"=>($pie4[0]->count4 / $total) ),
	array("label"=>"Perisian - [ Pencetak ]", "y"=>$pie5[0]->count5 / $total),
	array("label"=>"Peralatan - [ Lain-lain ]", "y"=>$pie6[0]->count6 / $total),
	array("label"=>"Peralatan - [ Windows ]", "y"=>$pie7[0]->count7 / $total),
  array("label"=>"Peralatan - [ Internet ]", "y"=>$pie8[0]->count8 / $total),
	array("label"=>"Perisian - [ Email Arkib ]", "y"=>$pie9[0]->count9 / $total),
	array("label"=>"Perisian - [ Compass ]", "y"=>$pie10[0]->count10 / $total),
	array("label"=>"Perisian - [ Kod Sumber ]", "y"=>$pie11[0]->count11 / $total),
	array("label"=>"Perisian - [ DDMS 2.0 ]", "y"=>$pie12[0]->count12 / $total),
	array("label"=>"Perisian - [ Lain-lain ]", "y"=>$pie13[0]->count13 / $total) );

$title = "Kerosakan Peralatan/Perisian - ".$month." ".$year." ";
?>
<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<div class="row m-t-1">
 <div class="col-lg-5">
 <div class="au-card chart-percent-card">
  <div class="au-card-inner">
   <h5 class="title-2 tm-b-5">Carta Status Laporan</h5>
    <div class="row no-gutters">
     <div class="col-lg-12">
      <div class="percent-chart">
      <canvas id="Piechart"></canvas>
      </div>
      </div>
     </div>
    </div>
   </div>
  </div>
</div>
<script type="text/javascript">

  var ctx = document.getElementById("Piechart");
       if (ctx) {
      ctx.height = 250;
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          datasets: [
            {
              label: "Laporan Bulan Ini",
              data: [<?= $stats4[0]->x  ?>, 
                     <?= $stats5[0]->x ?>,
                     <?= $stats6[0]->x ?>,
                     <?= $stats7[0]->x ?>,
                     <?= $stats8[0]->x ?>,
                     <?= $stats9[0]->x ?>,
                     <?= $stats10[0]->x ?>,
                     <?= $stats11[0]->x ?>,
                     <?= $stats12[0]->x ?>,
                     <?= $stats13[0]->x ?> ],
              backgroundColor: [
                '#00b5e9',
                '#FF00FF',
                '#fa4251',
                '#ffc0cb',
                '#4b0082',
                '#d3d3d3',
                '#d2691e',
                '#daa520',
                '#8b4513',
                '#800080'
              ],
              borderWidth: [ 0, 0 ]
            }
          ],
          labels: 
         ['H - [Komputer] ',
          'H - [Lain-lain]',
          'H - [Windows]  ', 
          'H - [Internet] ', 
          'S - [Pencetak]', 
          'S - [Email Arkib]',
          'S - [Compass]', 
          'S - [Kod Sumber]', 
          'S - [DDMS 2.0]',
          'S - [Lain-lain]' ]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          cutoutPercentage: 0,
          animation: {
            animateScale: true,
            animateRotate: true
          },

          legend: {
            display: true,
            position: 'left'
          },
          tooltips: {
            titleFontFamily: "Poppins",
            xPadding: 15,
            yPadding: 10,
            caretPadding: 0,
            bodyFontSize: 10    
          }} }); }
    </script>
</script>
</body>
</html>