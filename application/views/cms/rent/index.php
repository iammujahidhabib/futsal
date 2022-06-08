<?php $this->load->view('template/header'); ?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-sm-12 col-md-6">
                            <h4 class="card-title">Data Sewa Lapangan</h4>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <!-- <a type="button" class="btn btn-primary btn-sm float-right" href="<?= base_url() ?>cms/type/create">
                                <i class="fa fa-plus"></i> Type Field
                            </a> -->
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
                                                <th>Tanggal</th>
                                                <th>Waktu</th>
                                                <th>Nama Lapangan</th>
                                                <th>Uang Muka</th>
                                                <th>Kekurangan Bayar</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($rent as $key) { ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $key->date; ?></td>
                                                    <td><?= $key->start; ?>.00 - <?= $key->end ?>.00</td>
                                                    <td><?= $key->field; ?></td>
                                                    <td><?= $key->dp; ?></td>
                                                    <td><?= $key->pay_off; ?></td>
                                                    <td><?= $key->total; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($key->status == 0) {
                                                            echo "<span class='badge badge-secondary'>Sedang Diproses</span>";
                                                        } elseif ($key->status == 1) {
                                                            echo "<span class='badge badge-success'>Transaksi Berhasil</span>";
                                                        } elseif ($key->status == 2) {
                                                            echo "<span class='badge badge-danger'>Transaksi Gagal</span>";
                                                        } elseif ($key->status == 3) {
                                                            echo "<span class='badge badge-warning'>Cancel</span>";
                                                        } elseif ($key->status == 4) {
                                                            echo "<span class='badge badge-dark'>Selesai</span>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>

                                                        <a type="button" class="btn btn-secondary btn-sm text-white" href="#" id="btn_view" data-id="<?= $key->id ?>" data-date="<?= $key->date ?>" data-start="<?= $key->start ?>" data-end="<?= $key->end ?>" data-dp="<?= $key->dp ?>" data-pay_off="<?= $key->pay_off ?>" data-total="<?= $key->total ?>" data-bill_file="<?= $key->bill_file ?>" data-type="<?= $key->type ?>" data-rent_bank="<?= $key->rent_bank ?>" data-rent_bank_account="<?= $key->rent_bank_account ?>" data-email="<?= $key->email ?>" data-rent_bank_name="<?= $key->rent_bank_name ?>" data-status="<?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($key->status == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo "Sedang Diproses";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } elseif ($key->status == 1) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo "Transaksi Berhasil";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } elseif ($key->status == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo "Transaksi Gagal";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } elseif ($key->status == 3) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo "Cancel";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } elseif ($key->status == 4) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo "Selesai";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ?>"><i class="fa fa-eye"></i></a>
                                                        <?php
                                                        if ($key->status == 0) { ?>
                                                            <a type="button" class="btn btn-success btn-sm text-white" href="<?= site_url('cms/booking/accept/' . $key->id) ?>"><i class="fa fa-check"></i></a>
                                                            <!-- <a type="button" class="btn btn-danger btn-sm text-white" onclick="hapus(<?= $key->id ?>)"><i class="fa fa-x"></i></a> -->
                                                            <button type="button" class="btn btn-danger btn-sm text-white" id="btn_tolak" data-id="<?=$key->id?>" data-toggle="modal" data-target="#tolakModal">
                                                                <i class="fa fa-x"></i>
                                                            </button>
                                                        <?php }
                                                        ?>
                                                        <?php
                                                        if ($key->status == 1) { ?>
                                                            <a type="button" class="btn btn-success btn-sm text-white" href="<?= site_url('cms/booking/selesai/' . $key->id) ?>"><i class="fa fa-check"></i> Selesai</a>
                                                        <?php }
                                                        ?>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Sewa Lapangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="">Email Pengguna </label>
                            <input type="text" disabled class="form-control" id="demail">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal & Waktu</label>
                            <input type="text" disabled class="form-control" id="dtanggal">
                        </div>
                        <div class="form-group">
                            <label for="">Uang Muka</label>
                            <input type="text" disabled class="form-control" id="ddp">
                        </div>
                        <div class="form-group">
                            <label for="">Kekurangan Bayar</label>
                            <input type="text" disabled class="form-control" id="dpayoff">
                        </div>
                        <div class="form-group">
                            <label for="">Total</label>
                            <input type="text" disabled class="form-control" id="dtotal">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lapangan</label>
                            <input type="text" disabled class="form-control" id="dtypefield">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" disabled class="form-control" id="dstatus">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <img class="img-fluid" id="image_upload">
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <a type="button" class="btn btn-secondary" id="dtolak">Tolak</a>
                <a type="button" class="btn btn-success">Terima</a>
            </div> -->
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="tolakModal" tabindex="-1" aria-labelledby="tolakModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tolakModalLabel">Keterangan Penolakan Sewa Lapangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="tolak_form" method="POST">
                    <div class="form-group">
                        <label>Alasan Tolak</label>
                        <textarea class="form-control" name="remark" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    function hapus(id) {
        var konfirmasi = confirm('Anda yakin akan menolak booking?');
        if (konfirmasi == true) {
            window.location.href = '<?= base_url() ?>cms/booking/delete/' + id;
        }
    }
    $(document).ready(function() {
        $(document).on('click', "#btn_tolak", function() {
            var src = '<?= base_url() ?>cms/booking/delete/' + $(this).data('id');
            $("#tolak_form").attr("action", src);
        })
        $(document).on('click', "#btn_view", function() {
            event.preventDefault()
            $("#demail").val($(this).data("email"));
            $("#ddp").val($(this).data("dp"));
            $("#dtanggal").val($(this).data("date") + " (" + $(this).data("start") + ".00-" + $(this).data("end") + ".00)");
            // $("#dstart").val($(this).data("start"));
            // $("#dend").val($(this).data("end"));
            $("#dtotal").val($(this).data("total"));
            $("#dstatus").val($(this).data("status"));
            $("#dpayoff").val($(this).data("pay_off"));
            $("#dtypefield").val($(this).data("type"));
            $("#image_upload").attr("src", "<?= base_url() ?>asset/image/bill/" + $(this).data("bill_file"));
            $("#exampleModal").modal("show")
        });
    })
</script>
<?php $this->load->view('template/footer'); ?>