<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="<?= base_url('notif/') ?>">
        <i class="fas fa-bell"></i>
        <span class="badge badge-danger"><?= $this->session->userdata('get_notif'); ?></span>
      </a>
    </li> -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <?=$this->session->name?>
      </a>
      <div class="dropdown dropdown-menu dropdown-menu-right">
        <!-- <a href="<?= base_url() ?>admin/profile" class="dropdown-item">
          Profil Saya
        </a> -->
        <hr>
        <a href="<?= base_url() ?>login/logout" class="dropdown-item">Logout</a>
      </div>
    </li>
  </ul>
</nav>