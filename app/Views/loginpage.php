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
    html{
        scroll-behavior: smooth; overflow-y: hidden;
    }
</style>
<?php
include "dbconn.php";  // Using database connection file here
date_default_timezone_set("Asia/Kuala_Lumpur");
setlocale(LC_ALL,'ms_MY');
$time=date(" Y/m/d - h:i A");
?>
<body class="animsition">
    <div class="page-wrapper" >
        <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" style="height: 4.7em; ">  
        <div class="container-fluid">
        <div class="logo">
         <img src="./logo_stm.png"  style="width: 11em; height: 11em; margin-left: 40px;margin-top: 10px;" />
            </div>
            <img src="./bannerANM.png" style="height: 70px; " />
           <div class="text" id="collapse">
           <h4 align="right"><?= $time ?></h4>
           <h6 align="right">Emel : stm@arkib.gov.my</h6> 
           <h6 align="right"> Tel : 03-62090711 / 745</h6></div> 
      </div>
  </nav>
  <div class="align-center">
        <div class="page-content--bge5" style="background: radial-gradient(circle at center, 
    cyan, rgb(77, 136, 212), blue),100%;">
            <div class="container-fluid">
                <form action="/login" method="post">
                     <?= csrf_field() ?>
                <div class="login-wrap" style="width: 18em;">
                     <div id="message"></div>
                    <div class="login-content text-center" style="box-shadow: inset 0px 6px 6px 2px rgba(0,0,0,.16),inset 0px -2px 4px 3px rgba(255,255,255,.45);">
                        <div class="card" style=" height: 2xem;box-shadow: inset 1px 1px 1px 1px rgba(0,0,0,.16),inset 0px -2px 4px 3px rgba(255,255,255,.45); background: lightgray;"><h3 align="center" style=" font-family: Times New Roman  ;" >Log Masuk Staf</h3></div><hr>
                        <div class="login-form">
                                <div class="form-group text-center">
                                    <label><b>Nama Pengguna</b></label>
                                    <input class="form-control" type="user" name="username" style="text-align:center;" >
                                </div>
                                <div class="form-group">
                                    <label><b>Katalaluan</b></label>
                                    <input class="form-control" type="password" name="password" style="text-align:center;">
                                </div>
                            
                        </div>
                    </div>
                    <div style="margin-left: 1em; margin-top: 1em; ">
                                <input class="au-btn au-btn--blue " type="submit" name="Log Masuk">
                                &nbsp;&nbsp;&nbsp;
                                 <input class="au-btn au-btn--blue " type="reset" name="Reset">
                    </div>
                </div></form>
                <div id="message"></div>
                 <div class="row">
                          <div class="col text-left">
                               <a href="/" style="color:white;"><u><<< Kembali ke Laman Utama</u></a> 
                               &nbsp;&nbsp;&nbsp;</div>
                              <!--<a href="/login2" style="color:white;"><u> Admin Login >>></u></a>-->
                          
                        </div>
                
            </div>
        </div>
</div>
    </div>

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
    <?php if (isset($message)) : ?>
        <script type="text/javascript">
        const para = document.createElement("div");
        para.innerHTML = "<?= $message ?>";
        document.getElementById("message").appendChild(para);
    </script>
    <?php endif ?>
</body>
</html>
<!-- end document-->