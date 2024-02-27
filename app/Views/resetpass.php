<?php
include "dbconn.php";  // Using database connection file here
$sql="select username from staff where aturan != 0 ";
$re = mysqli_query($dbconn, $sql);  // Use select query here 
?>
<div class="row justify-content-md-center">
      <div class="col-lg-6">
            <div class="card">
                <div class="card-header" align="center">Reset User Password</div>
                   <div class="card-body">
                                        <form action="/reset" method="post">
                                            <?= csrf_field() ?>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1"><b>*Tukar Katalaluan Untuk:</b>&nbsp;</label>
                                                <select name="username" required>
                                                  <option disabled selected>Cari Pengguna</option>
                                                  <?php
                                                   while($data = mysqli_fetch_assoc($re)){
                                                    echo "<option value='". $data['username'] ."'>". $data['username'] ."</option>";  // displaying data in option menu
                                                  } ?></select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Enter New Password</label>
                                                <input name="password1" type="password" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Confirm New Password</label>
                                                <input name="password2" type="password" class="form-control" required>
                                            </div>
                                            <div class="btn btn-lg btn-info btn-block">
                                                <button type="submit" style="color: white;" formnovalidate>
                                                    <span>Change Passsword</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                     <script>
          
            // Function to check Whether both passwords
            // is same or not.
            function checkPassword(form) {
                password1 = form.password1.value;
                password2 = form.password2.value;
  
                // If password not entered
                if (password1 == '' && password2 == '')
                    alert ("No Password Entered");
                else if (password1 == '')
                    alert ("Please enter New Password for the Selected User");
                // If confirm password not entered
                else if (password2 == '')
                    alert ("Please enter 2nd password For Confirmation");
                // If Not same return False.    
                else if (password1 != password2) {
                    alert ("\nPassword did not match: Please try again...")
                    return false;
                }
               
                // If same return True.
            }
        </script>
        <style>
            .gfg {
                font-size:40px;
                color:green;
                font-weight:bold;
                text-align:center;
            }
            .geeks {
                font-size:17px;
                text-align:center;
                margin-bottom:20px;
            }
        </style>


