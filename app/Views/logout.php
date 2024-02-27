<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$time=date(" d/m/Y - h:i A");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Muhammad Sufi Afifi">
    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>
<style type="text/css">
     .card {
      background-color: white;
      border-radius: 5px;
      height: 40%;
      flex-direction: column;
      align-items: center;
      color: darkgrey;
      margin: 0 7px;
      width: 31%;
      box-shadow: inset 0 0 0 4px #c2c2c2;
      -webkit-transition: color 0.25s 0.0833333333s;
      transition: color 0.25s 0.0833333333s;
      overflow-y: hidden;
      overflow-x: hidden;
    }
</style>
<body class="animsition" onload="decrement()" style="
  background: radial-gradient(circle at center, 
    darkcyan, rgb(77, 136, 212), darkblue),100%;
  height: 70vh;
  font-family: New Times Roman;
  color: black;">    
   <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" style="height: 4.7em;" id="collapse">  
        <div class="container-fluid">
        <div class="logo">
          <img src="/logo_stm.png" style="width: 11em; height: 11em; margin-left: 40px;margin-top: 10px;" />
            </div>
            <img src="/bannerANM.png" style="height: 70px; " />
           <div class="text" >
           <h4 align="right"><?= $time ?></h4>
           <h6 align="right">Emel : stm@arkib.gov.my</h6> 
           <h6 align="right"> Tel : 03-62090711 / 745</h6></div> 
      </div>
  </nav>    
    <div class="card" style="margin-left: 35%; margin-top: 5%; border: thin solid green; border-radius:10%; height: 20em;">
        <br>
        <div class="row justify-content-md-center">
            <form><h4 style="font-family: times new roman;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Redirecting to ANM in <input type="text" size="3" id="timer" name="redirect2" value="4"></h4></form>
        </div>
        <div class="row justify-content-md-center">
       <div class="card-body">
        <div class="logo" align="center">
             <img src="/logo_stm.png"  style="width: 10em; height: 10em; " />       
       </div>
        <div class="alert alert-success">
        <h5>Anda Telah Dilog Keluar Dari Sistem</h5>
    </div>
            </div>
         </div>
    </div>
   
    <div class="card-footer">
         <div class="btn" style="margin-left: 42%;">
               <a href="/" class="btn btn-success ">Kembali Ke Laman Utama</a>
          </div>
       </div>   
</body>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
   <script type="text/javascript">
var targetURL="http://www.arkib.gov.my/web/guest/home"
var currentsecond=5;
function countredirect(){
if (currentsecond!=1){
currentsecond-=1
document.getElementById('timer').value=currentsecond;
}
else{
window.location=targetURL;
return
}
setTimeout("countredirect()",1000)
}
countredirect();
    </script>

</body>

</html>
<!-- end document-->