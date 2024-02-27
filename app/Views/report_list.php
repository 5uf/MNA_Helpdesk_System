<?php 
date_default_timezone_set("Asia/Kuala_Lumpur");
$timestamp=date('Y-m-d H:i:s'); ?>
<?php if (! empty($report) && is_array($report)) : ?>
  <?php $i = 1; ?>
   <?php foreach ($report as $item): ?>
<div class="row justify-content-md-center m-t-30">
 <div class="col-md-8">
  <div class="table-responsive table-bordered m-b-10" style="background: white; border-color: black;">
        <table class="table table-bordered table-sm table-data1">
        <tbody><tr bgcolor="lightblue">
        <td align="center"><b>No </b></td>
        <td align="center" colspan="2"><b>Maklumat Pelapor</b></td>
        <td align="center" colspan="3" width="50%">
            <b>Kerosakan / Masalah</b>
        </td>
        </tr><tr >
          <td align="center" valign="top" rowspan="7"><?= $i ?></td>
          <td width="12%"><b>Nama</b></td>
          <td><?= esc($item['nama'])?></td>
          <td width="15%"><b>No Rujukan</b></td>
          <td><a href="/report/viewreport/<?= esc($item['no_rujukan'])?>">
           <font face="arial" color="blue"><b><?= esc($item['no_rujukan'])?></b></a></td></tr>

                <tr >
          <td><b>Jawatan</b>            </td>
          <td><?= esc($item['jawatan'])?></td>
          <td><b>Maklumat Kerosakan </b></td>
          <td><?= esc($item['hmaksud'])?></td>
          </tr>

          <tr >
          <td><b>Bahagian </b> </td>
          <td><?= esc($item['bmaksud'])?></td>
          <td><b>Peralatan </b></td>
          <td><font face="arial" size="2"><?= esc($item['peralatan'])?> </td>
          </tr>

          <tr >
          <td><b>No Tel</b>   </td>
          <td><?= esc($item['tel_ext'])?></td>
          <td><b>Perisian</b></td>
          <td><?= esc($item['perisian'])?></td>
          </tr>

          <tr >
          <td ><b>Tarikh Laporan </b></td>
          <td ><?= esc($item['tarikh'])?></td>
          <td><b>Tindakan </b></td>
          <td><?= esc($item['tmaksud'])?></td>
          </tr>
          <tr>
          <td>&nbsp;<b> Status </b></td>
          <?php if (empty($item['smaksud'])): ?>
          <td><b><font face="arial" color="red">Tiada</b></td>
          <?php elseif($item['smaksud'] === "Selesai"): ?>
          <td><b><font color="green">Selesai >>> <?= esc($item['tarikh_tindakan'])?></b></td>
          <?php else :?>
          <td><b><font color="#f5c71a"><?= $item['smaksud']?> >>> <?= esc($item['responsetime2'])?></b></td>
          <?php endif?>


          <?php if (empty($item['smaksud'])): ?>
         <td colspan="2" rowspan="2">
          <form action="/report/updatereport/<?= $item['no_rujukan']?>" method="post"> 
            <?= csrf_field() ?>
          <button style="margin-top: 10%; margin-left: 15%;" class="au-btn au-btn--blue" type="submit">Klik Untuk Respons</button>
          <input type="hidden" name="status" value="D">
          <input type="hidden" name="timestamp" value="<?php echo $timestamp?>">
          </form></div></td>
          </tr><tr>
          <td><b>Diselesaikan Oleh</b></td>
          <td><?= esc($item['pegawai_btm']) ?></td>
          <?php elseif($item['status'] === "D" || $item['status'] === "M" || $item['status'] === "R" || $item['status'] === "H" || $item['status'] === "L"): ?>
          <td colspan="2" rowspan="2">
             <form action="/report/updatereport/<?= $item['no_rujukan']?>" method="post"> 
            <?= csrf_field() ?>
          <button style="margin-top: 10%; margin-left: 27%;" class="au-btn au-btn--green" type="submit">Klik Untuk Selesai</button>
          <input type="hidden" name="status" value="Y">
          <input type="hidden" name="timestamp" value="<?php echo $timestamp?>"></form></td>
          </tr><tr>
          <td><b>Diselesaikan Oleh</b></td>
          <td><?= esc($item['pegawai_btm']) ?></td>
          <?php else :?>
          <td><b>Diselesaikan Oleh</b></td>
          <td><?= esc($item['pegawai_btm']) ?></td>
          <?php endif?>
      </tr></tbody></table></div></div></div><br>
      <?php $i++; ?>
      <?php endforeach; ?>
    <?php else : ?>
    <tr><td style="background: dimgrey;"><div class="alert alert-dark" style="text-align: center; ">
         <strong>All Good!</strong> There Are No Report So Far...
        </div></td></tr></tbody></table>
<?php endif ?>


<style type="text/css">
  table { 
    border: 1px solid #ddd;
    border-collapse: separate;
    border-left: 0;
    border-radius: 4px;
    border-spacing: 0px;
}
thead {
    display: table-header-group;
    vertical-align: middle;
    border-color: inherit;
    border-collapse: separate;
}
tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}
th, td {
    padding: 5px 4px 6px 4px; 
    text-align: left;
    vertical-align: top;
    border-left: 1px solid #ddd;    
}
td {
    border-top: 1px solid #ddd;    
}
thead:first-child tr:first-child th:first-child, tbody:first-child tr:first-child td:first-child {
    border-radius: 4px 0 0 0;
}
thead:last-child tr:last-child th:first-child, tbody:last-child tr:last-child td:first-child {
    border-radius: 0 0 0 4px;
}
</style>