<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Futsal Cilacap</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('asset/image/futsal_cilacap.png') ?>" rel="icon">
    <link href="<?= base_url('asset/image/futsal_cilacap.png') ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>asset/corporate/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/corporate/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/corporate/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/corporate/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/corporate/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/corporate/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>asset/corporate/assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="<?= site_url() ?>">Futsal Cilacap</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="<?= site_url() ?>">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="<?= site_url('artikel') ?>">Artikel</a></li>
                    <li><a class="nav-link scrollto" href="<?= site_url('acara') ?>">Event</a></li>
                    <li><a class="nav-link scrollto" href="<?= site_url('lapangan') ?>">Lapangan</a></li>
                    <?php if ($this->session->isLogin == true) { ?>
                        <li class="nav-link dropdown"><a href="#"><span><?= $this->session->name ?></span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <?php if ($this->session->place_id && $this->session->role == 2) { ?>
                                    <li><a target="_blank" href="<?= site_url('cms/dashboard/field') ?>">CMS Pemilik Lapangan</a></li>
                                <?php } else { ?>
                                    <li><a target="_blank" href="<?= site_url('login/register_lapangan') ?>">Daftar Pemilik Lapangan</a></li>
                                <?php } ?>
                                <li><a href="<?= site_url('transaksi') ?>">Riwayat Sewa</a></li>
                                <li><a href="<?= site_url('login/logout') ?>">Logout</a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li><a class="nav-link scrollto" href="<?= site_url('login') ?>">Login</a></li>
                    <?php } ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->