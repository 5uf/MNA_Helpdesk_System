<div class="align-top">
<div class="container-fluid">
<div class="row justify-content-md-right m-t-30">
<div class="col-md-12">
<nav class="navbar navbar-expand-sm sticky-top navbar-light bg-light">
<div class="container-fluid">
<div class="align-right"> 
<button class="btn btn-primary"><a href="/staff/task/new" style="color: white;">Tambah</a></button>
<button class="btn btn-primary"><a href="/staff/task/1" style="color: white;">Belum Selesai</a></button>
</div></div></nav>
</div></div>
<div class="row">
 <div class="col-md-12">
  <div class="table-responsive table-bordered m-b-10">
  <div id="message"></div>
  <table class="table table-border table-striped table-sm table-data1" bgcolor="white" width="100%" id="placeholder">
      <?php if (! empty($report) && is_array($report)) : ?>
      <?php $i = 1; ?>
       <?php foreach ($report as $item): ?>
        
        <tr bgcolor="antiquewhite">
        <td align="center" colspan="2" bgcolor="lightgray"><font face="arial" size="2"><b>Tugas No.<?= $i ?></b></font></td>
        </tr><tr bgcolor="#ccccff">
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
          <?php if ($item['tugas_status'] === 1): ?>
          <td><b><font face="arial" color="red">&nbsp; Belum Selesai</b>&nbsp;</td>
          <?php else :?>
          <td><b><font face="arial" color="green">&nbsp; Telah Selesai</b>&nbsp;</td>
          <?php endif?>
         </tr>

      <?php $i++; ?>
      <?php endforeach; ?>
    <?php else : ?>
      <br>
       <div class="alert alert-danger" style="text-align: center;">
         <strong>You do not have any Task</strong>
        </div>
<?php endif ?>
   </div>  
</div>