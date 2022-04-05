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
							<h4 class="card-title">Edit Article</h4>
						</div>
					</div>
					<div class="card-body">
						<form method="post" action="<?= site_url() ?>cms/article/edit/<?= $article->id ?>" enctype="multipart/form-data">
							<div class="form-group row">
								<label for="inp-title" class="col-sm-2 col-form-label">Title</label>
								<div class="col-sm-10">
									<input required type="text" class="form-control" name="title" id="inp-title" value="<?= $article->title ?>">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-4">
									<label for="inp-image" class="col-sm-2 col-form-label">Image</label>
								</div>
								<div class="col-sm-8 row">
									<img src="<?= base_url() ?>asset/image/article/<?= $article->image ?>" class="img-fluid">
									<div class="col-sm-10">
										<input type="file" class="form-control" name="image" id="inp-image">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-text" class="col-sm-2 col-form-label">Text</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="text" id="inp-text"><?= $article->text ?></textarea>
								</div>
							</div>
							<input required type="hidden" class="form-control" name="date" id="inp-date" value="<?= $article->date ?>">
							<input required type="hidden" class="form-control" name="writer_id" id="inp-writer_id" value="<?= $article->writer_id ?>">
							<input required type="hidden" class="form-control" name="writer" id="inp-writer" value="<?= $article->writer ?>">
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