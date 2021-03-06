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
							<h4 class="card-title">Buat Artikel</h4>
						</div>
					</div>
					<div class="card-body">
						<form method="post" action="<?= site_url() ?>cms/article/create/" enctype="multipart/form-data">
							<div class="form-group row">
								<label for="inp-title" class="col-sm-2 col-form-label">Judul</label>
								<div class="col-sm-10">
									<input required type="text" class="form-control" name="title" id="inp-title" placeholder="judul">
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-image" class="col-sm-2 col-form-label">Gambar</label>
								<div class="col-sm-10">
									<input required type="file" class="form-control" name="image" id="inp-image">
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-text" class="col-sm-2 col-form-label">Teks</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="text" id="inp-text"></textarea>
								</div>
							</div>
							<input required type="hidden" class="form-control" name="date" id="inp-date" value="<?=date('Y-m-d H:i:s')?>">
							<input required type="hidden" class="form-control" name="writer_id" id="inp-writer_id" value="<?=$this->session->id?>">
							<input required type="hidden" class="form-control" name="writer" id="inp-writer" value="<?=$this->session->role?>">
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
		selector: '#inp-text'
	});
</script>
<?php $this->load->view('template/footer'); ?>