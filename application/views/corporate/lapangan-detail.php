<?php
if (isset($_GET['month'])) {
    $_month = $_GET['month'];
} else {
    $_month = date('Y-m');
}
$bulan_bahasa = ['Januari', 'Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<section id="about" class="about section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-title">
            <h3><?= $place->name ?></h3>
            <!-- <h3>Find Out More <span>About Us</span></h3> -->
            <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>

        <div class="row">
            <div class="col-lg-6 aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                <img src="<?= base_url() ?>asset/image/<?= $place->photo ?>" class="img-fluid" alt="">
                <!-- <img src="assets/img/about.jpg" class="img-fluid" alt=""> -->
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <h5>Tentang Kami</h5>
                <p class="fst-italic">
                    <?= $place->desc ?>
                </p>
                <ul>
                    <li>
                        <i class="bx bx-phone"></i>
                        <div>
                            <h5>Nomor Telpon</h5>
                            <p><?= $place->phone ?></p>
                        </div>
                    </li>
                    <li>
                        <i class="bx bx-map"></i>
                        <div>
                            <h5>Alamat</h5>
                            <p><?= $place->address ?></p>
                        </div>
                    </li>
                    <li>
                        <i class="bx bx-time"></i>
                        <div>
                            <h5>Jam Buka</h5>
                            <p><?= ($place->open < 10) ? '0' . $place->open . ':00' : $place->open . ':00' ?> - <?= ($place->close < 10) ? '0' . $place->close . ':00' : $place->close . ':00' ?></p>
                        </div>
                    </li>
                </ul>
                <!-- <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum
                </p> -->
                <?php if ($this->session->isLogin == TRUE) { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Pesan Lapangan&nbsp;&nbsp;<i class="fas fa-calendar-alt"></i>
                    </button>
                <?php } ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-8 col-sm-12 aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                <h5>Lapangan</h5>
                <hr>
                <div class="row">
                    <?php $no = 1;
                    foreach ($field as $key) { ?>
                        <tr>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <img class="card-img-top" src=" <?= base_url('asset/image/') . $key->photo; ?>" alt=" Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $key->name; ?></h5>
                                        <p class="card-text"><?= $key->note; ?></p>
                                        <p class="card-text small"><label>Fasilitas : </label><?= $key->fasilitas; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php $no++;
                    } ?>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                <h5>Harga Sewa Lapangan</h5>
                <hr>
                <table class="example2 table small table-bordered table-hover dtr-inline" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr role="row">
                            <th>No</th>
                            <th>Lapangan</th>
                            <th>Jam</th>
                            <th>Harga Sewa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($price as $key) { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $key->name; ?></td>
                                <td><?= ($key->start < 10) ? '0' . $key->start . ':00' : $key->start . ':00' ?>-<?= ($key->end < 10) ? '0' . $key->end . ':00' : $key->end . ':00' ?></td>
                                <td>Rp <?= number_format($key->price, 0, ',', '.'); ?></td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<section id="about" class="about">
    <div class="container-fluid aos-init aos-animate" data-aos="fade-up">
        <?= $place->maps ?>
    </div>
</section>
<section id="about" class="about project-tab">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-title">
            <h3>Jadwal Bulan <?= (isset($_GET['month'])) ? $bulan_bahasa[date("n", strtotime($_GET['month']))-1] : $bulan_bahasa[date("n")-1] ?></h3>
        </div>
        <div class="form-group-row">
            <label class="col-sm-3">Pilih Bulan : </label>
            <input type="month" name="month" id="select_month" class="col-sm-4 form-control">
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 aos-init aos-animate table-responsive p-2" data-aos="fade-right" data-aos-delay="100">
                <?php
                $days = (isset($_GET['month'])) ? date("t", strtotime($_GET['month'])) : date("t");
                ?>
                <div class="tab-content" id="nav-tabContent">
                    <ul class="nav nav-tabs nav-justified">
                        <?php $no = 1;
                        foreach ($field as $kuy) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)" data-id="<?= $kuy->id ?>"><?= $kuy->name ?></a>
                            </li> <?php $no++;
                                } ?>
                    </ul>
                    <div class="table-responsive" id="show_table">
                    </div>
                    <?php $no = 1;
                    foreach ($field as $kuy) { ?>
                        <!-- <div class="tablenya tb<?= $no ?> <?= ($no == 1) ? 'active' : 'hidden' ?>">
                            <h3 class="text-center" style="margin-top: 50px;"><?= $kuy->name ?></h3>
                            <div class="tab-pane fade show " id="#nav-table-<?= $no ?>" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Jam</th>
                                            <th colspan="<?= $days ?>"><?= date('F'); ?></th>
                                        </tr>
                                        <tr>
                                            <?php for ($i = 1; $i <= $days; $i++) { ?>
                                                <th><?= $i ?></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($j = $place->open; $j < $place->close; $j++) {
                                            $a = $j;
                                            $a += 1; ?>
                                            <tr>
                                                <th><?= ($j < 10) ? '0' . $j . ':00' : $j . ':00' ?> - <?= ($a < 10) ? '0' . $a . ':00' : $a . ':00' ?></th>
                                                <?php for ($i = 1; $i <= $days; $i++) {
                                                    if ($i < 10) {
                                                        $d = "0" . $i;
                                                    } else {
                                                        $d = $i;
                                                    }
                                                ?>
                                                    <?php
                                                    echo "<td>";
                                                    foreach ($rent["rent" . $no] as $key) {
                                                        if (date("Y-m-") . $d == $key->date) {
                                                            if ($key->end - $key->start > 1) {
                                                                $jam = ($key->end - $key->start) - 1;
                                                                // echo $a;
                                                                if ($key->date && ($j >= $key->start && $j <= $key->end)) {
                                                                    echo '<p class="bg-success text-white">' . $key->name . "<br>" . $key->field_name . '</p>';
                                                                }
                                                                // if (date("Y-m-") . $d == $key->date && $j == $key->start + $jam) {
                                                                //     echo '<p class="bg-success text-white">' . $key->name . "<br>" . $key->field_name . '</p>';
                                                                // } elseif ($key->date && ($j > $key->start && $j < $key->end)) {
                                                                //     echo '<p class="bg-success text-white">' . $key->name . "<br>" . $key->field_name . '</p>';
                                                                // } elseif ($key->date && $j == $key->start) {
                                                                //     echo '<p class="bg-success text-white">' . $key->name . "<br>" . $key->field_name . '</p>';
                                                                // }
                                                            } elseif ($key->end - $key->start == 1) {
                                                                if ($key->date && $j == $key->start) {
                                                                    echo '<p class="bg-success text-white">' . $key->name . "<br>" . $key->field_name . '</p>';
                                                                }
                                                            }
                                                        }
                                                    }
                                                    echo "</td>";
                                                    ?>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div> -->
                    <?php $no++;
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sewa Lapangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?= site_url('transaksi/store') ?>">
                    <input type="hidden" name="user_id" value="<?= $this->session->id ?>">
                    <input type="hidden" name="place_id" value="<?= $place->id ?>">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tanggal</label>
                        <input required min="<?= date('Y-m-d') ?>" type="date" name="date" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Jenis Lapangan</label>
                        <select name="field_id" required class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                            <option value="" selected disabled>Pilih Jenis Lapangan</option>
                            <?php foreach ($field as $key) { ?>
                                <option value="<?= $key->id ?>"><?= $key->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Dari Jam</label>
                        <select name="start" required class="form-control jam_start" id="formGroupExampleInput2" placeholder="Another input placeholder">
                            <?php for ($j = $place->open; $j < $place->close; $j++) { ?>
                                <option value="<?= $j ?>"><?= ($j < 10) ? '0' . $j . ':00' : $j . ':00' ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput3">Sampai Jam</label>
                        <select name="end" required class="form-control jam_end" id="formGroupExampleInput3" placeholder="Another input placeholder">
                            <?php for ($j = $place->open; $j < $place->close; $j++) { ?>
                                <option value="<?= $j ?>"><?= ($j < 10) ? '0' . $j . ':00' : $j . ':00' ?></option>
                            <?php } ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <p class="small text-danger">*tidak bisa memilih tanggal sebelum hari ini</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="fieldModal" tabindex="-1" aria-labelledby="fieldModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fieldModalLabel">Booking Lapangan </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?= site_url('transaksi/store') ?>">
                    <input type="hidden" name="user_id" value="<?= $this->session->id ?>">
                    <input type="hidden" name="place_id" value="<?= $place->id ?>">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tanggal</label>
                        <input required type="date" min="<?= date('Y-m-d') ?>" name="date" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Jenis Lapangan</label>
                        <select name="field_id" id="field_id_seleced" disabled class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                            <option value="" selected>Pilih Jenis Lapangan</option>
                            <?php foreach ($field as $key) { ?>
                                <option value="<?= $key->id ?>"><?= $key->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Dari Jam</label>
                        <select id="jam_start" name="start" required class="form-control jam_start" id="formGroupExampleInput2" placeholder="Another input placeholder">
                            <?php for ($j = $place->open; $j < $place->close; $j++) { ?>
                                <option value="<?= $j ?>"><?= ($j < 10) ? '0' . $j . ':00' : $j . ':00' ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput3">Sampai Jam</label>
                        <select id="jam_end" name="end" required class="form-control jam_end" id="formGroupExampleInput3" placeholder="Another input placeholder">
                            <?php for ($j = $place->open; $j < $place->close; $j++) { ?>
                                <option value="<?= $j ?>"><?= ($j < 10) ? '0' . $j . ':00' : $j . ':00' ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <p class="small text-danger">*tidak bisa memilih tanggal sebelum hari ini</p>
                    </div>
                    <input type="hidden" name="field_id" id="field_id_selected">
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <p class="small text-danger">*tidak bisa memilih tanggal sebelum hari ini</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        <?php if (!empty($field)) { ?>
            $("#show_table").load("<?= site_url('lapangan/table/' . $field[0]->id . '/' . $place->id) ?>")
        <?php } ?>
        $("#select_month").val("<?= (isset($_GET['month'])) ? date("Y-m", strtotime($_GET['month'])) : date("Y-m") ?>")
        $(".nav-link").click(function() {
            console.log($(this).data("id"));
            $(".nav-link").removeClass("active")
            $(this).addClass("active")
            // $(".tablenya").removeClass("active")
            // $("")
            // event.preventDefault()
            // $.ajax({
            //     url: "<?= site_url('lapangan/table/') ?>" + $(this).data("id"),
            //     type: 'GET',
            //     success: function(data) {
            //         $("#show_table").html(data);
            //     }
            // })
            console.log("<?= site_url('lapangan/table/') ?>" + $(this).data("id") + "/<?= $place->id ?>?month=" + $("#select_month").val());
            $("#show_table").load("<?= site_url('lapangan/table/') ?>" + $(this).data("id") + "/<?= $place->id ?>?month=" + $("#select_month").val())
        })


        // iki sing dinggo test coding ilangi iki ne wae "//"
        // var ii = parseInt($(".jam_start").val()) + 1;
        // console.log(ii);
        // $(".jam_end").val(ii).change()
        // $(".jam_start").change(function() {
        //     event.preventDefault();
        //     console.log($(".jam_start").val());
        //     var ii = parseInt($(".jam_start").val()) + 1;
        //     console.log(ii);
        //     $(".jam_end").val(ii).change()
        // })
    })
</script>