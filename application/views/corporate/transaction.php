<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>asset/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>asset/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<style>
    .badge {
        padding: 10px;
        border-radius: 3px;
        font-weight: bold;
        color: white;
    }

    .badge-secondary {
        background-color: lightgrey;
    }

    .badge-primary {
        background-color: blue;
    }

    .badge-success {
        background-color: green;
    }

    .badge-dark {
        background-color: black;
    }

    .badge-warning {
        background-color: orange;
    }

    .badge-danger {
        background-color: red;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Transaksi</h2>
            <h3>Riwayat Sewa Lapangan Anda</h3>
        </div>

        <!-- <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                </ul>
            </div>
        </div> -->

        <div class="row portfolio-container h-100">
            <div class="col-sm-12 h-100">
                <table class="table table-bordered example2 table-hover dataTable dtr-inline" role="grid">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Lapangan</th>
                            <th>Jam</th>
                            <th>Durasi</th>
                            <th>Uang Muka</th>
                            <th>Kekurangan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($transaction as $key) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= date("d F Y", strtotime($key->date)) ?></td>
                                <td><?= $key->name_field ?><br><?= $key->aaa ?></td>
                                <td><?= $key->start . ":00 - " . $key->end . ":00" ?></td>
                                <td><?= $key->end - $key->start ?> Jam</td>
                                <td>Rp <?= number_format($key->dp) ?></td>
                                <td class="text-danger">Rp <?= number_format($key->total - $key->dp) ?></td>
                                <td><?php
                                    if ($key->status == 0) {
                                        echo "<span class='badge badge-secondary'>Sedang Diproses</span>";
                                    } elseif ($key->status == 1) {
                                        echo "<span class='badge badge-success'>Transaksi Berhasil</span>";
                                    } elseif ($key->status == 2) {
                                        echo "<span class='badge badge-danger' id='remark-note' style='cursor:pointer' data-remark='" . $key->remark . "'>Transaksi Gagal</span>";
                                    } elseif ($key->status == 3) {
                                        echo "<span class='badge badge-warning'>Cancel</span>";
                                    } elseif ($key->status == 4) {
                                        echo "<span class='badge badge-dark'>Selesai</span>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-grip-lines">=</i>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" target="_blank" href="<?= base_url('asset/image/bill/' . $key->bill_file) ?>">Bukti Transfer</a>
                                            <!-- <a class="dropdown-item" href="#">Another action</a> -->
                                            <a class="dropdown-item" onclick="hapus(<?= $key->id ?>)">Cancel</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
                <br>
                <p>Note : </p>
                <ul>
                    <li>Jika transaksi berhasil, silahkan datang tepat waktu ke lapangan</li>
                    <li>Jika transaksi berhasil, pelunasan dilakukan di lapangan sebelum/setelah bermain</li>
                    <li>Jika anda cancel sewa lapangan, uang DP/dibayarkan tidak bisa dikembalikan</li>
                    <li>Jika transaksi gagal, silahkan ulangi pemesanan sewa lapangan kembali</li>
                </ul>
            </div>
        </div>
    </div>
</section><!-- End Portfolio Section -->

<!-- Modal -->
<div class="modal fade" id="tolakModal" tabindex="-1" aria-labelledby="tolakModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tolakModalLabel">Transaksi Remark</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Alasan Tolak</label>
                    <p id="alasan-tolak"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- DataTables -->
<script src="<?= base_url() ?>asset/adminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>asset/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>asset/adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>asset/adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript">
    function hapus(id) {
        var konfirmasi = confirm('Anda yakin akan cancel booking?');
        if (konfirmasi == true) {
            window.location.href = '<?= base_url() ?>transaksi/cancel/' + id;
        }
    }
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#remark-note', function() {
            event.preventDefault()
            $("#alasan-tolak").html($(this).data('remark'));
            $("#tolakModal").modal("show");
        })
        $('.example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>