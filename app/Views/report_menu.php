<?php
include "dbconn.php";  // Using database connection file here
date_default_timezone_set("Asia/Kuala_Lumpur");
$time=date(" D, d-M-Y");
$sql="select * from helpdesk";
$sql2="select * from bahagian";
$re = mysqli_query($dbconn, $sql);
$re2 = mysqli_query($dbconn, $sql2); ?>
<?php include "templates/navbar.php"; ?>

<div id="over">
<div class="row justify-content-md-center">
     <div class="col-lg-8">
     <div class="card">
     <div class="card-header" align="center">
    <strong>Report Search</strong></div>
   <div class="card-body card-block">
    <form action="/report/search" method="post">
     <?= csrf_field() ?>
     <div class="row row-md-12 form-group">
      <div class="col col-md-12">
       <div class="input-group">
       <div class="input-group-addon">
          &nbsp;&nbsp;&nbsp;Nama&nbsp;&nbsp;&nbsp;&nbsp;
       </div>
        <input type="text" id="input1-group1" name="nama" class="form-control" placeholder="Nama Pelapor">
       </div>
      </div>
<div class="col col-md-6">
<div class="input-group">
    <div class="input-group">
    <div class="input-group-addon">Bahagian</div>
   <select name="kod_bahagian" class="form-control ">
   <option value="">Pilih Bahagian</option>
   <?php
    while($data = mysqli_fetch_assoc($re2)){
      echo "<option value='". $data['kod'] ."'>". $data['tanda'] ."" .$data['bmaksud'] ."</option>";  // displaying data in option menu
   } ?>
   </select> 
    </div>
</div>
</div>
<div class="col col-md-6">
<div class="input-group">
    <div class="input-group-addon">&nbsp;&nbsp;&nbsp;Tahun&nbsp;&nbsp;&nbsp;&nbsp;</div>
<select name="tahun" id="tahun" class="form-control">
          <option value="">Pilih Tahun</option>
        <?php   $max = date('Y');
                while($max+1 != 2007){
                echo "<option value=".$max.">".$max."</option>";// displaying data in option menu
                $max--; }?>
      </select>
</div>
</div>
<div class="col col-md-6">
<div class="input-group">
<div class="input-group-addon">&nbsp;&nbsp;&nbsp;Status&nbsp;&nbsp;&nbsp;&nbsp;</div>
 <select name="status" id="status" class="form-control">
 <option value="">Pilih Status</option>
 <option value="Y">Selesai</option>
 <option value="D">Belum Selesai</option>
  </select>
</div>
</div>
 <div class="col col-md-6">
<div class="input-group">
    <div class="input-group-addon">&nbsp;&nbsp;&nbsp;Bulan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
<select name="bulan" id="bulan" class="form-control">
          <option value="">Pilih Bulan</option>
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
      </select>
</div>
</div>
</div>
<div class="card-footer" align="center">
<input class="btn btn-info" type="submit" name="submit" value="Search" formnovalidate>
<input class="btn btn-info" type="reset" value="Reset">
<input class="btn btn-info" type="button" value="Print" onclick="PrintDiv()"></div>
</form>
      </div>
    </div>
   </div>
  </div>

<?php if (! empty($report) && is_array($report)) : ?>  

<div class="row m-t-30" >

 <div class="col-md-12"><h4 align="center"><font face="times new roman">Jumlah Laporan: <?= count($report)?></font></h4>
  <div id="divToPrint">
  <div class="table-responsive m-b-10">
  <table class="table table-bordered table-striped table-sm table-data1">
   <thead>
   <tr bgcolor="lightblue"">
  <th>No.</th>
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
<?php $i = 1; ?>
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
    <td align="left"><?= $i ?></td>
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
</td><td><div class="table-data-feature">
<button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
<a href="/report/viewreport/<?= esc($item['no_rujukan'])?>" ><i class="zmdi zmdi-edit"></i></a>
</button></div>
</td></tr>
<?php $i++; ?>
<?php endforeach; ?>
    </tbody>
     </table>
    <?php else : ?>
        <div class="alert alert-danger" style="text-align: center;">
         <strong>Not Found!</strong> The Report Does Not Exist!
        </div>
<?php endif ?>
          </div>
       </div>
     </div>
   </div>
</div>
<?php include "templates/footer.php";?>

            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
