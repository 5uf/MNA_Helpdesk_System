<?php 
date_default_timezone_set("Asia/Kuala_Lumpur");
$timestamp=date('Y-m-d H:i:s');
$name = $_SESSION['nama']; ?>
<?php if (! empty($report) && is_array($report)) : ?>
<?php foreach ($report as $item): ?>
  <div class="row justify-content-md-center m-t-30">
 <div class="col-md-8">
  <div class="table-responsive table-bordered m-b-10" style="background: white; ">
<form action="/report/updatereport/<?= $item['no_rujukan']?>" method="post"> 
<?= csrf_field() ?>
<input type="hidden" name="timestamp" value="<?php echo $timestamp?>">
<input type="hidden" name="pegawai" value="<?php echo $name?>">
 <table class="table table-bordered table-sm table-data1">
          <tr>
          <td colspan="2" align="center">&nbsp;<b> Maklumat Laporan Terperinci </b></td>
          </tr>
          <tr>
          <td>&nbsp;<b> No Rujukan </b></td>
          <td>&nbsp; <?= $item['no_rujukan']?>
          <input type="hidden" name="no_rujukan" value="<?= $item['no_rujukan']?>"></td>
          </tr>
          <tr>
          <td>&nbsp;<b> Nama  </b></td>
          <td>&nbsp; <?= $item['nama']?> </td>
          </tr>
          <tr>
          <td>&nbsp;<b> Keterangan Masalah </b></td>
          <td>&nbsp; <?= $item['keterangan']?> </td>
          </tr>
          <tr>
          <td>&nbsp;<b> Jawatan  </b></td>
          <td>&nbsp; <?= $item['jawatan']?> </td>
          </tr>
          <tr>
          <td>&nbsp;<b> Bahagian  </b></td>
          <td>&nbsp; <?= $item['bmaksud']?> </td>
          </tr>
          <tr>
          <td>&nbsp;<b> Tingkat  </b></td>
          <td>&nbsp; <?= $item['tingkat']?> </td>
          </tr>
          <tr>
          <td>&nbsp;<b> No Tel &nbsp;&nbsp;(IP)</b></td>
          <td>&nbsp; <?= $item['tel_ext']?> </td>
          </tr>
          <tr>
          <td>&nbsp;<b> Tarikh Lapor </b></td>
          <td>&nbsp; <?= $item['tarikh']?> </td>
          </tr>
          <tr>
          <td>&nbsp;<b> Status </b></td>
          <?php if (empty($item['smaksud'])): ?>
          <td><b><font face="arial" color="red">&nbsp; Tiada</b></td>
          <?php elseif($item['smaksud'] === "Selesai"): ?>
          <td><b><font face="arial" color="green">&nbsp; >>>>Selesai</b></td>
          <?php else :?>
          <td><b><font face="arial" color="red">&nbsp; >>>><?= $item['smaksud']?></b></td>
          <?php endif?>
          </tr>
          <?php if (! empty($item['responsetime2'])): ?>
           <tr>
          <td>&nbsp;<b> Tarikh/Masa Tindak Balas </b></td>
          <td>&nbsp; <?= $item['responsetime2']?> </td>
          </tr>
          <?php endif?>
          <?php if ($item['tarikh_tindakan'] != "0000-00-00 00:00:00"): ?>
          <tr>
          <td>&nbsp;<b> Tarikh Selesai </b></td>
          <td>&nbsp;<?= $item['tarikh_tindakan']?><br></td>
          </tr>
          <?php endif?>
          
          <tr>
          <td>&nbsp;<b> Tindakan:</b></td>
          <td>&nbsp;<b> <?php if (! empty($item['tmaksud'])): ?>
           >>>><?= $item['tmaksud']?>
          <?php endif?></b></td>
          <td></tr>
            <tr>
            <td rowspan="2" align="left"><b> Kemas Kini Tindakan:</b><br><br>&nbsp;
            <select name="tindakan">
            <option value="" selected disabled>Pilih Tindakan</option>
            <option value="01">Instalasi</option>
            <option value="02">Pembaikan</option>
            <option value="03">Upgrade</option>
            <option value="04">Tukar Alat Ganti </option>
            <option value="05">Lain-lain</option>
            </select>  
            </td>
           </tr>
            <tr>
            <td >Tindakan Lain-lain:<br>&nbsp;
            <textarea name="tindakan_lain" cols="100" rows="1" wrap class="form-control"><?= $item['tindakan_lain']?></textarea>
            </td>
            </tr>
          </td>
          </tr>
          <tr>
          <td rowspan="2"><b>Kemas Kini Status:</b><br>&nbsp;
            <select name="status">
              <option value="" selected disabled>Pilih Status</option>
              <option value="Y">Selesai</option>
              <option value="D">Dalam Tindakan</option>
              <option value="M">Menunggu alat ganti</option>
              <option value="H">Hantar pembekal</option>
              <option value="R">Rosak tidak boleh dibaiki</option>
              <option value="L">Lain-lain</option>
            </select>
            </td>
            </tr>
            <tr>
            <td>Status Lain:<br>&nbsp;
            <textarea name="status_lain" cols="100" rows="1" wrap placeholder="Status Lain-lain" class="form-control"> <?= $item['status_lain']?> </textarea>
            </td>
            </tr>
        </table>
<?php endforeach; ?>
<?php else : ?>
  <h3>The report does not exist in the database!</h3>
<?php endif ?>
<?php if ($item['smaksud'] != "Selesai"): ?>
<center><button type="submit" class="au-btn au-btn--blue">Update</button></center>
<?php endif ?>  
</form>
</div>
</div>
</div>
