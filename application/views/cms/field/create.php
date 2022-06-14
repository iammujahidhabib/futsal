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
							<h4 class="card-title">Buat Lapangan</h4>
						</div>
					</div>
					<div class="card-body">
						<form method="post" action="<?= site_url() ?>cms/type/create/" enctype="multipart/form-data">
							<div class="form-group row">
								<label for="inp-title" class="col-sm-2 col-form-label">Nama Lapangan</label>
								<div class="col-sm-10">
									<input required type="text" class="form-control" name="name" id="inp-title" placeholder="title">
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-poster" class="col-sm-2 col-form-label">Foto</label>
								<div class="col-sm-10">
									<input required type="file" class="form-control" name="photo" id="inp-poster">
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-note" class="col-sm-2 col-form-label">Deskripsi</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="note" id="inp-note" required></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-note" class="col-sm-2 col-form-label">Fasilitas</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="fasilitas" id="inp-note" required></textarea>
								</div>
							</div>
							<input required type="hidden" class="form-control" name="place_id" id="inp-writer_id" value="<?=$this->session->place_id?>">
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
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
	tinymce.init({
		selector: '#inp-text'
	});
</script>
<?php $this->load->view('template/footer'); ?>