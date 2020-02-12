<?php if(!isset($_SESSION['login_admin'])){

  redirect(base_url()."Admin_login");

} ?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>TCG | Dashboard</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin_assets/plugins/fontawesome-free/css/all.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Tempusdominus Bbootstrap 4 -->

  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- iCheck -->

  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- JQVMap -->

  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin_assets/plugins/jqvmap/jqvmap.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin_assets/dist/css/adminlte.min.css">

  <!-- overlayScrollbars -->

  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <!-- Daterange picker -->

  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin_assets/plugins/daterangepicker/daterangepicker.css">

  <!-- summernote -->

  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin_assets/plugins/summernote/summernote-bs4.css">

  <!-- Google Font: Source Sans Pro -->

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- jQuery -->

  <script src="<?= base_url(); ?>assets/admin_assets/plugins/jquery/jquery.min.js"></script>

  

  <!--  data table -->

  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">


  <!-- custom style -->

  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin_assets/dist/css/custom.css">

  <!-- end -->

</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">



  <!-- Navbar -->

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->

    <ul class="navbar-nav">

      <!-- <li class="nav-item">

        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>

      </li>

      <li class="nav-item d-none d-sm-inline-block">

        <a href="index3.html" class="nav-link">Home</a>

      </li>

      <li class="nav-item d-none d-sm-inline-block">

        <a href="#" class="nav-link">Contact</a>

      </li> -->

    </ul>



    <!-- SEARCH FORM -->

    <form class="form-inline ml-3">

      <div class="input-group input-group-sm">

        <!-- <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">

        <div class="input-group-append">

          <button class="btn btn-navbar" type="submit">

            <i class="fas fa-search"></i>

          </button>

        </div> -->

      </div>

    </form>



    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">

      <li class="nav-item">

        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">

          <!-- <i class="fas fa-th-large"></i> -->

        </a>

      </li>

    </ul>

  </nav>

  <!-- /.navbar -->