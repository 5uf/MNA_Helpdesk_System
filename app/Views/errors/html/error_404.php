<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Muhammad Sufi Afifi">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="2;url=<?= base_url()?>/menu" />
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link href="styll.css" rel="stylesheet" media="all">
    <link rel="icon" type="image/png" sizes="32x32" href="logo_stm.png">
  <title>Helpdesk - ANM</title>
</head>
		<style>
		div.logo {
			height: 200px;
			width: 155px;
			display: inline-block;
			opacity: 0.08;
			position: absolute;
			top: 2rem;
			left: 50%;
			margin-left: -73px;
		}
		body {
			height: 100%;
			background: #fafafa;
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			color: #777;
			font-weight: 300;
		}
		h1 {
			font-weight: lighter;
			letter-spacing: 0.8;
			font-size: 3rem;
			margin-top: 0;
			margin-bottom: 0;
			color: #222;
		}
		.wrap {
			max-width: 1024px;
			margin: 5rem auto;
			padding: 2rem;
			background: #fff;
			text-align: center;
			border: 1px solid #efefef;
			border-radius: 0.5rem;
			position: relative;
		}
		pre {
			white-space: normal;
			margin-top: 1.5rem;
		}
		code {
			background: #fafafa;
			border: 1px solid #efefef;
			padding: 0.5rem 1rem;
			border-radius: 5px;
			display: block;
		}
		p {
			margin-top: 1.5rem;
		}
		.footer {
			margin-top: 2rem;
			border-top: 1px solid #efefef;
			padding: 1em 2em 0 2em;
			font-size: 85%;
			color: #999;
		}
		a:active,
		a:link,
		a:visited {
			color: #dd4814;
		}
	</style>
<?php
include "dbconn.php";  // Using database connection file here
date_default_timezone_set("Asia/Kuala_Lumpur");
setlocale(LC_ALL,'ms_MY');
$time=date(" D, d-M-Y"); ?>
<body class="animsition">
    <div class="wrapper">
        <!-- Page Content  -->
        <div id="content">
             <!-- MAIN CONTENT-->
               <div class="align-top">
                    <div class="row">
                    	<div class="col-md-12">
                    
	<div class="wrap">
		
		<h3>You will be redirected to the system</h3>

		<p>
			<?php if (! empty($message) && $message !== '(null)') : ?>
				<h1>An Error Has Occur</h1>
			<?php else : ?>
				Sorry! Cannot seem to find the page you were looking for.
			<?php endif ?>
		</p>
	</div>

                    	</div>
                    </div> 
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
      </div>
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
  </head>
</body>
</html>
<!-- end document-->
