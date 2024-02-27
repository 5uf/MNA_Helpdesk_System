<?php if ($total[0]->x != "0"): ?>
<div class="row justify-content-md-center m-t-20" style="font-family: New Times Roman;">
 <div class="col-md-8">
  <div class="table-responsive m-b-10">
  <table class="table table-bordered table-sm table-data1" style="background: white; border-color: black;">
<?php $link = "".base_url()."/report/print/".$year."/".$fmonth.""; ?>
<tr><td colspan="2" align="center" bgcolor="lightblue">
<b><a href="/report/print/<?= $year?>/<?= $fmonth?>" style="color: black;">Statistik Laporan ISO Helpdesk <?= $month?> <?= $year ?></a></b></td></tr>
<td width="50%">&nbsp;  Respons Kurang Daripada 24 Jam:</td><td width="50%" align="center"><?= $less24[0]->x?> </td>
</tr><tr>
<td width="50%">&nbsp;  Respons Lebih Daripada 24 Jam:</td><td width="50%" align="center"><?= $more24[0]->x?> </td></tr>
<tr><td width="50%">&nbsp; Diselesaikan Kurang Daripada 10 Hari:</td><td width="50%" align="center"><?= $less10[0]->x?> </td></tr>
<tr><td width="50%">&nbsp; Diselesaikan Lebih Daripada 10 Hari:</td><td width="50%" align="center"><?= $more10[0]->x?> </td></tr>
<tr><td width="50%">&nbsp; <b>Total:</b></td>
<td width="50%" align="center"><b><?= $total[0]->x ?> </b></td></tr>
</td></tr>
</table>
  </div>
 </div>
</div>
<br>
<?php endif?>