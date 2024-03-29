<?php $this->load->view('corporate/header'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- ======= Hero Section ======= -->
<section id="about" class="about section-bg">
<!-- <section id="pricing" class="about section-bg"> -->
    <div class="container col-5 p-4 shadow bg-white aos-init aos-animate">
        <h2>Login <span>Futsal Cilapap</span></h2>
        <form method="POST" action="<?= site_url('login') ?>">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" id="" placeholder="Password">
            </div>
            <div class="form-check">
            </div>
            <button type="submit" class="btn w-100 btn-primary float-right">Login</button>
            <br>
            <br>
            <p>Belum punya akun?</p>
            <a class="btn btn-secondary w-100" href="<?= site_url('login/register') ?>">Daftar</a>
            <br>
            <br>
        </form>
        <br>

    </div>
</section><!-- End Hero -->