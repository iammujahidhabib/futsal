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
							<h4 class="card-title">Detail Artikel</h4>
						</div>
					</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="inp-title" class="col-sm-2 col-form-label">Judul</label>
							<div class="col-sm-10">
								<?= $article->title ?>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4">
								<label for="inp-image" class="col-sm-2 col-form-label">Gambar</label>
							</div>
							<div class="col-sm-4">
								<img src="<?= base_url() ?>asset/image/article/<?= $article->image ?>" class="img-fluid">
							</div>
						</div>
						<div class="form-group row">
							<label for="inp-text" class="col-sm-2 col-form-label">Teks</label>
							<div class="col-sm-10">
								<?= $article->text ?>
							</div>
						</div>
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