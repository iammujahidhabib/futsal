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
							<h4 class="card-title">Edit Event</h4>
						</div>
					</div>
					<div class="card-body">
						<form method="post" action="<?= site_url() ?>cms/event/edit/<?= $event->id ?>" enctype="multipart/form-data">
							<div class="form-group row">
								<label for="inp-title" class="col-sm-2 col-form-label">Title</label>
								<div class="col-sm-10">
									<input required type="text" class="form-control" name="title" id="inp-title" value="<?= $event->title ?>">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-4">
									<img src="<?= base_url() ?>assets/image/event/<?= $event->poster ?>" class="img-fluid">
								</div>
								<div class="col-sm-8 row">
									<label for="inp-poster" class="col-sm-2 col-form-label">Poster</label>
									<div class="col-sm-10">
										<input type="file" class="form-control" name="poster" id="inp-poster">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-form" class="col-sm-2 col-form-label">Form</label>
								<div class="col-sm-10">
									<input type="file" class="form-control" name="form" id="inp-form">
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-start" class="col-sm-2 col-form-label">Start</label>
								<div class="col-sm-10">
									<input required type="date" class="form-control" name="start" id="inp-start" value="<?=$event->start?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-end" class="col-sm-2 col-form-label">End</label>
								<div class="col-sm-10">
									<input required type="date" class="form-control" name="end" id="inp-end" value="<?=$event->end?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="inp-desc" class="col-sm-2 col-form-label">Description</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="desc" id="inp-desc"><?=$event->desc?></textarea>
								</div>
							</div>
							<input required type="hidden" class="form-control" name="writer_id" id="inp-writer_id" value="<?= $event->writer_id ?>">
							<div class="form-group row">
								<label for="inp-submit" class="col-sm-2 col-form-label"></label>
								<div class="col-sm-10">
									<input type="submit" name="submit" class="btn btn-primary btn-block" value="Update">
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