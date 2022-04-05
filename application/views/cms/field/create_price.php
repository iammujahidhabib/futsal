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
							<h4 class="card-title">Create Type Field Price</h4>
						</div>
					</div>
					<div class="card-body">
						<form method="post" action="<?= site_url() ?>cms/type/create_price/" enctype="multipart/form-data">
							<div class="form-group row">
								<label for="inp-title" class="col-sm-2 col-form-label">Price</label>
								<div class="col-sm-10">
									<input required type="text" class="form-control" name="price" id="inp-title" placeholder="title">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="formGroupExampleInput2">Type Field</label>
								<select name="type_field_id" class="form-control col-sm-10" id="formGroupExampleInput2" placeholder="Another input placeholder">
									<?php foreach ($type as $key ) {
									?>
									<option value="<?=$key->id?>"><?=$key->type?></option>
									<?php }?>
								</select>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="formGroupExampleInput2">Dari Jam</label>
								<select name="start" class="form-control col-sm-10" id="formGroupExampleInput2" placeholder="Another input placeholder">
									<?php for ($j = 0; $j < 24; $j++) { ?>
										<option value="<?= $j ?>"><?= ($j < 10) ? '0' . $j . ':00' : $j . ':00' ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="formGroupExampleInput3">Sampai Jam</label>
								<select name="end" class="form-control col-sm-10" id="formGroupExampleInput3" placeholder="Another input placeholder">
									<?php for ($j = 0; $j < 24; $j++) { ?>
										<option value="<?= $j ?>"><?= ($j < 10) ? '0' . $j . ':00' : $j . ':00' ?></option>
									<?php } ?>
								</select>
							</div>
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