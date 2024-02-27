<body  bgcolor="#FFA54F"  TOPMARGIN="0" 
       LEFTMARGIN="0" RIGHTMARGIN="0" MARGINHEIGHT="0" MARGINWIDTH="0">


<table border="1" cellpadding="3" cellspacing="0" 
               bgcolor="white" bordercolor="black" width="100%">

        <tr>
        <td bgcolor="#cccccc" colspan="5" align="center">
        
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
  <td>
  <font face="arial" size="2"><b>Laporan Helpdesk - <u><?=esc($stitle)?></u></font></b>
  </td>
  <form action="/report" method="get">
  <td align="right">
  <input type="submit" value="HELPDESK" >
  </td>
  </form>
  </tr>
  </table>

      <?php if (! empty($report) && is_array($report)) : ?>
      <?php $i = 1; ?>
      <?php foreach ($report as $item): ?>
        <tr bgcolor="antiquewhite">
        <td align="center"><font face="arial" size="2"><b>No </b></font></td>
        <td align="center" colspan="2"><font face="arial" size="2"><b>Maklumat Pelapor</b></font></td>
        <td align="center" colspan="3" width="50%">
            <font face="arial" size="2"><b>Kerosakan / Masalah</b></font>
        </td>
        </tr><tr bgcolor="#ccccff">
          <td align="center" valign="top" rowspan="7"><font face="arial" size="2"><?= $i ?></font></td>
          <td width="12%"><font face="arial" size="2"><b>Nama</b></font></td>
          <td><font face="arial" size="2"><?= esc($item['nama'])?></font></td>
          <td width="15%"><font face="arial" size="2"><b>No Rujukan</b></font></td>
          <td><a href="/report/viewreport/<?= esc($item['no_rujukan'])?>">
           <font face="arial" color="blue"><b><?= esc($item['no_rujukan'])?></b></font></a></td></tr>

                <tr bgcolor="#ccccff">
          <td><font face="arial" size="2"><b>Jawatan</b>            </font></td>
          <td><font face="arial" size="2"><?= esc($item['jawatan'])?></font></td>
          <td><font face="arial" size="2"><b>Maklumat Kerosakan </b></font></td>
          <td><font face="arial" size="2"><?= esc($item['hmaksud'])?></font></td>
          </tr>

          <tr bgcolor="#ccccff">
          <td><font face="arial" size="2"><b>Bahagian </b> </font></td>
          <td><font face="arial" size="2"><?= esc($item['bmaksud'])?></font></td>
          <td><font face="arial" size="2"><b>Peralatan </b></font></td>
          <td><font face="arial" size="2"<?= esc($item['peralatan'])?></font></td>
          </tr>

          <tr bgcolor="#ccccff">
          <td><font face="arial" size="2"><b>No Tel</b>   </font></td>
          <td><font face="arial" size="2"><?= esc($item['tel_ext'])?></font></td>
      <td><font face="arial" size="2"><b>Perisian</b></font></td>
          <td><font face="arial" size="2"><?= esc($item['perisian'])?></font></td>
          </tr>

          <tr bgcolor="#ccccff">
          <td ><font face="arial" size="2"><b>Tarikh Laporan </b></font></td>
          <td ><font face="arial" size="2"><?= esc($item['tarikh'])?></font></td>
      <td><font face="arial" size="2"><b>Tindakan </b></font></td>
          <td><font face="arial" size="2"><?= esc($item['tmaksud'])?></font></td>
      </tr>

          <tr bgcolor="#ccccff">
      <td ><font face="arial" size="2"><b>Status</b></font></td>
          <td ><font face="arial" size="2"><b><font color="green"><?= esc($item['smaksud'])?> >>> </font></b></font><?= esc($item['tarikh_tindakan'])?></td>
      <td rowspan="2"><font face="arial" size="2"><b>Keterangan Masalah </b></font></td>
          <td rowspan="2"><font face="arial" size="2"><?= esc($item['keterangan'])?></font></td>    
      </tr>
      
      <tr bgcolor="#ccccff">
          <td><font face="arial" size="2"><b>Diselesaikan Oleh</b></font></td>
          <td><font face="arial" size="2"><?= esc($item['pegawai_btm']) ?> </font></td>
      </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
    <?php else : ?>
    <h3>Unable to display data</h3>
<?php endif ?>
      <tr bgcolor="#ccccff">
          <td >&nbsp;</td><td >&nbsp;</td>
      </tr>
</table>
</center>
</body>
</html>
