<?= $this->session->flashdata('message') ?>
<?php $this->load->view('template/header'); ?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-sm-12 col-md-6">
                            <h4 class="card-title">Data Tempat Ku</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <?php if ($place->status == 0) { ?>
                                        <div class="alert alert-warning" role="alert">
                                            Status Tempat anda masih menunggu verifikasi admin
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="POST" action="<?= site_url('cms/place/update_place/' . $place->id) ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="nama">Nama Tempat</label>
                                            <input type="text" name="name" class="form-control" id="nama" value="<?= $place->name ?>">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label class="" for="formGroupExampleInput2">Jam Buka</label>
                                                <select name="open" class="form-control col-sm-10" id="formGroupExampleInput2" placeholder="Another input placeholder">
                                                    <?php for ($j = 0; $j < 24; $j++) { ?>
                                                        <option <?= $place->open == (($j < 10) ? '0' . $j : $j) ? 'selected' : '' ?> value="<?= $j ?>"><?= ($j < 10) ? '0' . $j . ':00' : $j . ':00' ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="" for="formGroupExampleInput2">Jam Tutup</label>
                                                <select name="close" class="form-control col-sm-10" id="formGroupExampleInput2" placeholder="Another input placeholder">
                                                    <?php for ($j = 0; $j < 24; $j++) { ?>
                                                        <option <?= $place->close == (($j < 10) ? '0' . $j : $j) ? 'selected' : '' ?> value="<?= $j ?>"><?= ($j < 10) ? '0' . $j . ':00' : $j . ':00' ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number">Nomor Telpon</label>
                                            <input type="text" name="phone" class="form-control" value="<?= $place->phone ?>" id="phone_number">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Deskripsi</label>
                                            <textarea name="desc" id="alamat" required class="form-control"><?= $place->desc ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="address" id="alamat" required class="form-control"><?= $place->address ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="maps">Embed Maps <small><a href="#" id="a_embed_maps">tutorial</a></small></label>
                                            <textarea name="maps" id="maps" required class="form-control"><?= $place->maps ?></textarea>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-7 col-sm-12">
                                                <label for="photo">Photo</label>
                                                <input type="file" name="photo" class="form-control" id="photo">
                                            </div>
                                            <div class="col-lg-5 col-sm-12">
                                                <img src="<?= base_url('asset/image/' . $place->photo) ?>" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="asdasd">Bank</label>
                                            <select class="form-control" required name="bank" id="asdasd">
                                                <option value="" disabled selected>Pilih Bank</option>
                                                <option <?= $place->bank == 'BCA' ? 'selected' : '' ?> value="BCA">BCA</option>
                                                <option <?= $place->bank == 'Mandiri' ? 'selected' : '' ?> value="Mandiri">Mandiri</option>
                                                <option <?= $place->bank == 'BNI' ? 'selected' : '' ?> value="BNI">BNI</option>
                                                <option <?= $place->bank == 'BRI' ? 'selected' : '' ?> value="BRI">BRI</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="aaaasdasd">Nomor Rekening</label>
                                            <input type="text" id="aaaasdasd" class="form-control" name="bank_account" value="<?= $place->bank_account ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="asadsdasd">Nama Rekening</label>
                                            <input type="text" id="asadsdasd" class="form-control" name="bank_name" value="<?= $place->bank_name ?>" required>
                                        </div>
                                        <div class="form-check">
                                        </div>
                                        <button type="submit" class="btn w-100 btn-primary">Daftar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="embed_maps" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cara Embed Maps</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul style="padding-left: 10px;">
                    <li>Buka Google Maps</li>
                    <li>Cari Lokasi</li>
                    <li>Klik Share</li>
                    <li>Ikuti Gambar Di bawah</li>
                </ul>
                <img src="<?= base_url() ?>asset/tutorial_embed_maps.png" class="img-fluid" alt="" height="300" style="width:100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php if ($place->status == 0) { ?>
    <script type="text/javascript">
        $("input").prop("disabled", true)
        $("button").prop("disabled", true)
        $("textarea").prop("disabled", true)
        $("select").prop("disabled", true)
    </script>
<?php } ?>
<script>
    $("#a_embed_maps").click(function() {
        event.preventDefault();
        $("#embed_maps").modal('show');
    })
</script>
<?php $this->load->view('template/footer'); ?>