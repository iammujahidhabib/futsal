<?php $this->load->view('corporate/header'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- ======= Hero Section ======= -->
<section id="about" class="about section-bg">
    <div class="container col-5 p-4 shadow bg-white aos-init aos-animate">
	<!-- <div class="container col-4"> -->
		<h2>Daftar Akun Futsal Cilapap</h2>
		<form method="POST" action="<?= site_url('login/register') ?>">
			<div class="form-group">
				<label for="exampleInputEmail1">Email </label>
				<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			</div>
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" name="name" class="form-control" id="nama">
			</div>
			<div class="form-group">
				<label for="phone_number">Nomor Telpon</label>
				<input type="text" name="phone_number" class="form-control" id="phone_number">
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<textarea name="address" id="alamat" required class="form-control"></textarea>
			</div>
			<div class="form-check">
			</div>
			<button type="submit" class="btn w-100 btn-primary">Daftar</button>
		</form>
	</div>

</section><!-- End Hero -->