<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url();?>assets/img/logo.png" type="image/x-icon">
  <title>Tienda</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free-6.4.2-web/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">

    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>
<body class="hold-transition  sidebar-mini sidebar-mini-md layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader   
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="<//?php echo base_url();?>assets/img/logo.png" height="60" width="60">
  </div> -->


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> 
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->    
       <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
          <!--span class="badge badge-warning navbar-badge">15</!--span-->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Mi Perfil</span>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url()?>usuarios/viewprofile/<?php echo $this->session->userdata('id_usuario'); ?> " class="dropdown-item">
            <i class="fa fa-gear mr-2"></i>Mis datos
            <!--span class="float-right text-muted text-sm">3 mins</!span-->
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('usuarios/password/'.$this->session->userdata('id_usuario')); ?>" class="dropdown-item">
            <i class="fa-solid fa-lock mr-2"></i> Actualizar Contaseña
            <!--span-- class="float-right text-muted text-sm">12 hours</!--span-->
          </a>        
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url();?>/auth/logout" class="dropdown-item ">
          <i class="fa-solid fa-right-from-bracket fa-lg mr-2"></i></ion-icon>Cerrar Session</a>
        </div>
      </li>


      <!--li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </!li>
      <li-- class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li-->
    </ul>
  </nav>
  <!-- /.navbar -->