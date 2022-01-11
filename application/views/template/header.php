<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- <link rel="icon" type="image/ico" href="<?= base_url() . 'asset/images/logo_pertamina.png'; ?>">  -->

  <title>e-JOTS | electronic Job Time Sheet</title>

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>asset/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/adminLTE/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>asset/fontawesome/css/all.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/adminLTE/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
  <div class="wrapper">
    <?php $this->load->view('template/nav'); ?>
    <?php $this->load->view('template/sidebar'); ?>
    <?php $this->load->view('template/wrap'); ?>
    <script src="<?= base_url() ?>asset/adminLTE/plugins/jquery/jquery.min.js"></script>