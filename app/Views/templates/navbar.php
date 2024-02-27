<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Muhammad Sufi Afifi">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="/css/theme.css" rel="stylesheet" media="all">
     <link href="/styll.css" rel="stylesheet" media="all">
    <link rel="icon" type="image/png" sizes="32x32" href="/logo_stm.png">
  <title>Helpdesk - ANM</title>
</head>
<style type="text/css">
body{
    overflow-x: hidden;
    overflow-y: scroll;
    color: black;
}
.navbar-sidebar li.hover {
  color: maroon;
  text-align: center;
}
  @media (min-width: 992px) {
    #menu-sidebar {
        margin-left: -300px;
    }
    #menu-sidebar.active {
        margin-left: 0;
        position: fixed;
    }
    #sidebar {
        margin-left: -300px;
    }
    #sidebar.active {
        margin-left: 0;
    }
    #sidebarCollapse span {
        display: none;
    }
</style>
<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
setlocale(LC_ALL,'ms'); 
$time = strftime("%A, %e %B %Y");?>
<body>
        <div class="wrapper">
        <!-- MENU SIDEBAR-->
        <nav id="sidebar">
          <aside class="menu-sidebar" id="menu-sidebar">
             <div class="logo">
            <img src="/logo_stm.png" style="width: 10em; height: 10em; margin-left: 40px;margin-top: 10px;" alt="Sistem Helpdesk">&nbsp;&nbsp;&nbsp;          
            </div>
            <div class="menu-sidebar__content js-scrollbar1 position-relative">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list ">
                        <li><h5>Nama:<br> <?= $_SESSION['nama']?></h5><br></li>

                        <?php if($_SESSION['admin'] === "Y"): ?>
                            <li><button class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;Admin</button></li>
                        <?php else: ?>
                            <li><button class="btn btn-primary">Pengguna</button></li>
                        <<?php endif ?>                                 
                        <li>
                            <a href="/menu"><i class="fas fa-home"></i>Menu Utama</a>
                        </li>
                         <li>
                            <a href="/report"><i class="fas fa-chart-bar"></i>Cari Laporan</a>
                        </li>
                        <li>
                            <a href="/iplist"><i class="fas fa-table"></i>Senarai IP</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>/report/laporan"><i class="far fa-check-square"></i>Laporan</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tasks"></i>Tugasan</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                    <a href="<?= base_url() ?>/staff/task/list"><i class="fas fa-list"></i>Tugasan Staf</a>
                                </li>
                               <li>
                                    <a href="<?= base_url() ?>/staff/task/1"><i class="fas fa-circle-notch"></i>Belum Selesai</a>
                                </li>
                                <li>
                                   <a href="<?= base_url() ?>/staff/task/2/" ><i class="fas fa-check-circle"></i>Telah Selesai</a>
                                </li>
                                 <li>
                                    <a  href="<?= base_url() ?>/staff/task/new" ><i class="fas fa-plus-square"></i>Tambah Baru</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>/staff/profile/<?= $_SESSION['id']?>"><i class="fas fa-user"></i>Profil</a>
                        </li>
                         <?php if ($_SESSION['admin'] == "Y") : ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-lock"></i>Admin</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?= base_url() ?>/staff/users"><i class="fas fa-users"></i></i>Senarai Staf</a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>/staff/create"><i class="fas fa-user-plus"></i>Daftar Staf</a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>/staff/reset"><i class="fas fa-key"></i>Tukar Katalaluan</a>
                                </li>

                            </ul>
                        </li>
                        <?php endif ?>
                         <li>
                            <a href="/logout"><i class="fas fa-sign-out-alt"></i>Log Keluar</a>
                        </li>
                    </ul>
                </nav>
            </div> 
          </aside>
        </nav>

        <!-- Page Content  -->
        <div id="content" style="overflow-x: hidden;">
            <nav class="navbar navbar-expand-xl sticky-top navbar-light bg-light" style="border: thin dimgray; border-radius: 5px;">
                <div class="container-fluid" style="height: 3.8em;">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-justify" id="icon"></i>
                    </button>
                <h5 align="right"><?= $time ?></h5>  
                </div>
            </nav>
