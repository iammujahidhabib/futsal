<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Artikel</h2>
            <h3>Check our <span>Pricing</span></h3>
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">
            <?php foreach ($article as $key) { ?>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="box">
                        <h3><?= $key->title ?></h3>
                        <p><?= $key->date ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</section><!-- End Pricing Section -->