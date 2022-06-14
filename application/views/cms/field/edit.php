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
							<h4 class="card-title">Edit Lapangan</h4>
						</div>
					</div>
					<div class="card-body">
						<form method="post" action="<?= site_url() ?>cms/type/edit/<?= $type->id ?>" enctype="multipart/form-data">
							<div class="form-group row">
								<label for="inp-title" class="col-sm-2 col-form-label">Nama Lapangan</label>
								<div class="col-sm-10">
									<input required type="text" class="form-control" name="name" id="inp-title" value="<?=$type->name?>" placeholder="Nama">
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-title" class="col-sm-2 col-form-label">Deskripsi</label>
								<div class="col-sm-10">
									<textarea required class="form-control" name="note" placeholder="Deskripsi"><?=$type->note?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-title" class="col-sm-2 col-form-label">Fasilitas</label>
								<div class="col-sm-10">
									<textarea required class="form-control" name="fasilitas" placeholder="Fasilitas"><?=$type->note?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-poster" class="col-sm-2 col-form-label">Foto</label>
								<div class="col-sm-10">
									<img src="<?= base_url() ?>asset/image/<?= $type->photo ?>" class="img-fluid">
									<input type="file" class="form-control" name="photo" id="inp-poster">
								</div>
							</div>
							<input required type="hidden" class="form-control" name="place_id" id="inp-writer_id" value="<?= $this->session->place_id ?>">
							<div class="form-group row">
								<label for="inp-submit" class="col-sm-2 col-form-label"></label>
								<div class="col-sm-10">
									<button type="submit" class="btn btn-primary btn-block">Submit</button>
									<!-- <input type="submit" name="submit" class="btn btn-primary btn-block" value="Create"> -->
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