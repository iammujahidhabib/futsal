<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

        <div class="section-title mb-3">
            <!-- <h2>Artikel</h2> -->
            <h3>Artikel</h3>
            <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>

        <div class="row">
            <?php foreach ($article as $key) { ?>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="box">
                        <a href="<?= site_url('artikel/detail/' . $key->id) ?>">
                            <img src="<?= base_url() ?>asset/image/article/<?= $key->image ?>" class="img-fluid">
                        </a>
                        <hr>
                        <!-- <p><?= $key->date ?></p> -->
                        <a href="<?= site_url('artikel/detail/' . $key->id) ?>">
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