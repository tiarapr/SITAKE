<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>SITAKE - Sistem Informasi Tabungan Kelas</title>

  <!-- Favicons -->
  <link href="../assets/img/icon/save.png" rel="icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
    ======================================================= -->
  </head>

  <body>
    <!-- cek apakah sudah login -->
    <?php
    include ("../koneksi/koneksi.php"); 
    session_start();
    if($_SESSION['status']!="login"){
      header("location:../login/login-admin.php?pesan=belum_login");
    }
    if($_SESSION['level']!="Admin"){
      header("location:../login/login-admin.php?pesan=belum_login");
    }
    ?>
    <section id="container">