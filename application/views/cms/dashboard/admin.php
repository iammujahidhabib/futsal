<?php $this->load->view('template/header'); ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="card p-2">
                    <div class="card-header">
                        <h3>Data Pengguna</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($user as $key) { ?>
                            <li class="list-group-item"><?= $key->name ?></li>
                        <?php } ?>
                    </ul>
                    <br>
                    <a href="<?=site_url('cms/player')?>" class="small text-right">Lihat lebih ...</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card p-2">
                    <div class="card-header">
                        <h3>Data Tempat</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($place as $key) { ?>
                            <li class="list-group-item"><?= $key->name ?></li>
                        <?php } ?>
                    </ul>
                    <br>
                    <a href="<?=site_url('cms/place')?>" class="small text-right">Lihat lebih ...</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card p-2">
                    <div class="card-header">
                        <h3>Data Event</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($event as $key) { ?>
                            <li class="list-group-item"><?= $key->title ?></li>
                        <?php } ?>
                    </ul>
                    <br>
                    <a href="<?=site_url('cms/event')?>" class="small text-right">Lihat lebih ...</a>
                </div>
                <div class="card p-2">
                    <div class="card-header">
                        <h3>Data Artikel</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($article as $key) { ?>
                            <li class="list-group-item"><?= $key->title ?></li>
                        <?php } ?>
                    </ul>
                    <br>
                    <a href="<?=site_url('cms/event')?>" class="small text-right">Lihat lebih ...</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/footer'); ?>