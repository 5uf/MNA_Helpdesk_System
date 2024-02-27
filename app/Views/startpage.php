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
    <link href="start.css" rel="stylesheet" media="all">
    <link rel="icon" type="image/png" sizes="32x32" href="logo_stm.png">
  <title>Helpdesk ANM</title>
</head> 
<?= \Config\Services::validation()->listErrors() ?>
<?php
include "dbconn.php";  // Using database connection file here
date_default_timezone_set("Asia/Kuala_Lumpur");
$sql="select * from bahagian";
$sql2="select * from jawatan";
$sql3="select * from helpdesk_masalah";
$re = mysqli_query($dbconn, $sql);  // Use select query here 
$re2 = mysqli_query($dbconn, $sql2);
$re3 = mysqli_query($dbconn, $sql3);
$time=date(" d/m/Y - h:i A");
$timestamp=date('Y-m-d H:i:s');
$num=date("Ymd");
$num2 = $_SESSION['index']+1;
$index = str_pad($num2, 3, '0', STR_PAD_LEFT);
$no_ruj= "STM/LM".$num."".$index."";
?>
<body>   

    <div id="content">
      <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" id="collapse">  
        <div class="container-fluid">
        <div class="logo">
          <img src="./logo_stm.png"  style="width: 11em; height: 11em; margin-left: 40px;margin-top: 10px;" />
            </div>
            <img src="./bannerANM.png" style="height: 70px; " />
           <div class="text" >
           <h4 align="right"><?= $time ?></h4>
           <h6 align="right">Emel : stm@arkib.gov.my</h6> 
           <h6 align="right"> Tel : 03-62090711 / 745</h6>
           <h5 align="right"><a href="/login" style="color: steelblue;"><u>Log Masuk STM</u></a></h5>
            </div> 
      </div>
  </nav>
  <div class="row justify-content-md-center" >
       <div class="overview-item" style="background:white; width: 35em; border-radius: 10%">
        <div class="card-header" style="margin-top: 0%;"><h3 àlign="center">Laporan Helpdesk ANM</h3></div>&nbsp;
        <div class="overview__inner">
         <div class="overview-box">
             <form action="/start/create" method="post" enctype="multipart/form-data" class="form-horizontal" novalidate>
                                          <?= csrf_field() ?>
                                          <input type = "hidden" name="tarikh" value="<?php echo $timestamp?>">
                                          <input type = "hidden" name="no_rujukan" value="<?php echo $no_ruj?>">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nama:</label>
                                                </div>
                                                <div class="col-10 col-md-9">
                                                    <input type="text" id="text-input" name="nama" placeholder="Nama Anda" class="form-field" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Email:</label>
                                                </div>
                                                <div class="col-10 col-md-9">
                                                    <input type="text" id="text-input" name="email" placeholder="Email Anda" class="form-field" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectSm" class=" form-control-label">Bahagian/Unit:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="bahagian"  class="form-field" data-dropup-auto="false" id="placeholder" required>
                                                        <option selected >Pilih Bahagian/Unit Anda</option>
                                                        <?php
                                                             while($data = mysqli_fetch_assoc($re)){
                                                             echo "<option value='". $data['kod'] ."' >". $data['tanda'] ."" .$data['bmaksud'] ."</option>";  // displaying data in option menu
                                                               } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectSm" class=" form-control-label">Jawatan:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="jawatan"  class="form-field" data-dropup-auto="false" id="placeholder" required>
                                                        <option disabled selected hidden>Pilih Jawatan Anda</option>
                                                          <?php
                                                             while($data = mysqli_fetch_assoc($re2)){
                                                             echo "<option value='". $data['jawatan'] ."'>" .$data['jawatan'] ."</option>";  // displaying data in option menu  // displaying data in option menu
                                                               } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                  <div class="col col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Telefon:</label>
                                                    </div>
                                                </div>
                                                <div class="col col-md-5">
                                                    <div class="form-group">
                                                        <input name="tel_ext" type="text" class="form-control form-control-sm" placeholder="No. Telefon" required>
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;Bangunan:</label>
                                                    </div>
                                                </div>
                                                <div class="col col-md-4">
                                                   <select name="bangunan"  class="form-control form-control-sm" data-dropup-auto="false" id="placeholder" style="margin-left: 1em;">
                                                        <option value="" selected hidden disabled >Pilih Bangunan</option>
                                                        <option value="Wisma Warisan">Wisma Warisan</option>
                                                        <option value="Menara Ilmu">Menara Ilmu</option>
                                                       <option value="Bangunan PPPAV">Bangunan PPPAV</option>
                                                       <option value="Perkhidmatan Pusat Rekod">Perkhidmatan Pusat Rekod</option>
                                                       <option value="MTARP">MTARP</option>
                                                      <option value="MTAR">MTAR</option>
                                                     <option value="MTHO">MTHO</option>
                                                    <option value="GSP">GSP</option>
                                               <!-- <option value="Pustaka Perkhidmatan Awam">Pustaka Perkhidmatan Awam</option> -->
                                                    <option value="Pustaka Peringatan P.Ramlee">Pustaka Peringatan P.Ramlee</option> 
                                                  </select>
                                                </div>
                                              <div class="col col-md-2">
                                                    <label for="selectSm" class="form-control-label">Tingkat:</label>
                                                </div>
                                                <div class="col col-md-3">
                                                   <div class="form-group">
                                                        <input name="tingkat" type="text" class="form-control form-control-sm" placeholder="Tingkat">
                                                    </div>
                                                </div>
                                             </div>
                                            </div>
                                            <hr>
                                            <div class="row form-group">
                                                <div class="col col-md-5">
                                                    <label  class=" form-control-label">Maklumat Kerosakan:</label>
                                                </div>
                                                <div class="col-10 col-md-5">
                                                    <select name="masalah"  class="form-field" id="placeholder" required>
                                                    <option value="">Jenis Masalah</option>
                                                    <?php
                                                     while($data3 = mysqli_fetch_assoc($re3)){
                                                            echo "<option value='". $data3['kod'] ."'>". $data3['hmaksud'] ."</option>"; } ?>
                                                    </select>
                                                </div>
                                                <div class="col col-md-5">
                                                    <label  class=" form-control-label">Peralatan:</label>
                                                </div>
                                                <div class="col-10 col-md-5">
                                                    <select name="peralatan" id="placeholder" class="form-field">
                                                      <option value="00">--Sila Pilih--</option>
                                                     <option value="Komputer">Komputer</option>
                                                      <option value="Pencetak">Pencetak</option>
                                                     <option value="Lain-lain">Lain-lain</option>
                                                    </select>
                                                </div>
                                                <div class="col col-md-5">
                                                    <label  class=" form-control-label">Perisian:</label>
                                                </div>
                                                <div class="col-10 col-md-5">
                                                    <select name="perisian" id="placeholder" class="form-field">
                                                    <option value="">--Sila Pilih--</option>
                                                    <option value="Windows">Windows</option>
                                                   <option value="Internet">Internet</option>
                                                  <option value="Email Arkib">Email Arkib</option>
                                                 <option value="COMPASS">COMPASS</option>
                                                 <!-- <option value="Kod Sumber">COMPASS (Kod Sumber)</option>  -->
                                                  <option value="TRIM">TRIM</option>
                                                  <option value="ILMU">ILMU</option>
                                                 <!-- <option value="e-SPKB">e-SPKB</option> -->
                                                 <!-- <option value="HRMIS">HRMIS</option> -->
                                                  <option value="DDMS 2.0">DDMS 2.0</option>
                                                  <option value="Lain-lain">Lain-lain</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class="form-control-label">Keterangan Masalah:</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <textarea name="keterangan" rows="5" class="form-field" style="border-color: black; color: black;"></textarea>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                       <div class="row justify-content-md-center">
                                        <button type="submit" class="btn btn-primary">
                                            Hantar
                                        </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="reset" class="btn btn-primary">
                                           &nbsp;Reset&nbsp;
                                        </button>
                                       </div></form>
                                    </div>
                         </div>
                            

                      </div>

                 </div>
                 
              </div>
                
            </div>

       </div>
       <script type="text/javascript">
           $('#placeholder').selectpicker({
              dropupAuto: false
              });
       </script>
   </body>
 </html>