<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

        <div class="section-title mb-3">
            <!-- <h2>Event</h2> -->
            <h3>Event</h3>
            <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>

        <div class="row">
            <?php foreach ($event as $key) { ?>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="box">
                        <a href="<?= site_url('acara/detail/' . $key->id) ?>">
                            <img src="<?= base_url() ?>asset/image/event/<?= $key->poster ?>" class="img-fluid">
                        </a>
                        <hr>
                        <p><?= $key->start ?></p>
                        <a href="<?= site_url('acara/detail/' . $key->id) ?>">
                            <h5 style="color: black;">
                                <?= $key->title ?>
                            </h5>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</section><!-- End Pricing Section -->