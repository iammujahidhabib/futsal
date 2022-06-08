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
							<h4 class="card-title">Detail Event</h4>
						</div>
					</div>
					<div class="card-body">
							<div class="form-group row">
								<label for="inp-title" class="col-sm-2 col-form-label">Judul</label>
								<div class="col-sm-10">
									<?= $event->title ?>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-4">
									<label for="inp-poster" class="col-sm-2 col-form-label">Poster</label>
								</div>
								<div class="col-sm-4">
									<img src="<?= base_url() ?>asset/image/event/<?= $event->poster ?>" class="img-fluid">
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-form" class="col-sm-2 col-form-label">Formulir</label>
								<div class="col-sm-10">
									<!-- <input type="file" class="form-control" name="form" id="inp-form"> -->
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-start" class="col-sm-2 col-form-label">Tanggal Mulai</label>
								<div class="col-sm-10">
									<?=date('d F Y',strtotime($event->start))?>
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-end" class="col-sm-2 col-form-label">Tanggal Selesai</label>
								<div class="col-sm-10">
									<?=date('d F Y',strtotime($event->end))?>
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-desc" class="col-sm-2 col-form-label">Deskripsi</label>
								<div class="col-sm-10">
									<?=$event->desc?>
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