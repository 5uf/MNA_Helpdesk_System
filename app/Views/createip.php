<form method="post" action="ipaddress/createip">
  <?= csrf_field() ?>
<tr><td colspan="2" bgcolor="#0099FF">

  <font face="arial">&nbsp;<b>Create IP Address:</b></font>

</td></tr>

<tr bgcolor="#66CCFF">
        <td> &nbsp;<font face="arial"> IP </font> :</td>
        <td>  <input type="text" name="ip" size="20" maxlength="20"></td>
        </tr><tr bgcolor="#66CCFF"> 
        <td>&nbsp;<font face="arial">Hostname :</font></td>
        <td> 
        <input type="text" name="hostname" size="20" maxlength="20" value="WW2"></td>
        </tr><tr bgcolor="#66CCFF"> 
        <td>&nbsp;<font face="arial">User :</font></td>
        <td> 
        <input type="text" name="user" size="40" maxlength="40" value="CTM"></td>
        </tr><tr bgcolor="#66CCFF"> 
    <td>&nbsp;<font face="arial">Jawatan :</font></td>
    <td> 
    <select name="jawatan">
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
  </tr><tr bgcolor="#66CCFF"> 
<td>&nbsp;<font face="arial">Cawangan :</font></td>
<td> 
<select name="cawangan">
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
</td>
</tr>
<tr><td colspan="2" bgcolor="#0099FF" align="center">
   <font face="arial">&nbsp;
  <input type="reset" value="Reset">
  <input type="submit" value="Create IP">
</font></td>
</tr>
</form>