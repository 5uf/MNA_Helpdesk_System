<?php
include "dbconn.php";  // Using database connection file here
$sql="select id_staff,nama from staff where aturan != 0 and bahagian = 29 ";
$re = mysqli_query($dbconn, $sql);  // Use select query here 
?>
<div class="align-top">
<div class="container-fluid">
<div class="row justify-content-md-center">
    <div class="col-lg-8">
     <div class="card">
      <div class="card-header" align="center">Menu Tugasan Staf STM</div>
       <div class="card-body">
      <form action="staff/tasklist" method="post">
          <?= csrf_field() ?>
       <div class="form-group">
     <label class="control-label mb-1"><b>Cari Tugasan Untuk :</b>&nbsp;</label>
     <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
     <option disabled selected>Nama Staf</option>
             <?php
           while($data = mysqli_fetch_assoc($re)){
           echo "<option value='". base_url() ."/staff/tasklist/". $data['id_staff'] ." '>". $data['nama'] ."</option>";  // displaying data in option menu
                } ?></select>
      </div></form></div></div></div></div>
<?php if (! empty($report) && is_array($report)) : ?>
<?php $i = 1; ?>
<div class="row">
 <div class="col-md-12">
  <div class="table-responsive m-b-10">   
   <?php foreach ($report as $item): ?>
   <table class="table table-bordered table-striped table-sm table-data1" bgcolor="white"  width="100%"> 
      <tr bgcolor="antiquewhite">
        <td align="center" colspan="4" bgcolor="dimgray"><font face="arial" size="2" color="white"><b>Maklumat Tugas Staf</b></font></td>
        </tr><tr bgcolor="#ccccff">
          <td rowspan="10" width="5%">&nbsp;&nbsp;&nbsp;<?= $i ?></td>
          <td width="12%"><font face="arial" size="2"><b>Nama</b></font></td>
          <td><font face="arial" size="2"></font><?= esc($item['nama'])?></td></tr>
          
           <tr bgcolor="#ccccff">
          <td><font face="arial" size="2"><b>Tugas</b></font></td>
          <td><font face="arial" size="2"><?= esc($item['tugas'])?></font></td>
          <tr></tr>
          <td><font face="arial" size="2"><b>Tempat </b></font></td>
          <td><font face="arial" size="2"<?= esc($item['tempat'])?></font></td>
          </tr>
                <tr bgcolor="#ccccff">
          <td><font face="arial" size="2"><b>Tarikh Mula:</b></font></td>
          <td><font face="arial" size="2"><?= esc($item['hari1'])?>/<?= esc($item['bulan1'])?>/<?= esc($item['tahun1'])?></font></td>
          </tr><tr>
          <td><font face="arial" size="2"><b>Sehingga: </b></font></td>
          <td><font face="arial" size="2"><?= esc($item['hari2'])?>/<?= esc($item['bulan2'])?>/<?= esc($item['tahun2'])?></font></td>
          </tr>

          <tr bgcolor="#ccccff">
          <td><font face="arial" size="2"><b>Kuantiti</b></font></td>
          <td><font face="arial" size="2"><?= esc($item['kuantiti'])?></font></td>
          </tr><tr>
          <td><font face="arial" size="2"><b>Catatan</b></font></td>
          <td><font face="arial" size="2"><?= esc($item['catatan'])?></font></td>
          </tr>

          
          <tr bgcolor="#ccccff">
           <td ><font face="arial" size="2"><b>Status</b></font></td>
          <?php if ($item['tugas_status'] == 1): ?>
          <td><b><font face="arial" color="red">&nbsp; Belum Selesai</b>&nbsp;</td>
          <?php else :?>
          <td><b><font face="arial" color="green">&nbsp; Telah Selesai</b>&nbsp;</td>
          <?php endif?>
         </tr>
         <?php if ($item['tugas_status'] == 1 && ($_SESSION['admin'] == "Y" || $_SESSION['nama'] == $item['nama'])): ?>
           <tr>
           <td colspan="2" align="center">
            <form action="<?= base_url() ?>/staff/updatetask/<?= $_SESSION['id']?>" method="post">
              <?= csrf_field() ?>
              <input class="au-btn au-btn--blue" type="submit" name="update" value="Selesai">
              <input type="hidden" name="uid" value="<?= esc($item['bil']) ?>"></form></td>
          </td>
          </tr>
          <?php endif?>
      <?php $i++; ?></table><br>
      <?php endforeach; ?>
  '   </div></div></div>
      <?php else : ?>
      </table>
       <div class="alert alert-success" style="text-align: center;">
         <strong>Masukkan Nama Staf</strong>
        </div></div></div></div>
<?php endif ?>  
     </div>
</div>
    


