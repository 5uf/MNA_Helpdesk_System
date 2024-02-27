<div class="align-top">
<div class="container-fluid">
 <div class="row justify-content-md-right m-t-30">
<div class="col-md-12">
<nav class="navbar navbar-expand-sm sticky-top navbar-light bg-light">
<div class="container-fluid">
<div class="align-right"> 
<button class="btn btn-primary"><a href="/staff/task/1" style="color: white;">Belum Selesai</a></button>
<button class="btn btn-primary"><a href="/staff/task/2" style="color: white;">Selesai</a></button>
</div></div></nav>
</div></div><br>
  <div class="row justify-content-md-center">
 <div class="col-lg-6">
  <div class="card">
   <div class="card-header text-center">
     <strong>Tambah Tugasan Harian</strong></div>
      <div class="card-body card-block">
      <form action="/staff/addtask" method="post" class="form-horizontal">
        <?= csrf_field() ?>
        <div class="row form-group">
          <div class="col col-md-3">
           <label for="textarea-input" class=" form-control-label">Tugasan</label></div>
           <div class="col-12 col-md-9">
           <textarea name="tugasan" id="textarea-input" rows="5" class="form-control"></textarea>
          </div>
         </div>
        
         <div class="row form-group">
          <div class="col col-md-3">
           <label class=" form-control-label">Dari:&nbsp;</label></div>
           <div class="col-12 col-md-9">
           <input type="date" name="date1" class="form-control">
          </div></div>
          
          <div class="row form-group">
          <div class="col col-md-3">
           <label class=" form-control-label">Sehingga:&nbsp;</label></div>
           <div class="col-12 col-md-9">
           <input type="date" name="date2" class="form-control">
          </div>
          </div>

           <div class="row form-group">
          <div class="col col-md-3">
           <label for="textarea-input" class=" form-control-label">Tempat</label></div>
           <div class="col-12 col-md-9">
           <textarea name="tempat" id="textarea-input" rows="1"wrap class="form-control"></textarea>
          </div>
         </div>

          <div class="row form-group">
          <div class="col col-md-3">
           <label for="textarea-input" class=" form-control-label">Kuantiti</label></div>
           <div class="col-12 col-md-9">
           <textarea name="kuantiti" id="textarea-input" rows="1" wrap class="form-control"></textarea>
          </div>
         </div>

          <div class="row form-group">
          <div class="col col-md-3">
           <label for="textarea-input" class=" form-control-label">Catatan</label></div>
           <div class="col-12 col-md-9">
           <textarea name="catatan" id="textarea-input" rows="5" wrap class="form-control"></textarea>
          </div>
         </div>
       </div>
     <div class="card-footer text-center">
        <input class="au-btn au-btn--blue " type="submit" name="Tambah">
            &nbsp;&nbsp;&nbsp;
        <input class="au-btn au-btn--blue " type="reset" name="Reset">
        </div>
     </div>
   </div>
</div>
</div>    
</form>
</div>