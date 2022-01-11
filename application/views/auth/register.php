<?php $this->load->view('corporate/header'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- ======= Hero Section ======= -->
<section id="pricing">
	<div class="container col-8">

		<h2>Daftar</h2>
		<form method="POST" action="<?= site_url('login/register') ?>">
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			</div>
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" name="nama_customer" class="form-control" id="nama">
			</div>
			<div class="form-group">
				<label for="phone_number">Nomor Telpon</label>
				<input type="text" name="phone_number" class="form-control" id="phone_number">
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<textarea name="alamat" id="alamat" required class="form-control"></textarea>
			</div>
			<div class="form-check">
			</div>
			<button type="submit" class="btn btn-primary">Daftar</button>
			<a class="btn btn-secondary float-right" href="<?= site_url('login/register_lapangan') ?>">Daftar sebagai Pemilik Lapangan</a>
		</form>
	</div>

</section><!-- End Hero -->