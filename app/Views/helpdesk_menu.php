<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Muhammad Sufi Afifi">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link href="styll.css" rel="stylesheet" media="all">
    <link rel="icon" type="image/png" sizes="32x32" href="/logo_stm.png">
  <title>Helpdesk - ANM</title>
</head>
<?php
include "dbconn.php";  // Using database connection file here
date_default_timezone_set("Asia/Kuala_Lumpur");
setlocale(LC_ALL,'ms');
$time=strftime("%A, %e %B %Y");   
?>
<body class="animsition">
        <div class="wrapper">
        <!-- MENU SIDEBAR-->
        <nav id="sidebar">
          <aside class="menu-sidebar" id="menu-sidebar">
            <div class="logo">
            <img src="/logo_stm.png" style="width: 10em; height: 10em; margin-left: 40px;margin-top: 10px;" alt="Sistem Helpdesk">&nbsp;&nbsp;&nbsp;          
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <div class="card" style="background: royalblue; height: 8em;">
                            <div class="card-body" style="margin-top: 10%;margin-left: 2%; ">
                                <li><h5 style="color: white;">Selamat Datang,<br> <?= $_SESSION['nama']?>!</h5></li><br>
                               
                            </div>
                        </div>
                        <li>
                            <a href="/report"><i class="fas fa-chart-bar"></i>Helpdesk</a>
                        </li>
                        <li>
                            <a href="/iplist"><i class="fas fa-table"></i>Senarai IP</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>/report/laporan"><i class="far fa-check-square"></i>Laporan</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tasks"></i>Tugasan</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                    <a href="<?= base_url() ?>/staff/task/list"><i class="fas fa-list"></i>Tugasan Staf   </a>
                                </li>
                               <li>
                                    <a href="<?= base_url() ?>/staff/task/1"><i class="fas fa-circle-notch"></i>Belum Selesai</a>
                                </li>
                                <li>
                                   <a href="<?= base_url() ?>/staff/task/2/" ><i class="fas fa-check-circle"></i>Telah Selesai</a>
                                </li>
                                 <li>
                                    <a  href="<?= base_url() ?>/staff/task/new" ><i class="fas fa-plus-square"></i>Tambah Baru</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>/staff/profile/<?= $_SESSION['id']?>"><i class="fas fa-user"></i>Profil</a>
                        </li>
                         <?php if ($_SESSION['admin'] == "Y") : ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-lock"></i>Admin</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?= base_url() ?>/staff/users"><i class="fas fa-users"></i></i>Senarai Staf</a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>/staff/create"><i class="fas fa-user-plus"></i>Daftar Staf</a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>/staff/reset"><i class="fas fa-key"></i>Tukar Katalaluan</a>
                                </li>

                            </ul>
                        </li>
                        <?php endif ?>
                         <li>
                            <a href="/logout"><i class="fas fa-sign-out-alt"></i>Log Keluar</a>
                        </li>
                    </ul>
                </nav>
            </div> 
          </aside>
        </nav>

        <!-- Page Content  -->
        <div id="content" style="overflow-x: hidden;">
            <nav class="navbar navbar-expand-xl sticky-top navbar-light bg-light" style="border: thin black; border-radius: 5px;">
                <div class="container-fluid" style="height: 3.8em;">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                <h3 align="center">Menu Utama</h3><h5><?= $time ?></h5> 
                </div>
            </nav>
             <!-- MAIN CONTENT-->
               <div class="align-top">
                        <div class="row m-t-20 justify-content-md-center">
                           <div class="col-sm-4 col-lg-3" id="new">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                              <h2><a href="report/listreport/<?= date('Y')?>/<?= date('m')?>/N" style="color: white;"><?=$new[0]->x ?></a></h2> 
                                              <span>Baru</span>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-3" id="progress">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">  
                                            <div class="text">
                                                <h2 ><a href="report/listreport/<?= date('Y')?>/<?= date('m')?>/D" style="color: white;"><?=$progress[0]->x ?></a></h2>
                                                <span>Dalam Tindakan</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-3" id="completed">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                <h2><a href="report/listreport/<?= date('Y')?>/<?= date('m')?>/Y" style="color: white;"><?=$completed[0]->x ?></a></h2>
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
<button class="item" data-toggle="tooltip" data-placement="top" title="Update Status">
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
   <h3 align="center">Tiada laporan kerosakan teknikal setakat ini</h3><br><br> 
<?php endif ?>
                    
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
      </div>
    </div>
 </div>
</body>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>  
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script type="text/javascript">

    $('#new').click(function() { 
     $(location).attr('href','report/listreport/<?= date('Y')?>/<?= date('m')?>/N');
    });
    $('#progress').click(function() { 
     $(location).attr('href','report/listreport/<?= date('Y')?>/<?= date('m')?>/D');
    });
    $('#complete').click(function() { 
     $(location).attr('href','report/listreport/<?= date('Y')?>/<?= date('m')?>/Y');
    });
    $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $('#menu-sidebar').toggleClass('active');
            });
        });
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
          'H - [Pencetak] ',
          'H - [Lain-lain]',
          'H - [Windows]  ', 
          'H - [Internet] ', 
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
  </head>
</body>
</html>
<!-- end document-->
