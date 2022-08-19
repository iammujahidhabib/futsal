<?php
$bulan_bahasa = ['Januari', 'Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Event</h2>
            <!-- <h3>Artikel</h3> -->
            <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>

        <div class="row">
            <div class="col-sm-8 m-auto d-flex justify-content-center">
                <div>
                <h3 class="text-center"><?= $event->title ?></h3>
                <br>
                <img src="<?= base_url() ?>asset/image/event/<?= $event->poster ?>" class="img-fluid">
                <br>
                <br>
                <h5 class="text-center"><i class="fa fa-calendar"></i>
                    <?php
                    if ($event->start == $event->end) {
                        echo date("d",strtotime($event->start))." ".$bulan_bahasa[date("n",strtotime($event->start))-1]." ".date("Y",strtotime($event->start));
                    } else {
                        echo date("d",strtotime($event->start))." ".$bulan_bahasa[date("n",strtotime($event->start))-1]." ".date("Y",strtotime($event->start)) . " - " . date("d",strtotime($event->end))." ".$bulan_bahasa[date("n",strtotime($event->end))-1]." ".date("Y",strtotime($event->end)) ;
                    }
                    ?>

                </h5>
                <p class="text-center"><?= $event->desc ?></p>
                <a href="#" class="btn btn-secondary w-100"><i class="fa fa-download"></i> Formulir</a>
                </div>
            </div>
        </div>

    </div>
</section><!-- End Pricing Section -->