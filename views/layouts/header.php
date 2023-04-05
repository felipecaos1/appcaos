<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= BASE_URL ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= BASE_URL ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <li>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
                </a>
            </li>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <a class="nav-link" href="<?=BASE_URL?>usuario/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <a class="nav-link" href="<?=BASE_URL?>categorias/gestion">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Categorías</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo BASE_URL?>tarea/papelera">
                <i class="fas  fa-trash"></i>
                <span>Papelera</span></a>  
            </li>
            <li class="nav-item active">
                <!-- Divider -->
                <a class="nav-link" href="<?=BASE_URL?>usuario/logout">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>Cerrar sesion</span></a>
               
            </li>

        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <ul>
                        <?php if(isset($_SESSION['identity'])):?>
                            <li> Hola,<?php echo $_SESSION['identity']->nombre?></li>
                        <?php endif;?>
                    </ul>

                </nav>