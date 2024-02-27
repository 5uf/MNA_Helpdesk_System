<?php
$total= ($total[0]->count + $total2[0]->count2 + $total3[0]->count3) ; // Manual counting to avoid an error
$total2 = $pie4[0]->count4 + $pie5[0]->count5 + $pie6[0]->count6 + $pie7[0]->count7 +$pie8[0]->count8 
        +$pie9[0]->count9 +$pie10[0]->count10 +$pie11[0]->count11 +$pie12[0]->count12 +$pie13[0]->count13;
$title = "Kerosakan Peralatan/Perisian - ".$month." ".$year." ";
?>
<?php if($total != 0): ?>
<div class="align-top">
<div class="row justify-content-md-center ">
 <div class="col-md-18">
  <div class="table-responsive m-b-10">
  <table class="table table-border">
   <tbody><tr>
    <td>
<select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
  <option disabled selected>Carta Tahunan</option>
        <?php
        $min = date('Y')-10;
        $max = date('Y');
        setlocale(LC_ALL,'ms');
        while($max+1 != $min){
            echo "<option value= /report/chart/".$max."/January>".$max."</option>";// displaying data in option menu
            $max--; } ?>
</select>
</td>
<td>
<select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
  <option disabled selected>Carta Bulanan</option>
        <?php
        $min = 1;
        if ($year === date('Y')) {
            $max = date('m');
        } else { $max = 12;}
        setlocale(LC_ALL,'ms');
        while($max+1 != $min){
            $max2 = strftime("%B", mktime(0, 0, 0, $max, 10));
            echo "<option value= /report/chart/".$year."/".$max2.">".$max2."</option>";// displaying data in option menu
            $max--; } ?>
</select>
</td>
</tr>
  </tbody>
  </table>
   </div>
  </div>
</div>  
</div>
<div id="piechart" style="width: 100%; height: 80%; overflow-y: hidden; "></div>

<script type="text/javascript" src="/js/gchart.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
                    ['Jenis', 'Bilangan'],
                    ['Peralatan - [Komputer]', <?=$pie4[0]->count4?>],
                    ['Peralatan - [Lain-lain]', <?=$pie6[0]->count6 ?>],
                    ['Peralatan - [Windows] ', <?=$pie7[0]->count7 ?>],
                    ['Peralatan - [Internet]', <?=$pie8[0]->count8 ?>],
                    ['Perisian - [Pencetak]', <?=$pie5[0]->count5  ?>],
                    ['Perisian - [Email Arkib]', <?=$pie9[0]->count9 ?>],
                    ['Perisian - [Compass]', <?=$pie10[0]->count10 ?>],
                    ['Perisian - [Kod Sumber]', <?=$pie11[0]->count11 ?>],
                    ['Perisian - [DDMS 2.0]', <?=$pie12[0]->count12 ?>],
                    ['Perisian - [Lain-lain]', <?=$pie13[0]->count13 ?>]
                ]);
        var options = {
          is3D: true,
          title: '<?= $title ?>',
          pieHole: 0.5,
          backgroundColor: { fill: "#D3D3D3" }
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
<?php else: ?>
<div class="align-top">
 <div class="row justify-content-md-center ">
  <div class="col-md-18">
    <div class="align-top">
<div class="row justify-content-md-center ">
 <div class="col-md-18">
  <div class="table-responsive m-b-10">
  <table class="table table-border">
   <tbody><tr>
    <td>
<select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
  <option disabled selected>Carta Tahunan</option>
        <?php
        $min = date('Y')-10;
        $max = date('Y');
        while($max+1 != $min){
            echo "<option value= /report/chart/".$max."/January>".$max."</option>";// displaying data in option menu
            $max--; } ?>
</select>
</td>
<td>
<select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
  <option disabled selected>Carta Bulanan</option>
        <?php
        $min = 1;
        if ($year === date('Y')) {
          $max = date('m');
        } else { $max = 12;}
        setlocale(LC_ALL,'ms');
        while($max+1 != $min){
            $max2 = strftime("%B", mktime(0, 0, 0, $max, 10));
            echo "<option value= /report/chart/".$year."/".$max2.">".$max2."</option>";// displaying data in option menu
            $max--; } ?>
</select>
</td>
</tr>
  </tbody>
  </table>
   </div>
 <br>
  <div class="alert alert-danger"><h3>Tiada Laporan Setakat Ini!</h3></div>
  </div>
 </div>
</div>
<?php endif ?>