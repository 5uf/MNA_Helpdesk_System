<?php if ($stats[0]->x != "0" || $stats2[0]->x || "0" && $stats3[0]->x || "0"): ?>
<br>
<div class="row justify-content-md-center m-t-20">
 <div class="col-md-8">
  <div class="table-responsive table-bordered m-b-10">
  <table class="table table-bordered table-sm table-data1" style="background: white;">
 <?php $link = "/report/chart/".$year."/".$month.""; ?>
<tr><td colspan="2" align="center" bgcolor="lightblue">
<a href="<?= $link?>" style="color: black;"><b> Statistik Laporan Helpdesk <?= $month?> <?= $year?></a></b></td></tr>

<?php if ($stats[0]->x != "0"): ?>
<tr><td width="50%">&nbsp; Kedua-duanya sekali</td><td width="50%" align="center"><?= $stats[0]->x?></td></tr>
<?php endif?>
<?php if ($stats2[0]->x != "0"): ?>
<tr><td width="50%">&nbsp; Peralatan</td><td width="50%" align="center"><?= $stats2[0]->x?></td></tr>
<?php endif?>
<?php if ($stats3[0]->x != "0"): ?>
<tr><td width="50%">&nbsp; Perisian</td><td width="50%" align="center"> <?= $stats3[0]->x?></td></tr>
<?php endif?>
<?php if ($stats4[0]->x != "0"): ?>
<tr><td width="50%">&nbsp; Peralatan - [ Komputer ]</td><td width="50%" align="center"><?= $stats4[0]->x?></td></tr>
<?php endif?>
<?php if ($stats5[0]->x != "0"): ?>
<tr><td width="50%">&nbsp; Peralatan - [ Pencetak ]</td><td width="50%" align="center"><?= $stats5[0]->x?></td></tr>
<?php endif?>
<?php if ($stats6[0]->x != "0"): ?>
<tr><td width="50%">&nbsp; Peralatan - [ Lain-lain ]</td><td width="50%" align="center"><?= $stats6[0]->x?></td></tr>
<?php endif?>
<?php if ($stats7[0]->x != "0"): ?>
<tr><td width="50%">&nbsp; Perisian - [ Windows ]</td><td width="50%" align="center"><?= $stats7[0]->x?></td></tr>
<?php endif?>
<?php if ($stats8[0]->x != "0"): ?>
<tr><td width="50%">&nbsp; Perisian - [ Internet ]</td><td width="50%" align="center"><?= $stats8[0]->x?></td></tr>
<?php endif?>
<?php if ($stats9[0]->x != "0"): ?>
<tr><td width="50%">&nbsp; Perisian - [ Email Arkib ]</td><td width="50%" align="center"><?= $stats9[0]->x?></td></tr>
<?php endif?>
<?php if ($stats10[0]->x != "0"): ?>
<tr><td width="50%">&nbsp; Perisian - [ COMPASS ]</td><td width="50%" align="center"><?= $stats10[0]->x?></td></tr>
<?php endif?>
<?php if ($stats11[0]->x != "0"): ?>
<tr><td width="50%">&nbsp; Perisian - [ TRIM ]</td><td width="50%" align="center"><?= $stats11[0]->x?></td></tr>
<?php endif?>
<?php if ($stats12[0]->x != "0"): ?>
<tr><td width="50%">&nbsp; Perisian - [ Lain-lain ]</td><td width="50%" align="center"><?= $stats12[0]->x?></td></tr>
<?php endif?>
<?php if ($total[0]->x != "0"): ?>
<tr><td width="50%">&nbsp; <b>Total</b></td><td width="50%" align="center"><b><?= $total[0]->x?></b></td></tr>
<?php endif?>
</td></tr>
</table></div></div></div>
<?php endif?>
<br>