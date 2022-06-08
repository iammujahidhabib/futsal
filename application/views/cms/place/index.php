<?php $this->load->view('template/header'); ?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-sm-12 col-md-6">
                            <h4 class="card-title">Data Master Tempat</h4>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <a type="button" class="btn btn-primary btn-sm float-right" href="<?= base_url() ?>cms/player/create">
                                <i class="fa fa-plus"></i> Tempat
                            </a>
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
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($place as $key) { ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $key->name; ?></td>
                                                    <td><?= $key->address; ?></td>
                                                    <td>
                                                        <a type="button" class="btn btn-secondary btn-sm text-white" href="<?= base_url() ?>cms/place/detail/<?= $key->id ?>"><i class="fa fa-eye"></i></a>
                                                        <a type="button" class="btn btn-danger btn-sm text-white" onclick="hapus(<?= $key->id ?>)"><i class="fa fa-trash"></i></a>
                                                    </td>
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
    function hapus(id) {
        var konfirmasi = confirm('Anda yakin akan menghapus?');
        if (konfirmasi == true) {
            window.location.href = '<?= base_url() ?>cms/player/delete/' + id;
        }
    }
</script>
<?php $this->load->view('template/footer'); ?>