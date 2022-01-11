<?php $this->load->view('corporate/header'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- ======= Hero Section ======= -->
<section id="pricing">
    <div class="container col-4">
        <h2>Login <span>Admin</span></h2>
        <form method="POST" action="<?= site_url('login/admin') ?>">
            <div class="form-group">
                <label for="">Email address</label>
                <input type="email" name="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" id="" placeholder="Password">
            </div>
            <div class="form-check">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <a class="btn btn-secondary float-right" href="<?= site_url('login/field') ?>">Login Lapangan</a>
            <a class="btn btn-secondary float-right" href="<?= site_url('login') ?>">Login Player</a>
        </form>
        <br>
        <a class="btn btn-secondary float-right" href="<?= site_url('login/register') ?>">Daftar</a>

    </div>
</section><!-- End Hero -->