<style type="text/css">
  input {
    border: 1;
    border-color: black;
  }
</style>
<div class="align-top">
<div class="row justify-content-md-center">
 <div class="col-md-8">
  <div class="table-responsive table-bordered m-b-10">
  <table class="table table-border table-striped table-sm table-data1">
  <form autocomplete="false" action="/staff/createprofile" method="post"><center>
   <?= csrf_field() ?>
 <tr><td width="23%" >Nama</td>
 <td><input type="text" name="nama" style="padding: 5px;height: 24px;width: 97%;" class="form-control"></td></tr>
 <tr><td>Nama Pengguna</td>
 <td><input type="text" name="username" style="padding: 5px;height: 24px;width: 97%;" required placeholder="Nama Pengguna" class="form-control"></td></tr>
  <tr><td>Katalaluan</td>
 <td><input type="password" name="katalaluan" required placeholder="Katalaluan" autocomplete="new-password" style="padding: 5px;height: 24px;width: 97%;" class="form-control"></td></tr>
  <tr><td>KP12</td>
 <td><input type="text" name="kp12" style="padding: 5px;height: 24px;width: 97%;" class="form-control"></td></tr>
  <tr><td>KP8</td>
 <td><input type="text" name="kp8"style="padding: 5px;height: 24px;width: 97%;" class="form-control" ></td></tr>
  <tr><td>Jantina</td>
 <td><select name="jantina" style=" padding: 5px;width: 40%; " class="form-control"> 
  <option value="M">Lelaki</option>
  <option value="F">Perempuan</option>
 </select></td>
  <tr><td>Tarikh Lahir</td> 
 <td><input type="date" name="t_lahir" width="20%" class="form-control" style="width: 40%;"></td></tr>
  <tr><td>Jawatan</td>
 <td><input type="text" name="jawatan" style="padding: 5px;height: 24px;width: 97%;" class="form-control"></td></tr>
  <tr><td>Gred</td>
 <td><input type="text" name="gred" style="padding: 5px;height: 24px;width: 97%;" class="form-control"></td></tr>
  <tr><td>Bahagian</td>
 <td><input type="text" name="bahagian" style="padding: 5px;height: 24px;width: 97%;" class="form-control"></td></tr>
  <tr><td>No Tel Pejabat</td>
 <td><input type="text" name="no_tel_pej" style="padding: 5px;height: 24px;width: 97%;" class="form-control"></td></tr>
  <tr><td>No Tel Tangan</td>
 <td><input type="text" name="no_hp" style="padding: 5px;height: 24px;width: 97%;" class="form-control"></td></tr>
  <tr><td>Email</td>
 <td><input type="text" name="email" style="padding: 5px;height: 24px;width: 97%;" class="form-control"></td></tr>
  <tr><td>Alamat Rumah</td>
 <td><input type="text" name="alamat_rumah" style="padding: 5px;height: 24px;width: 97%;" class="form-control"></td></tr>
 <tr><td>Peranan</td>
 <td><select name="ap_admin" style=" padding: 5px;width: 40%;" class="form-control"> 
  <option value="Y">Pentadbir/Admin</option>
  <option value="N" selected>Pengguna Biasa</option>
 </select></td></tr>
  <tr><td>ap_helpdesk</td>
 <td><input type="number" name="ap_helpdesk" min="0" max="2" style=" padding: 5px;width: 40%;" class="form-control"></td></tr>
  <tr><td>ap_pegawai</td>
 <td><select name="ap_pegawai" style=" padding: 5px;width: 40%;" class="form-control"> 
  <option value="Y">Ya</option>
  <option value="N" selected>Tidak</option>
 </select></td></tr>
  <tr><td>ap_cuti</td>
 <td><select name="ap_cuti" style="padding: 5px;width: 40%;" class="form-control"> 
  <option value="Y">Ya</option>
  <option value="N" selected>Tidak</option>
 </select></td></tr>
  <tr><td>ap_nota</td>
<td><select name="ap_nota" style=" padding: 5px;width: 40%;" class="form-control"> 
  <option value="Y">Ya</option>
  <option value="N" selected>Tidak</option>
 </select></td></tr>
  <tr><td>ap_tugasan</td><td>
 <select name="ap_tugasan" style="padding: 5px;width: 40%;" class="form-control"> 
  <option value="Y"selected>Ya</option>
  <option value="N" >Tidak</option>
 </select></td></tr>
  <tr><td>ap_aktiviti</td><td>
 <select name="ap_aktiviti" style="padding: 5px;width: 40%;" class="form-control"> 
  <option value="Y">Ya</option>
  <option value="N" selected>Tidak</option>
 </select></td></tr>
  <tr><td>ap_kursus</td>
 <td><input type="number" name="ap_kursus" min="0" max="2" style=" padding: 5px;width: 40%;" class="form-control"></td></tr>
  <tr><td>status</td>
<td><select name="status" style="padding: 5px;width: 40%;" class="form-control"> 
  <option value="Y">Ya</option>
  <option value="N">Tidak</option>
 </select></td></tr>
   <tr><td>aturan</td>
 <td><input type="number" name="aturan" min ="0" style="width: 40%;" class="form-control"></td></tr>
 </table><br>
<div class="text-center"><button formaction="/createprofile" formmethod="post" name="submit" class="btn btn-primary">Create A New Profile</button></div>
</form></td></tr>
    </table>
  </div>
 </div>
</div>
