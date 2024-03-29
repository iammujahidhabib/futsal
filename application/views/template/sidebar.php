<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-light bg-dark elevation-4 text-white">
  <!-- Brand Logo -->
  <a href="#" class="brand-link text-white text-center">
    <span class="brand-text font-weight-bold">CMS Futsal Cilacap</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-5 text-white">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <?php if ($this->session->role == 1) { ?>
          <li class="nav-item">
            <a href="<?= base_url() ?>cms/dashboard/admin/" class="nav-link <?php if ($this->session->func == 'dash') { ?> active<?php } ?>">
              <i class="fa fa-tachometer-alt nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>cms/place" class="nav-link <?php if ($this->session->func == 'dailytimesheetcreate') { ?> active<?php } ?>">
              <!-- <i class="far fa-clipboard nav-icon"></i> -->
              <i class="fa fa-circle nav-icon"></i>
              <p>Data Tempat</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>cms/player" class="nav-link <?php if ($this->session->func == 'dailytimesheetcreate') { ?> active<?php } ?>">
              <!-- <i class="far fa-clipboard nav-icon"></i> -->
              <i class="fa fa-circle nav-icon"></i>
              <p>Data Pengguna</p>
            </a>
          </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>cms/event" class="nav-link <?php if ($this->session->func == 'dailytimesheetcreate') { ?> active<?php } ?>">
            <!-- <i class="far fa-clipboard nav-icon"></i> -->
            <i class="fa fa-circle nav-icon"></i>
            <p>Data Event</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>cms/article" class="nav-link <?php if ($this->session->func == 'dailytimesheetcreate') { ?> active<?php } ?>">
            <!-- <i class="far fa-clipboard nav-icon"></i> -->
            <i class="fa fa-circle nav-icon"></i>
            <p>Data Artikel</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>cms/booking" class="nav-link <?php if ($this->session->func == 'dailytimesheetcreate') { ?> active<?php } ?>">
            <!-- <i class="far fa-clipboard nav-icon"></i> -->
            <i class="fa fa-circle nav-icon"></i>
            <p>Data Sewa Lapangan</p>
          </a>
        </li>
        <?php } elseif ($this->session->role == 2) { ?>
          <li class="nav-item">
            <a href="<?= base_url() ?>cms/dashboard/field/" class="nav-link <?php if ($this->session->func == 'dash') { ?> active<?php } ?>">
              <i class="fa fa-tachometer-alt nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <?php if ($this->session->status_place != 0) { ?>
            <li class="nav-item">
              <a href="<?= base_url() ?>cms/place" class="nav-link <?php if ($this->session->func == 'place') { ?> active<?php } ?>">
                <!-- <i class="far fa-clipboard nav-icon"></i> -->
                <i class="fa fa-circle nav-icon"></i>
                <p>Tempatku</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>cms/booking" class="nav-link <?php if ($this->session->func == 'dailytimesheetcreate') { ?> active<?php } ?>">
                <!-- <i class="far fa-clipboard nav-icon"></i> -->
                <i class="fa fa-circle nav-icon"></i>
                <p>Transaksi Sewa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>cms/type" class="nav-link <?php if ($this->session->func == 'dailytimesheetcreate') { ?> active<?php } ?>">
                <!-- <i class="far fa-clipboard nav-icon"></i> -->
                <i class="fa fa-circle nav-icon"></i>
                <p>Lapangan & Harga</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>cms/event" class="nav-link <?php if ($this->session->func == 'dailytimesheetcreate') { ?> active<?php } ?>">
                <!-- <i class="far fa-clipboard nav-icon"></i> -->
                <i class="fa fa-circle nav-icon"></i>
                <p>Event</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>cms/article" class="nav-link <?php if ($this->session->func == 'dailytimesheetcreate') { ?> active<?php } ?>">
                <!-- <i class="far fa-clipboard nav-icon"></i> -->
                <i class="fa fa-circle nav-icon"></i>
                <p>Artikel</p>
              </a>
            </li>
          <?php } ?>
        <?php } ?>
      </ul>
      <hr>
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?= base_url() ?>login/logout" class="nav-link">
            <!-- <i class="far fa-clipboard nav-icon"></i> -->
            <i class="fa fa-circle nav-icon"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>