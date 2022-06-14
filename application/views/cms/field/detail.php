<?php $this->load->view('template/header'); ?>
<style type="text/css">
	.gagal {
		color: red;
	}
</style>
<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header row">
						<div class="col-sm-12 col-md-6">
							<h4 class="card-title">Detail Lapangan</h4>
						</div>
					</div>
					<div class="card-body">
						<form method="post" action="<?= site_url() ?>cms/type/edit/<?= $type->id ?>" enctype="multipart/form-data">
							<div class="form-group row">
								<label for="inp-title" class="col-sm-2 col-form-label">Nama Lapangan</label>
								<div class="col-sm-10">
									<?=$type->name?>
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-title" class="col-sm-2 col-form-label">Deskripsi</label>
								<div class="col-sm-10">
									<?=$type->note?>
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-title" class="col-sm-2 col-form-label">Fasilitas</label>
								<div class="col-sm-10">
									<?=$type->fasilitas?>
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-poster" class="col-sm-2 col-form-label">Foto</label>
								<div class="col-sm-4">
									<img src="<?= base_url() ?>asset/image/<?= $type->photo ?>" class="img-fluid">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('template/footer'); ?>