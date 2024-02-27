<?php
include "dbconn.php";  // Using database connection file here
date_default_timezone_set("Asia/Kuala_Lumpur");
$sql="select * from bahagian";
$sql3="select * from helpdesk_masalah";
$sql6="select * from helpdesk";
$re = mysqli_query($dbconn, $sql);  // Use select query here 
$re3 = mysqli_query($dbconn, $sql3);
$re6 = mysqli_query($dbconn, $sql6);

?>
<center>
<div class="row justify-content-md-center m-t-30">
 <div class="col-md-8">
  <div class="table-responsive table-border m-b-10">
  <table class="table table-border table-striped table-sm table-data1">
   <tbody>    

<td width="32%">
<select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
  <option disabled selected>Senarai IP Lama</option>
  <option value="/ipaddress/oldip/10.0.117.|Ibu Pejabat (117)">Ibu Pejabat (117)</option>
  <option value="/ipaddress/oldip/10.0.118.|Ibu Pejabat (118)">Ibu Pejabat (118)</option>
  <option value="/ipaddress/oldip/10.0.119.|Ibu Pejabat (119)">Ibu Pejabat (119)</option>
  <option value="/ipaddress/oldip/10.0.120.|Ibu Pejabat (120)">Ibu Pejabat (120)</option>
  <option value="/ipaddress/oldip/10.2.81.|Memorial Tengku Abd. Rahman Putra">Memorial Tengku Abd. Rahman Putra</option>
  <option value="/ipaddress/oldip/10.2.80.|Memorial Tun Husien Onn">Memorial Tun Husien Onn</option>
  <option value="/ipaddress/oldip/10.2.82.|Memorial Tun Abd. Razak">Memorial Tun Abd. Razak</option>
  <option value="/ipaddress/oldip/10.36.97.|NPC(PJ) ">NPC(PJ)</option>
  <option value="/ipaddress/oldip/10.36.96.|MBPJ ">MBPJ</option>
  <option value="/ipaddress/oldip/10.65.140.|Cawangan Melaka"> Melaka</option>
  <option value="/ipaddress/oldip/10.72.236.|Cawangan Johor">Johor</option>
  <option value="/ipaddress/oldip/10.135.80.|Cawangan Perak">Perak</option>
  <option value="/ipaddress/oldip/10.154.81.|Cawangan Pulau Pinang"> Pulau Pinang</option>
  <option value="/ipaddress/oldip/10.141.70.|Cawangan Kedah">Kedah</option>
  <option value="/ipaddress/oldip/10.113.76.|Cawangan Terengganu"> Terengganu</option>
  <option value="/ipaddress/oldip/10.117.84.|Cawangan Kelantan"> Kelantan</option>
  <option value="/ipaddress/oldip/10.217.40.|Cawangan Sabah"> Sabah</option>
  <option value="/ipaddress/oldip/10.188.72.|Cawangan Sarawak">Sarawak</option></select>
</td>

