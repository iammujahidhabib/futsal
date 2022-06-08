<?php $this->load->view('template/header'); ?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-sm-12 col-md-6">
                            <h4 class="card-title">Data My Place</h4>
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
                                <div class="col-sm-6">
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
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <div class="col-lg-5 col-sm-12">
                                        <label for="alamat">Photo</label>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-sm-12 col-md-6">
                            <h4 class="card-title">Data Tempat</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="example2 table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Nama Tempat</th>
                                                <th>Catatan</th>
                                                <th class="col-sm-4">Foto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($type as $key) { ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $key->name; ?></td>
                                                    <td><?= $key->note; ?></td>
                                                    <td><img src="<?= base_url('asset/image/' . $key->photo); ?>" class="img-fluid"></td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-sm-12 col-md-6">
                            <h4 class="card-title">Data Harga Lapangan</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="example2 table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Nama Lapangan</th>
                                                <th>Waktu</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($price as $key) { ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $key->name; ?></td>
                                                    <td><?= ($key->start < 10) ? '0' . $key->start . ':00' : $key->start . ':00' ?>-<?= ($key->end < 10) ? '0' . $key->end . ':00' : $key->end . ':00' ?></td>
                                                    <td><?= $key->price; ?></td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".form-control").prop("disabled", true)
</script>
<?php $this->load->view('template/footer'); ?>