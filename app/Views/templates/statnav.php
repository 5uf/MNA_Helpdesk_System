<div class="align-top">
<div class="row justify-content-md-center ">
 <div class="col-md-18">
  <div class="table-responsive m-b-10">
  <table class="table table-border">
   <tbody>
 <tr>
 <td>
<select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
  <option disabled selected>Senarai Laporan</option>
  <?php
        $max = date('Y');
        $min = date('Y') - 5;
        while($max+1 != $min){
            echo "<option value= /report/annual/".$max.">".$max."</option>";// displaying data in option menu
            $max--; }
?></select>
</td>
 <td>
<select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
  <option disabled selected>Statistik</option>
  <?php
        $max = date('Y');
        $min = date('Y') - 5;
        while($max+1 != $min){
            echo "<option value= /report/stats/".$max.">".$max."</option>";// displaying data in option menu
            $max--; }
?></select>
</td>
<td>
<select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
  <option disabled selected>Laporan ISO</option>
  <?php
        $max = date('Y');
        $min = date('Y') - 5;
        while($max+1 != $min){
            echo "<option value= /report/isoreport/".$max.">".$max."</option>";// displaying data in option menu
            $max--; }
?></select>
</td>
</tr>
  </tbody>
  </table>
   </div>
  </div>
</div>  
</div>