<td width="32%">
<select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
    <option disabled selected>Senarai IP Baru</option>
  <option value="/ipaddress/newip/10.29.66.|DRC-PDSA (29.66)">DRC-PDSA (29.66)</option>
  <option value="/ipaddress/newip/10.0.117.|Ibu Pejabat (117)">Ibu Pejabat (117)</option>
  <option value="/ipaddress/newip/10.0.118.|Ibu Pejabat (118)">Ibu Pejabat (118)</option>
  <option value="/ipaddress/newip/10.0.119.|Ibu Pejabat (119)">Ibu Pejabat (119)</option>
  <option value="/ipaddress/newip/192.168.10.|Ibu Pejabat (192)">Ibu Pejabat (192)</option>
  <option value="/ipaddress/newip/10.32.76.|Ibu Pejabat (76)">Ibu Pejabat (76)</option>
  <option value="/ipaddress/newip/10.32.77.|Ibu Pejabat (77)">Ibu Pejabat (77)</option>
  <option value="/ipaddress/newip/10.32.78.|Ibu Pejabat (78)">Ibu Pejabat (78)</option>
  <option value="/ipaddress/newip/10.32.79.|Ibu Pejabat (79)">Ibu Pejabat (79)</option>
  <option value="/ipaddress/newip/10.32.80.|Ibu Pejabat (80)">Ibu Pejabat (80)</option>
  <option value="/ipaddress/newip/10.2.81.|Memorial Tunku Abdul Rahman Putra (10.2.81.)">Memorial Tunku Abdul Rahman Putra (10.2.81.)</option>
  <option value="/ipaddress/newip/10.2.80.|Memorial Tun Hussein Onn (10.2.80.)">Memorial Tun Hussein Onn (10.2.80.)</option>
  <option value="/ipaddress/newip/10.2.82.|Memorial Tun Abdul Razak (10.2.82.)">Memorial Tun Abdul Razak (10.2.82.)</option>
  <option value="/ipaddress/newip/10.2.83.|Galeria Sri Perdana (10.2.83.)">Galeria Sri Perdana (10.2.83.)</option>
  <option value="/ipaddress/newip/10.2.97.|Pustaka Peringatan P.Ramlee (10.2.97.)">Pustaka Peringatan P.Ramlee (10.2.97.)</option>
  <option value="/ipaddress/newip/10.2.96.|Pustaka Perkhidmatan Awam (10.2.96.)">Pustaka Perkhidmatan Awam (10.2.96.)</option>
  <option value="/ipaddress/newip/10.65.140.|Memorial Pengisytiharan Kemerdekaan (10.65.140.)">Memorial Pengisytiharan Kemerdekaan (10.65.140.)</option>
  <option value="/ipaddress/newip/10.64.68.|Memorial Tun Ghafar Baba (10.64.68.)">Memorial Tun Ghafar Baba (10.64.68.)</option>
  <option value="/ipaddress/newip/10.151.72.|Rumah Kelahiran P.Ramlee (10.151.72.)">Rumah Kelahiran P.Ramlee (10.151.72.)</option>
  <option value="/ipaddress/newip/10.141.136.|Rumah Kelahiran Mahathir Mohamad (10.141.136.)">Rumah Kelahiran Mahathir Mohamad (10.141.136.)</option>
  <option value="/ipaddress/newip/10.141.137.|Kompleks Rumah Merdeka (10.141.137.)">Kompleks Rumah Merdeka (10.141.137.)</option>
  <option value="/ipaddress/newip/10.36.97.|Seksyen Perkhidmatan Pusat Rekod (PJ) (10.36.97.)">Seksyen Perkhidmatan Pusat Rekod (PJ) (10.36.97.)</option>
  <option value="/ipaddress/newip/10.117.84.|Kelantan (10.117.84.)">Kelantan (10.117.84.)</option>
  <option value="/ipaddress/newip/10.113.76.|Terengganu (10.113.76.)">Terengganu (10.113.76.)</option>
  <option value="/ipaddress/newip/10.154.81.|Pulau Pinang (10.154.81.)">Pulau Pinang (10.154.81.)</option>
  <option value="/ipaddress/newip/10.72.236.|Johor (10.72.236.)">Johor (10.72.236.)</option>
  <option value="/ipaddress/newip/10.141.70.|Kedah (10.141.70.)">Kedah (10.141.70.)</option>
  <option value="/ipaddress/newip/10.65.141.|Melaka (10.65.141.)">Melaka (10.65.141.)</option>
  <option value="/ipaddress/newip/10.96.108.|Pahang (10.96.108.)">Pahang (10.96.108.)</option>
  <option value="/ipaddress/newip/10.135.80.|Perak (10.135.80.)">Perak (10.135.80.)</option>
  <option value="/ipaddress/newip/10.130.12.|Perak2 (10.130.12.)">Perak2 (10.130.12.)</option>
  <option value="/ipaddress/newip/10.217.86.|Sabah (10.217.86.)">Sabah (10.217.86.)</option>
  <option value="/ipaddress/newip/10.188.72.|Sarawak (10.188.72.)">Sarawak (10.188.72.)</option>
</select><br></td><!--<td width="15%"><a href="/ipaddress/update/crt/ip"><button class="btn btn-primary">Create IP</button></a></td>-->
     </tbody>
   </table>
       </div>
   </div>

<div class="row">
 <div class="col-md-6">
  <div class="table table-bordered ">
     <div id="message"></div>
  <table class="table table-bordered table-striped table-sm table-data1"
               bgcolor="white" width="10%">
<?php if (! empty($address) && is_array($address)) : ?>
<?php foreach ($address as $item): ?>
<form method="post" action="<?php base_url()?>/ipaddress/updateip">
      <?= csrf_field() ?>
<tr><td colspan="2" bgcolor="#0099FF" align="center">
  <font face="arial" color="white">&nbsp;<b>Details Of IP Address <?= $item['ip'] ?></b></font>

