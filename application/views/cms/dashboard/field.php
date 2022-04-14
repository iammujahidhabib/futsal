<?php $this->load->view('template/header'); ?>
<div class="container">
    <?php if ($place->status == 0) { ?>
        <div class="alert alert-warning" role="alert">
            Status Tempat anda masih menunggu verifikasi admin
        </div>
    <?php } ?>
</div>
<?php $this->load->view('template/footer'); ?>