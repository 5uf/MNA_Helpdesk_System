<?php
include "dbconn.php";  // Using database connection file here
$sql="select * from helpdesk"; 
$re = mysqli_query($dbconn, $sql);// Use select query here
?>

<div class="row justify-content-md-center m-t-30">
 <div class="col-md-12">
  <div class="table-responsive table-bordered m-b-10">
  <table class="table table-bordered table-sm table-data1">
<tr>
<td><font face="arial"><b>Bulan</b></font></td>
<td align="center" ><font face="arial"> Jan </font></td>
<td align="center"><font face="arial"> Feb </font></td>
<td align="center"><font face="arial"> Mac </font></td>
<td align="center"><font face="arial"> Apr </font></td>
<td align="center"><font face="arial"> May </font></td>
<td align="center"><font face="arial"> Jun </font></td>
<td align="center"><font face="arial"> Jul </font></td>
<td align="center"><font face="arial"> Aug </font></td>
<td align="center"><font face="arial"> Sep </font></td>
<td align="center"><font face="arial"> Oct </font></td>
<td align="center"><font face="arial"> Nov </font></td>
<td align="center"><font face="arial"> Dec </font></td>
</tr>
<tr bgcolor="#ffffff">
<td><b>Dalam Tindakan:</b></font></td>
<td><font face="arial" color="red"><a href="/report/listreport/<?= esc($year)?>/1/D"><?= $pcount ?></a></font></td>
<td><font face="arial" color="red"><a href="/report/listreport/<?= esc($year)?>/2/D"><?= $pcount2 ?></a></font></td>
<td><font face="arial" color="red"><a href="/report/listreport/<?= esc($year)?>/3/D"><?= $pcount3 ?></a></font></td>
<td><font face="arial" color="red"><a href="/report/listreport/<?= esc($year)?>/4/D"><?= $pcount4 ?></a></font></td>
<td><font face="arial" color="red"><a href="/report/listreport/<?= esc($year)?>/5/D"><?= $pcount5 ?></a></font></td>
<td><font face="arial" color="red"><a href="/report/listreport/<?= esc($year)?>/6/D"><?= $pcount6 ?></a></font></td>
<td><font face="arial" color="red"><a href="/report/listreport/<?= esc($year)?>/7/D"><?= $pcount7 ?></a></font></td>
<td><font face="arial" color="red"><a href="/report/listreport/<?= esc($year)?>/8/D"><?= $pcount8 ?></a></font></td>
<td><font face="arial" color="red"><a href="/report/listreport/<?= esc($year)?>/9/D"><?= $pcount9 ?></a></font></td>
<td><font face="arial" color="red"><a href="/report/listreport/<?= esc($year)?>/10/D"><?= $pcount10 ?></a></font></td>
<td><font face="arial" color="red"><a href="/report/listreport/<?= esc($year)?>/11/D"><?= $pcount11 ?></a></font></td>
<td><font face="arial" color="red"><a href="/report/listreport/<?= esc($year)?>/12/D"><?= $pcount12 ?></a></font></td>
</tr> 
<tr bgcolor="#ffffff">
<td><b>Selesai:</b></td>
<td><font face="arial" color="green"><a href="/report/listreport/<?= esc($year)?>/1/Y"><?= $dcount ?></a></font></td>
<td><font face="arial" color="green"><a href="/report/listreport/<?= esc($year)?>/2/Y"><?= $dcount2 ?></a></font></td>
<td><font face="arial" color="green"><a href="/report/listreport/<?= esc($year)?>/3/Y"><?= $dcount3 ?></a></font></td>
<td><font face="arial" color="green"><a href="/report/listreport/<?= esc($year)?>/4/Y"><?= $dcount4 ?></a></font></td>
<td><font face="arial" color="green"><a href="/report/listreport/<?= esc($year)?>/5/Y"><?= $dcount5 ?></a></font></td>
<td><font face="arial" color="green"><a href="/report/listreport/<?= esc($year)?>/6/Y"><?= $dcount6 ?></a></font></td>
<td><font face="arial" color="green"><a href="/report/listreport/<?= esc($year)?>/7/Y"><?= $dcount7 ?></a></font></td>
<td><font face="arial" color="green"><a href="/report/listreport/<?= esc($year)?>/8/Y"><?= $dcount8 ?></a></font></td>
<td><font face="arial" color="green"><a href="/report/listreport/<?= esc($year)?>/9/Y"><?= $dcount9 ?></a></font></td>
<td><font face="arial" color="green"><a href="/report/listreport/<?= esc($year)?>/10/Y"><?= $dcount10 ?></a></font></td>
<td><font face="arial" color="green"><a href="/report/listreport/<?= esc($year)?>/11/Y"><?= $dcount11 ?></a></font></td>
<td><font face="arial" color="green"><a href="/report/listreport/<?= esc($year)?>/12/Y"><?= $dcount12 ?></a></font></td>
</tr>
<tr bgcolor="#ffffff">
<td><b>Jumlah:</b></td>
<td><font face="arial"><a href="/report/listreport/<?= esc($year)?>/1/DY"><?= $total ?></a></font></td>
<td><font face="arial"><a href="/report/listreport/<?= esc($year)?>/2/DY"><?= $total2 ?></a></font></td>
<td><font face="arial"><a href="/report/listreport/<?= esc($year)?>/3/DY"><?= $total3 ?></a></font></td>
<td><font face="arial"><a href="/report/listreport/<?= esc($year)?>/4/DY"><?= $total4 ?></a></font></td>
<td><font face="arial"><a href="/report/listreport/<?= esc($year)?>/5/DY"><?= $total5 ?></a></font></td>
<td><font face="arial"><a href="/report/listreport/<?= esc($year)?>/6/DY"><?= $total6 ?></a></font></td>
<td><font face="arial"><a href="/report/listreport/<?= esc($year)?>/7/DY"><?= $total7 ?></a></font></td>
<td><font face="arial"><a href="/report/listreport/<?= esc($year)?>/8/DY"><?= $total8 ?></a></font></td>
<td><font face="arial"><a href="/report/listreport/<?= esc($year)?>/9/DY"><?= $total9 ?></a></font></td>
<td><font face="arial"><a href="/report/listreport/<?= esc($year)?>/10/DY"><?= $total10 ?></a></font></td>
<td><font face="arial"><a href="/report/listreport/<?= esc($year)?>/11/DY"><?= $total11 ?></a></font></td>
<td><font face="arial"><a href="/report/listreport/<?= esc($year)?>/12/DY"><?= $total12 ?></a></font></td>
</tr> 
</table>
   </div>
 </div>
