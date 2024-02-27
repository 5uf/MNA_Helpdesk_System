<div class="align-top">
<div class="container-fluid">
<div class="row justify-content-md-right m-t-30">
<div class="col-md-12 ">
<nav class="navbar navbar-expand-sm sticky-top navbar-light bg-light">
<div class="container-fluid">
<div class="align-right"> 
<button class="btn btn-primary"><a href="/staff/task/new" style="color: white;">Tambah</a></button>
<button class="btn btn-primary"><a href="/staff/task/2" style="color: white;">Selesai</a></button>
</div></div></nav>
</div></div>
<div class="row">
 <div class="col-md-12">
  <div class="table-responsive table-bordered m-b-10">
     <div id="message"></div>
  <table class="table table-bordered table-striped table-sm table-data1"
               bgcolor="white" width="100%">
      <?php if (! empty($report) && is_array($report)) : ?>
       <?php $i = 1; ?>
       <?php foreach ($report as $item): ?>
      
        <tr bgcolor="antiquewhite">
        <td align="center" colspan="4" bgcolor="dimgray"><font face="arial" size="2" color="white"><b>Maklumat Tugas Anda</b></font></td>
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
         <tr>
           <td colspan="2" align="center">
            <form action="<?= base_url() ?>/staff/updatetask/<?= $_SESSION['id']?>" method="post">
              <?= csrf_field() ?>
              <input class="au-btn au-btn--blue" type="submit" name="update" value="Selesai">
              <input type="hidden" name="uid" value="<?= esc($item['bil']) ?>"></form>
          </td>
         </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
    <?php else : ?>
      <br>
       <div class="alert alert-danger" style="text-align: center;">
         <strong>No Task Assigned</strong>
        </div>
<?php endif ?>
   </div>  
</div>
