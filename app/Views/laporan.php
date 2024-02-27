<?php
include "dbconn.php";  // Using database connection file here
date_default_timezone_set("Asia/Kuala_Lumpur");
$sql="select * from helpdesk";
$sql2="select * from bahagian";
$re = mysqli_query($dbconn, $sql);
$re2 = mysqli_query($dbconn, $sql2);
?>
<div class="page-wrapper">
<div class="container-fluid">
<div class="align-top">
<div class="row justify-content-md-center ">
 <div class="col-md-18">
  <div class="table-responsive m-b-10">
  <table class="table table-border">
   <tbody><tr><td>
<select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
  <option disabled selected>Senarai Laporan</option>
  <?php
        $max = date('Y');
        $min = date('Y') - 5;
        while($max+1 != $min){
            echo "<option value= /report/annual/".$max.">".$max."</option>";// displaying data in option menu
            $max--; }
?></select>
</td>
 <td>
<select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
  <option disabled selected>Statistik</option>
  <?php
        $max = date('Y');
        $min = date('Y') - 5;
        while($max+1 != $min){
            echo "<option value= /report/stats/".$max.">".$max."</option>";// displaying data in option menu
            $max--; }
?></select>
</td>
<td>
<select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
  <option disabled selected>Laporan ISO</option>
  <?php
        $max = date('Y');
        $min = date('Y') - 5;
        while($max+1 != $min){
            echo "<option value= /report/isoreport/".$max.">".$max."</option>";// displaying data in option menu
            $max--; }
?></select>
</td>
</tr>
  </tbody>
  </table>
   </div>
  </div>
</div>  
</div>
  <!---   <div class="row">
    
     <div class="col-md-2">
    <form action="/report/lapdir" method="post" id="form4">
 <select onchange="laporan()" name="bulan" value="bulan" >
          <option value="" disable selected>Carta Tahun - Bulan:</option>
          <option value="01">Januari</option>
          <option value="02">Februari</option>
          <option value="03">Mac</option>
          <option value="04">April</option>
          <option value="05">Mei</option>
          <option value="06">Jun</option>
          <option value="07">Julai</option>
          <option value="08">Ogos</option>
          <option value="09">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Disember</option>
</select></form></div>-->
</div> <div class="align-top">
                        <div class="row m-t-20 justify-content-md-center">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                              <h2><?=$new[0]->x ?></h2> 
                                              <span>Baru</span>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">  
                                            <div class="text">
                                                <h2 ><?=$progress[0]->x ?></h2>
                                                <span>Dalam Tindakan</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                <h2 ><?=$completed[0]->x ?></h2>
                                                <span>Telah Siap</span>  
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center m-t-1">
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
                           <div class="col-lg-5">
                                <div class="au-card chart-percent-card">
                                    <div class="au-card-inner">
                                        <h5 class="title-2 tm-b-5">Carta Jenis Laporan</h5>
                                        <div class="row no-gutters">
                                            <div class="col-lg-12">
                                                <div class="percent-chart">
                                                    <canvas id="Piechart2"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                           </div>
                        </div>  
<?php if (! empty($report) && is_array($report)) : ?>
<div class="row m-t-30">
 <div class="col-md-12">
  <div class="table-responsive table-bordered m-b-10">
  <table class="table table-border table-striped table-sm table-data1">
   <thead>
   <tr bgcolor="lightgray">
  <th>Nama</th>
  <th>Bahagian/Cawangan</th>
  <th>Masalah</th>
  <th>Status</th>
  <th>Tarikh Aduan</th>
  <th>Tarikh Respons</th>
  <th>Tarikh Selesai</th>
  <th>Tempoh Masa<br>(Hari,Jam,Minit)</th>
  <th>Kemas kini</th>
  </tr>
  </thead>
  <tbody>
