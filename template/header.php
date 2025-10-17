<?php
session_start();

require '../config/koneksi.php';

$url = explode("/", $_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard - Toko Kita</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/stisla/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/stisla/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../assets/stisla/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../assets/stisla/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="../assets/stisla/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="../assets/stisla/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet"
    href="../assets/stisla/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/stisla/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/stisla/css/style.css">
  <link rel="stylesheet" href="../assets/stisla/css/components.css">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?= $_SESSION['foto'] ?? '../assets/stisla/img/avatar/avatar-1.png' ?>"
                class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, <?= $_SESSION['nama'] ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="/logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="">Toko Kita</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="">TK</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?= ($url[1] == 'admin') ? 'active' : '' ?>"><a class="nav-link" href="/admin/index.php"><i
                  class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span></a></li>

            <li class="menu-header">Manajemen Data</li>
            <li class="<?= ($url[1] == 'kategori') ? 'active' : '' ?>"><a class="nav-link" href="/kategori/index.php"><i
                  class="fa fa-align-left"></i>
                <span>Data Kategori</span></a></li>
            <li class="<?= ($url[1] == 'produk') ? 'active' : '' ?>"><a class="nav-link" href="/produk/index.php"><i
                  class="fa fa-inbox"></i>
                <span>Data Produk</span></a></li>
            <li class="<?= ($url[1] == 'pelanggan') ? 'active' : '' ?>"><a class="nav-link"
                href="/pelanggan/index.php"><i class="fa fa-users"></i></i>
                <span>Data Pelanggan</span></a></li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="/logout.php" class="btn btn-danger btn-lg btn-block btn-icon-split">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a>
          </div>
        </aside>
      </div>