</td></tr>
<tr > 
        <td>&nbsp;<font face="arial">Hostname:</font></td>
        <td> 
        <input type="text" name="hostname" maxlength="20" value="<?= $item['hostname'] ?>" class="form-control form-control-sm"></td>
        </tr><tr > 
        <td><font face="arial">&nbsp;&nbsp;&nbsp;User :</font></td>
        <td> 
        <input type="text" name="user" maxlength="40" value="<?= $item['user'] ?>" class="form-control form-control-sm"></td>
        </tr><tr > 
    <td>&nbsp;<font face="arial">Jawatan :</font></td>
    <td> 
    <select name="jawatan">
    <option value="<?= $item['jawatan'] ?>" selected hidden><?= $item['jawatan'] ?></option>
    <option value="">--Tiada--</option>
    <option value="**KEGUNAAN CTM**">**KEGUNAAN CTM**</option>
    <option value="Ketua Pengarah">Ketua Pengarah</option>
    <option value="Tim. Ketua Pengarah">Tim. Ketua Pengarah</option>
    <option value="Pengarah Pengurusan">Pengarah Pengurusan</option>
    <option value="Ketua Cawangan">Ketua Cawangan</option>
    <option value="Pengarah Negeri">Pengarah Negeri</option>
    <option value="Pengarah Memorial &amp; Pustaka">Pengarah Memorial &amp; Pustaka</option>
    <option value="Pegawai Arkib">Pegawai Arkib</option>
    <option value="Pegawai Teknologi Maklumat">Pegawai Teknologi Maklumat</option>
    <option value="Pen. Peg Teknologi Maklumat">Pen Peg Teknologi Maklumat</option>
    <option value="Pen Pegawai Arkib">Pen Pegawai Arkib</option>
    <option value="Pem. Arkib">Pem. Arkib</option>
    <option value="Pem. Pemuliharaan ">Pem. Pemuliharaan</option>
    <option value="Pem. Akauntan">Pem. Akauntan</option>
    <option value="Pen Peg Tadbir">Pen Peg Tadbir</option>
    <option value="Pem. Tadbir">Pem. Tadbir</option>
    <option value="Peg Khidmat Pelanggan">Peg Khidmat Pelanggan</option>
    <option value="Pem. Tadbir Kesetiausahaan">Pem. Tadbir Kesetiausahaan</option>
    <option value="Juruteknik">Juruteknik</option>
    <option value="Pembantu Teknik">Pembantu Teknik</option>
    <option value="Penyelia Bangunan">Penyelia Bangunan</option>
    <option value="Pem. Am Rendah">Pem. Am Rendah</option>
    <option value="Pem. Tadbir Rendah">Pem. Tadbir Rendah</option>
    </select></td>
  </tr><tr > 
