<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<section id="about" class="about section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
            <h3><?= $place->name ?></h3>
            <!-- <h3>Find Out More <span>About Us</span></h3> -->
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">
            <div class="col-lg-6 aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                <img src="<?= base_url() ?>asset/image/<?= $place->photo ?>" class="img-fluid" alt="">
                <!-- <img src="assets/img/about.jpg" class="img-fluid" alt=""> -->
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <h3>Tentang <?= $place->name ?></h3>
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
                </ul>
                <table class="example2 table table-bordered table-hover dtr-inline" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr role="row">
                            <th>No</th>
                            <th>Field</th>
                            <th>Time</th>
                            <th>Price</th>
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
                <!-- <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum
                </p> -->
                <?php if ($this->session->isLogin == TRUE && $this->session->role == 3) { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Booking
                    </button>
                <?php } ?>
            </div>
        </div>

    </div>
</section>
<section id="about" class="about section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
            <h3>Jadwal Bulan Ini</h3>
            <!-- <h3>Find Out More <span>About Us</span></h3> -->
        </div>
        <div class="row">
            <div class="col-lg-12 aos-init aos-animate table-responsive p-2" style="border: 1px solid black;" data-aos="fade-right" data-aos-delay="100">
                <?php
                $days = date("t");
                ?>
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
                        <?php for ($j = 0; $j < 24; $j++) { ?>
                            <tr>
                                <th><?= ($j < 10) ? '0' . $j . ':00' : $j . ':00' ?></th>
                                <?php for ($i = 1; $i <= $days; $i++) {
                                    if ($i < 10) {
                                        $d = "0" . $i;
                                    } else {
                                        $d = $i;
                                    }
                                ?>
                                    <?php
                                    echo "<td>";
                                    foreach ($rent as $key) {
                                        if (date("Y-m-") . $d == $key->date) {
                                            if ($key->end - $key->start > 1) {
                                                $jam = ($key->end - $key->start) - 1;
                                                if (date("Y-m-") . $d == $key->date && $j == $key->start + $jam) {
                                                    echo '<p class="bg-success text-white">' . $key->name . "<br>" . $key->field_name . '</p>';
                                                } elseif ($key->date && $j == $key->start) {
                                                    echo '<p class="bg-success text-white">' . $key->name . "<br>" . $key->field_name . '</p>';
                                                }
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
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                        <input type="date" name="date" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Jenis Lapangan</label>
                        <select name="field_id" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                            <option value="" selected disabled>Pilih Jenis Lapangan</option>
                            <?php foreach ($field as $key) { ?>
                                <option value="<?= $key->id ?>"><?= $key->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Dari Jam</label>
                        <select name="start" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                            <?php for ($j = 0; $j < 24; $j++) { ?>
                                <option value="<?= $j ?>"><?= ($j < 10) ? '0' . $j . ':00' : $j . ':00' ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput3">Sampai Jam</label>
                        <select name="end" class="form-control" id="formGroupExampleInput3" placeholder="Another input placeholder">
                            <?php for ($j = 0; $j < 24; $j++) { ?>
                                <option value="<?= $j ?>"><?= ($j < 10) ? '0' . $j . ':00' : $j . ':00' ?></option>
                            <?php } ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>