<?php foreach ($report as $item): ?>
<?php 
$date = $item['tarikh'];
$date2 = $item['responsetime2'];
$date3 = $item['tarikh_tindakan'];
$timestamp =  strtotime($date);
$timestamp2 = strtotime($date2);
$timestamp3 = strtotime($date3);
$difference = ($timestamp2 - $timestamp) /60;
$d = floor ($difference / 1440);
$h = floor (($difference - $d * 1440) / 60);
$m = floor ($difference - ($d * 1440) - ($h * 60));  
?>
 <tr>
      <td align="left"><?= esc($item['nama']) ?></td>
      <td ><?= esc($item['bmaksud']) ?></td>
      <td><?= trim($item['peralatan'], "-")?> <?= trim($item['perisian'],  "-") ?></td>
      <td>
        <?php if (! empty($item['smaksud'])) : ?>
        <?= esc($item['smaksud']) ?>
        <?php else : ?>
           tiada
        <?php endif ?>
      </td>
      <td><?= date( "d-m-Y H:i:s", strtotime($item['tarikh'])) ?> </td>
      <td>
    <?php if (! empty($item['responsetime2'])) : ?>
    <?= date( "d-m-Y H:i", strtotime($item['responsetime2'])) ?>
    <?php else : ?>
                   tiada
    <?php endif ?>
      </td>
      <td>
    <?php if (strtotime($item['tarikh_tindakan']) != strtotime('0000-00-00 00:00:00')) : ?>
          <?= date( "d-m-Y H:i", strtotime($item['tarikh_tindakan'])) ?>
    <?php else : ?>
         tiada
    <?php endif ?>
    </td>
    <td>
<?php if (! empty($item['responsetime2'])) : ?>
        <?=$d?>h:<?=$h?>j:<?=$m?>m
<?php else : ?>
        tiada
<?php endif ?>
</td><td >
<div class="table-data-feature">
<button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
<a href="/report/viewreport/<?= esc($item['no_rujukan'])?>" ><i class="zmdi zmdi-edit"></i></a>
</button>
</div></td></tr>
<?php endforeach; ?>
</tbody>
     </table>
     </div>
   </div>
 </div>
    <?php else : ?>
    <h3 align="center">Tiada kerosakan teknikal setakat ini</h3><br><br>
<?php endif ?>
                    
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
      </div>
    </div>
 </div>
</body>
    <script src="/vendor/chartjs/Chart.bundle.min.js"></script>
    <!-- Main JS-->
    <script src="/js/main.js"></script>
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
              data: [<?= $new[0]->x  ?>, 
                     <?= $progress[0]->x ?>,
                     <?= $completed[0]->x ?> 
             ],
              backgroundColor: [
                '#00fa9a',
                '#462dc3',
                'red'
              ],
         
              borderWidth: [
                0, 0
              ]
            }
          ],
          labels: [
            'Laporan Baru',
            'Dalam Tindakan',
            'Telah Diselesaikan'
          ]
        },
        options: {
          maintainAspectRatio: true,
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
          }}}); }

    var ctx = document.getElementById("Piechart2");
       if (ctx) {
      ctx.height = 250;
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          datasets: [
            {
              label: "Laporan Bulan Ini",
              data: [<?= $stats4[0]->x ?>,
                     <?= $stats5[0]->x ?>, 
                     <?= $stats6[0]->x ?>,
                     <?= $stats7[0]->x ?>,
                     <?= $stats8[0]->x ?>,
                     <?= $stats9[0]->x ?>,
                     <?= $stats10[0]->x ?>,
                     <?= $stats11[0]->x ?>,
                     <?= $stats12[0]->x ?>,
                     <?= $stats13[0]->x ?>,
                     <?= $total[0]->x ?> ],
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
                '#000000',
                '#adff05'
              ],
              borderWidth: [ 0, 0 ]
            }
          ],
          labels: 
         ['H - [Komputer] ',
          'H - [Pencetak] ',
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
          maintainAspectRatio: true,
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

<!-- end document-->