<td>&nbsp;<font face="arial">Cawangan :</font></td>
<td> 
<select name="cawangan">
<option value="<?= $item['cawangan'] ?>" selected hidden><?= $item['cawangan'] ?></option>
<option value="">--Tiada--</option>
<option value="CAW TEKNOLOGI MAKLUMAT">CAW TEKNOLOGI MAKLUMAT</option>
<option value=" Pejabat Ketua Pengarah   "> Pejabat Ketua Pengarah  </option>
<option value=" Pejabat Timb Ketua Pengarah ">  Pejabat Timb Ketua Pengarah </option>
<option value=" Pengurusan Rekod Konvensional ">  Pengurusan Rekod Konvensional </option>
<option value=" Pengurusan Rekod Elektronik & Teknologi Maklumat  ">  Pengurusan Rekod Elektronik & Teknologi Maklumat  </option>
<option value=" Pengurusan Perolehan, Pendokumentasian & Pandang Dengar ">  Pengurusan Perolehan, Pendokumentasian & Pandang Dengar </option>
<option value=" Pengurusan Arkib Memorial ">  Pengurusan Arkib Memorial </option>
<option value=" Pengurusan Perancangan & Pembangunan  ">  Pengurusan Perancangan & Pembangunan  </option>
<option value=" Caw Rekod Konvensional Sektor Ekonomi ">  Caw Rekod Konvensional Sektor Ekonomi </option>
<option value=" Caw Rekod Konvensional Sektor Pentadbiran & Social  ">  Caw Rekod Konvensional Sektor Pentadbiran & Social  </option>
<option value=" Caw Rekod Konvensional Sektor Keselamatan ">  Caw Rekod Konvensional Sektor Keselamatan </option>
<option value=" Caw Pemeliharaan & Reprografi ">  Caw Pemeliharaan & Reprografi </option>
<option value=" Caw Repositori  ">  Caw Repositori  </option>
<option value=" Caw Rekod Elektronik Sektor Ekonomi & Sosial  ">  Caw Rekod Elektronik Sektor Ekonomi & Sosial  </option>
<option value=" Caw Rekod Elektronik Sektor Pentadbiran & Keselamatan ">  Caw Rekod Elektronik Sektor Pentadbiran & Keselamatan </option>
<option value=" Caw Rekod Elektronik Khidmat Nasihat & Seranta  ">  Caw Rekod Elektronik Khidmat Nasihat & Seranta  </option>
<option value=" Caw Pembangunan Standard & Inspektorat  ">  Caw Pembangunan Standard & Inspektorat  </option>
<option value=" Caw Teknologi Maklumat  ">  Caw Teknologi Maklumat  </option>
<option value=" Caw Perolehan & Pemprosesan ">  Caw Perolehan & Pemprosesan </option>
<option value=" Caw Panduan ">  Caw Panduan </option>
<option value=" Caw Akses ">  Caw Akses </option>
<option value=" Caw Dokumentasi ">  Caw Dokumentasi </option>
<option value=" Caw Pusat Perkhidmatan Pandang Dengar ">  Caw Pusat Perkhidmatan Pandang Dengar </option>
<option value=" Caw Penyelidik Khas ">  Caw Penyelidik Khas </option>
<option value=" Memorial Tunku Abdul Rahman ">  Memorial Tunku Abdul Rahman </option>
<option value=" Galeria Perdana ">  Galeria Perdana </option>
<option value=" Memorial Tun Abdul Razak  ">  Memorial Tun Abdul Razak  </option>
<option value=" Memorial Pengisytiharan Kemerdekaan ">  Memorial Pengisytiharan Kemerdekaan </option>
<option value=" Pustaka Peringatan P. Ramlee  ">  Pustaka Peringatan P. Ramlee  </option>
<option value=" Caw Pameran ">  Caw Pameran </option>
<option value=" Rumah Kelahiran P. Ramlee ">  Rumah Kelahiran P. Ramlee </option>
<option value=" Rumah Kelahiran Tun Mahathir  ">  Rumah Kelahiran Tun Mahathir  </option>
<option value=" Pustaka Perkhidmatan Awam ">  Pustaka Perkhidmatan Awam </option>
<option value=" Memorial Tun Hussien Onn  ">  Memorial Tun Hussien Onn  </option>
<option value=" Caw Perkhidmatan, Penjawatan & Kewangan ">  Caw Perkhidmatan, Penjawatan & Kewangan </option>
<option value=" Caw Perancangan & Pembangunan ">  Caw Perancangan & Pembangunan </option>
<option value=" Caw Latihan ">  Caw Latihan </option>
<option value=" Caw Perhubungan Awam  ">  Caw Perhubungan Awam  </option>
<option value=" Caw Johor ">  Caw Johor </option>
<option value=" Caw Kedah / Perlis  ">  Caw Kedah / Perlis  </option>
<option value=" Caw Terengganu / Pahang ">  Caw Terengganu / Pahang </option>
<option value=" Caw Sabah ">  Caw Sabah </option>
<option value=" Caw Sarawak ">  Caw Sarawak </option>
<option value=" Caw Pulau Pinang  ">  Caw Pulau Pinang  </option>
<option value=" Caw Kelantan  ">  Caw Kelantan  </option>
<option value=" Caw Perak ">  Caw Perak </option>
<option value=" Caw Melaka  ">  Caw Melaka  </option>
</select>
</td></tr>
<tr><td colspan="2" bgcolor="#0099FF" align="center">
  <font face="arial">&nbsp;
  <!--<input type="reset" value="Reset" class="btn btn-secondary">-->
  <input type="submit" value="Update IP" class="btn btn-success">
</font></td>
</tr>
<input type="hidden" name="type" value="<?= $type ?>">
<input type="hidden" name="ip" value="<?= $ip ?>">
<input type="hidden" name="route" value="<?= base_url()."".$_SERVER['REQUEST_URI'] ?>">
</form>
    <?php endforeach; ?>
<?php endif ?>
<!-- Delete IP Address -->
</table></div></div></div></div>
<br>
</div>