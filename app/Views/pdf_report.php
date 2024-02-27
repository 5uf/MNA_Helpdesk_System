<!DOCTYPE html>
<html lang="ms_MY">
<head>
    <meta charset="utf-8">
    <title>My PDF</title>
   <!-- <a href="/menu"><button>Return To Dashboard</button></a><br>
    <button onclick="PrintDiv()">Print</button>-->
</head>
<?php
setlocale(LC_ALL, 'ms');
?>
<body onload="PrintDiv()"><div id="divToPrint">
<style type="text/css">
  .signature {
    border: 0;
    border-bottom: 1px solid #000;
    width: 9em;
    }
   .sign {
    border: 0;
    border-bottom: 1px solid #000;
    }
</style>
<div class="container">
<h3 align="center">Senarai Laporan Helpdesk Bagi Bulan <?= $month ?> <?= $year ?></h3>
<div class="row">
<table align="center" border="1" width="80%" cellspacing="0" bordercolor="#000000">

  <tr bgcolor="white">
  <td align="center"><b>Bil.</b></td>
  <td align="center"><b>Nama</b></td>
  <td align="center"><b>Bahagian/Cawangan</b></td>
  <td align="center"><b>Masalah</b></td>
  <td align="center"><b>Status</b></td>
  <td align="center"><b>Tarikh Aduan</b></td>
  <td align="center"><b>Tarikh/Masa<br>Tindak Balas</b></td>
  <td align="center"><b>Tarikh Selesai</b></td>
  <td align="center"><b>Tempoh Masa<br>(Hari,Jam,Minit)</b></td>
  </tr>
<?php $i = 0; ?>
<?php if (! empty($report) && is_array($report)) : ?>
<?php foreach ($report as $item): ?>
<?php 
$i++;
$date = $item->tarikh;
$date2 = $item->responsetime2;
$timestamp = strtotime($date);
$timestamp2 = strtotime($date2);
$difference = ($timestamp2 - $timestamp) /60;
$d = floor ($difference / 1440);
$h = floor (($difference - $d * 1440) / 60);
$m = floor ($difference - ($d * 1440) - ($h * 60));  
?>
  <tr>
  <td valign="top"><?= $i ?></td>
  <td valign="top"><?= esc($item->nama) ?></td>
  <td align="center" valign="top"><?= esc($item->bmaksud) ?></td>
  <td align="center" valign="top"><?= trim($item->peralatan, "-")?> <?= trim($item->perisian,  "-") ?></td>
  <td align="center" valign="top">
 <?php if (! empty($item->smaksud)) : ?>
 <?= esc($item->smaksud) ?>
 <?php else : ?>
    tiada
 <?php endif ?>
  </td>
  <td align="center" valign="top"><?= esc($item->tarikh) ?></td>
  <td align="center" valign="top">
    <?php if (! empty($item->responsetime2)) : ?>
        <?= esc($item->responsetime2) ?>
    <?php else : ?>
        tiada
    <?php endif ?>
      </td>
      <td align="center" valign="top">
 <?php if (strtotime($item->tarikh_tindakan) != strtotime('0000-00-00 00:00:00')) : ?>
          <?= esc($item->tarikh_tindakan) ?>
       <?php else : ?>
         tiada
      <?php endif ?>
      
        </td>
          <td align="center" valign="top">
<?php if (! empty($item->responsetime2)) : ?>
        <?=$d?>h:<?=$h?>j:<?=$m?>m
<?php else : ?>
        tiada
<?php endif ?>
        </td></tr>
    <?php endforeach; ?>
</center></div></div>
</table>
    <?php else : ?>
    <h3>The Report Does Not Existed!</h3>
<?php endif ?>
<br>
<table align="center">
  <tr>
    <td>Disediakan oleh:</td>
    <td>Disemak oleh:</td><br>
  </tr>
  <tr>
    <td>Tandatangan:<input type="text" class="signature" /></td>
    <td>Tandatangan:<input type="text" class="signature" /></td><br>
  </tr>
  <tr>
    <td>Nama:<input type="text" class="sign" /></td>
    <td>Nama:<input type="text" class="sign" /></td><br>
  </tr>
  <tr>
    <td>Tarikh:<input type="text" class="sign" /></td>
    <td>Tarikh:<input type="text" class="sign" /></td><br>
  </tr>
</table></div>
</body>
</html>
'<script type="text/javascript">
  function PrintDiv() {    
  var divToPrint = document.getElementById('divToPrint');
  const w = window.open();
  w.document.open();
  w.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
  w.document.close();
}
</script>'

