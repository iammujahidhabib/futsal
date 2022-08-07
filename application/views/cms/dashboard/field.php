<?php $this->load->view('template/header'); ?>
<div class="container">
    <?php if ($place->status == 0) { ?>
        <div class="alert alert-warning" role="alert">
            Status Tempat anda masih menunggu verifikasi admin
        </div>
    <?php } ?>
</div>

<section id="about" class="about project-tab">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-title">
            <h3>Jadwal Bulan <?= (isset($_GET['month'])) ? date("F", strtotime($_GET['month'])) : date("F") ?></h3>
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

<?php $this->load->view('template/footer'); ?>
<script>
    $(document).ready(function(){
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
    })
</script>