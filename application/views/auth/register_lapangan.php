<?php $this->load->view('corporate/header'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- ======= Hero Section ======= -->
<section id="pricing">
	<div class="container col-8">

		<h2>Daftar Akun Futsal Cilapap sebagai Pemilik Lapangan</h2>
		<form method="POST" action="<?= site_url('login/register_lapangan/') ?>">
			<div class="form-group">
				<label for="nama">Nama Tempat</label>
				<input type="text" name="name" class="form-control" id="nama">
			</div>
			<div class="form-group row">
				<div class="col-lg-6">
					<label class="" for="formGroupExampleInput2">Jam Buka</label>
					<select name="open" class="form-control col-sm-10" id="formGroupExampleInput2" placeholder="Another input placeholder">
						<?php for ($j = 0; $j < 24; $j++) { ?>
							<option value="<?= $j ?>"><?= ($j < 10) ? '0' . $j . ':00' : $j . ':00' ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-lg-6">
					<label class="" for="formGroupExampleInput2">Jam Tutup</label>
					<select name="close" class="form-control col-sm-10" id="formGroupExampleInput2" placeholder="Another input placeholder">
						<?php for ($j = 0; $j < 24; $j++) { ?>
							<option value="<?= $j ?>"><?= ($j < 10) ? '0' . $j . ':00' : $j . ':00' ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="phone_number">Nomor Telpon</label>
				<input type="text" name="phone" class="form-control" id="phone_number">
			</div>
			<div class="form-group">
				<label for="alamat">Deskripsi</label>
				<textarea name="desc" id="alamat" required class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<textarea name="address" id="alamat" required class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label for="photo">Foto</label>
				<input type="file" name="photo" class="form-control" id="photo">
			</div>
			<div class="form-group">
				<label for="asdasd">Bank</label>
				<select class="form-control" required name="bank" id="asdasd">
					<option value="" disabled selected>Pilih Bank</option>
					<option value="BCA">BCA</option>
					<option value="Mandiri">Mandiri</option>
					<option value="BNI">BNI</option>
					<option value="BRI">BRI</option>
				</select>
			</div>
			<div class="form-group">
				<label for="aaaasdasd">Nomor Rekening</label>
				<input type="text" id="aaaasdasd" class="form-control" name="bank_account" required>
			</div>
			<div class="form-group">
				<label for="asadsdasd">Nama Rekening</label>
				<input type="text" id="asadsdasd" class="form-control" name="bank_name" required>
			</div>
			<div class="form-check">
			</div>
			<button type="submit" class="btn w-100 btn-primary">Daftar</button>
		</form>
	</div>

</section><!-- End Hero -->