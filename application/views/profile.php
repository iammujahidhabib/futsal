<?php $this->load->view('template/header'); ?>
<style type="text/css">
	.gagal{
		color: red;
	}
</style>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
      	<div class="row">
      		<div class="col-lg-12">
      			<div class="card">
      				<div class="card-header">
      					<div class="col-sm-6 col-md-6">
      						<h4 class="card-title">Profil ubah password</h4>
                        </div>
                        <div class="col-sm-6"><?=$this->session->flashdata('success');?></div>  
      				</div>
      				<div class="card-body">
      					<form method="post" action="<?=base_url()?>admin/update_pass/" enctype="multipart/form-data">
						  <div class="form-group row">
						    <label for="inp-nama" class="col-sm-2 col-form-label">Nama Admin</label>
						    <div class="col-sm-10">
                            <?=$customer[0]->admin;?>
						    </div>
						  </div>
						  <div class="row">
						  	<div class="col-sm-2"></div>
						    <div class="col-sm-10 gagal">
						    	<?php echo form_error('nama'); ?>
						    		
						    	</div>
						  </div>
						  <div class="form-group row">
						    <label for="inp-email" class="col-sm-2 col-form-label">Email</label>
						    <div class="col-sm-10">
                            <?=$customer[0]->email;?>
						    </div>
						  </div>
						  <div class="row">
						    <div class="col-sm-2"></div>
						    <div class="col-sm-10 gagal">
						    	<?php echo form_error('email'); ?>
						    </div>
                          </div>
                          <div class="form-group row">
						    <label for="inp-password" class="col-sm-2 col-form-label">Ubah Password</label>
						    <div class="col-sm-10">
                                <input type="password" name="password_lama" placeholder="password lamaa" class="form-control" required>
                                <input type="password" name="password" placeholder="password baru" class="form-control" required>
						    </div>
						  </div>
						  <div class="row">
						    <div class="col-sm-2"></div>
						    <div class="col-sm-10 gagal">
						    	<?php echo form_error('password'); ?>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inp-submit" class="col-sm-2 col-form-label"></label>
						    <div class="col-sm-10">
						    	<input type="submit" name="submit" class="btn btn-primary btn-block" value="Edit">
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