<?php
$month = (isset($_GET['month'])) ? date("Y-m", strtotime($_GET['month'])) : date("Y-m");
$days = date("t", strtotime($month));
$bulan_bahasa = ['Januari', 'Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
?>

<!-- Vendor CSS Files -->
<link href="<?= base_url() ?>asset/corporate/assets/vendor/aos/aos.css" rel="stylesheet">
<link href="<?= base_url() ?>asset/corporate/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url() ?>asset/corporate/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="<?= base_url() ?>asset/corporate/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="<?= base_url() ?>asset/corporate/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="<?= base_url() ?>asset/corporate/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<!-- Template Main CSS File -->
<link href="<?= base_url() ?>asset/corporate/assets/css/style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<br>
<h2 class="text-center"><?= $field_selected->name ?></h2>
<div class="row">
    <div class="col-sm-9"></div>
    <div class="col-sm-3">
        <?php if ($this->session->isLogin == TRUE) { ?>
            <button type="button" class="btn btn-primary small text-right" data-toggle="modal" data-target="#fieldModal">
                Pesan Lapangan&nbsp;&nbsp;<i class="fas fa-calendar-alt"></i>
            </button>
        <?php } else { ?>
            <small>Silahkan login untuk sewa lapangan</small>
        <?php } ?>
    </div>
</div>
<br>
<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th rowspan="2">Jam</th>
            <th colspan="<?= $days ?>"><?= (isset($_GET['month'])) ? $bulan_bahasa[date("n", strtotime($_GET['month']))-1] : $bulan_bahasa[date("n")-1] ?></th>
        </tr>
        <tr>
            <?php for ($i = 1; $i <= $days; $i++) { ?>
                <th><?= $i ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        for ($j = $place->open; $j < $place->close; $j++) {
            $a = $j;
            $a += 1; ?>
            <tr>
                <th class="small"><?= ($j < 10) ? '0' . $j . ':00' : $j . ':00' ?> - <?= ($a < 10) ? '0' . $a . ':00' : $a . ':00' ?></th>
                <?php for ($i = 1; $i <= $days; $i++) {
                    if ($i < 10) {
                        $d = "0" . $i;
                    } else {
                        $d = $i;
                    }
                ?>
                    <?php
                    echo "<td>";
                    $_mmonth = (isset($_GET['month'])) ? date("Y-m-", strtotime($_GET['month'])) : date("Y-m-");
                    // echo $_mmonth;
                    foreach ($rent["rent" . $no] as $key) {
                        if ($_mmonth . $d == $key->date) {
                            if ($key->end - $key->start > 1) {
                                $jam = ($key->end - $key->start) - 1;
                                // echo $a;
                                if ($key->date && ($j >= $key->start && $j <= $key->end)) {
                                    echo '<p class="bg-success text-white small" style="border-radius:10px;padding:5px">' . $key->name . "<br>" . $key->field_name . '</p>';
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
                                    echo '<p class="bg-success text-white small" style="border-radius:10px;padding:5px">' . $key->name . "<br>" . $key->field_name . '</p>';
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

<script>
    $(document).ready(function() {
        $("#field_id_seleced").val(<?= $field_selected->id ?>)
        $("#field_id_selected").val(<?= $field_selected->id ?>)
    })
</script>