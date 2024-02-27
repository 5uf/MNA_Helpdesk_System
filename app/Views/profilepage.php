<br>
<div class="align-top">
<div class="row justify-content-md-center">
<div class="col-lg-8">
<div class="card text-center">
<div class="card-header">
<strong><?= ucfirst($_SESSION['nama']) ?>'s Profile Page</strong></div>
<form action="/staff/updateprofile" method="post"> 
 <?= csrf_field() ?>
<?php if (! empty($profile) && is_array($profile)) : ?>
<?php foreach ($profile as $item): ?>
<div class="card-body card-block text-center">
 <div class="input-group">
 <div class="input-group-addon">Nama</div>
 <input class="form-control"type="text" name="nama" value="<?= esc($item->nama) ?>" ></div>
<div class="input-group">
 <div class="input-group-addon">No. KP-12</div>
 <input class="form-control"type="text" name="kp12" value="<?= esc($item->kp12) ?>" ></div>
 <div class="input-group">
 <div class="input-group-addon">No. KP-8</div>
 <input class="form-control"type="text" name="kp8" value="<?= esc($item->kp8) ?>" ></div>
 <div class="input-group">
 <div class="input-group-addon">Tarikh Lahir</div>
 <label class="input-group-addon" style="width: 20em; background: white; text-align: left;"><?= date("d/m/Y", strtotime($item->t_lahir)) ?> </label>
 <input class="form-control"type="date" name="t_lahir" ></div>
 <div class="input-group">
 <div class="input-group-addon">Jantina</div>
 <?php if ($item->jantina === "L"): ?>
 <input class="form-control"type="text" name="jantina" value="Lelaki"></div>
<?php else: ?>
 <input class="form-control"type="text" name="jantina" value="Perempuan"></div>
<?php endif ?>
 <div class="input-group">
 <div class="input-group-addon">Gred</div>
 <input class="form-control"type="text" name="gred" value="<?= esc($item->gred) ?>"></div>
 <div class="input-group">
 <div class="input-group-addon">Jawatan</div>
 <input class="form-control"type="text" name="jawatan" value="<?= esc($item->jawatan) ?>"></div>
 <div class="input-group">
 <div class="input-group-addon">Bahagian</div>
 <input class="form-control"type="text" name="bahagian" value="<?= esc($item->bahagian) ?>"></div>
 <div class="input-group">
 <div class="input-group-addon">Email</div>
 <input class="form-control"type="text" name="email" value="<?= esc($item->email) ?>"></div>
 <div class="input-group">
 <div class="input-group-addon">No. Tel Pejabat</div>
 <input class="form-control"type="text" name="no_tel_pej" value="<?= esc($item->no_tel_pej) ?>"></div>
 <div class="input-group">
 <div class="input-group-addon">No. Handphone</div>
 <input class="form-control"type="text" name="no_hp" value="<?= esc($item->no_hp) ?>"></div>
 <div class="input-group">
 <div class="input-group-addon">Alamat Rumah</div>
 <input class="form-control"type="text" name="alamat_rumah" value="<?= esc($item->alamat_rumah) ?>"></div>
 <div class="input-group">
 <div class="input-group-addon">Katalaluan</div>
 <input class="form-control"type="password" name="katalaluan" placeholder="Tukar Katalaluan" autocomplete="new-password"></div>
 <div class="card-footer">
 <?php if ($_SESSION['username'] === $item->username): ?>
 <button formaction="/staff/updateprofile/<?= esc($item->id_staff) ?>" formmethod="post" name="submit" class="btn btn-primary">
Update Profile</button></form>
<?php endif ?>

</div>

<?php endforeach ?>
<?php endif ?>
</div></div></div></div>
<style type="text/css">
  .input-group-addon {
    width: 9em;
  }
</style>
  
</div>