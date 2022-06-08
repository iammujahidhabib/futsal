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
							<h4 class="card-title">Buat Event</h4>
						</div>
					</div>
					<div class="card-body">
						<form method="post" action="<?= site_url() ?>cms/event/create/" enctype="multipart/form-data">
							<div class="form-group row">
								<label for="inp-title" class="col-sm-2 col-form-label">Judul</label>
								<div class="col-sm-10">
									<input required type="text" class="form-control" name="title" id="inp-title" placeholder="title">
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-poster" class="col-sm-2 col-form-label">Poster</label>
								<div class="col-sm-10">
									<input required type="file" class="form-control" name="poster" id="inp-poster">
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-form" class="col-sm-2 col-form-label">Formulir</label>
								<div class="col-sm-10">
									<input type="file" class="form-control" name="form" id="inp-form">
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-start" class="col-sm-2 col-form-label">Tanggal Mulai</label>
								<div class="col-sm-10">
									<input required type="date" class="form-control" name="start" id="inp-start">
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-end" class="col-sm-2 col-form-label">Tanggal Selesai</label>
								<div class="col-sm-10">
									<input required type="date" class="form-control" name="end" id="inp-end">
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-desc" class="col-sm-2 col-form-label">Deskripsi</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="desc" id="inp-desc"></textarea>
								</div>
							</div>
							<input required type="hidden" class="form-control" name="field_id" id="inp-writer_id" value="<?=$this->session->id?>">
							<div class="form-group row">
								<label for="inp-submit" class="col-sm-2 col-form-label"></label>
								<div class="col-sm-10">
									<button type="submit" class="btn btn-primary btn-block">Submit</button>
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
		selector: '#inp-desc'
	});
</script>
<?php $this->load->view('template/footer'); ?>