<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Lapangan</h2>
            <h3>Sewa <span>Lapangan</span> Sekarang!</h3>
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

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <?php foreach ($field as $key) { ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <a href="<?= site_url('lapangan/index/' . $key->id) ?>">
                        <img src="<?= base_url() ?>asset/image/<?= $key->photo ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $key->name ?></h4>
                            <p><?= $key->address ?></p>
                            <a href="<?= base_url() ?>asset/image/<?= $key->photo ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $key->name ?>"><i class="bx bx-plus"></i></a>
                            <a href="<?= site_url('lapangan/index/' . $key->id) ?>" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>

    </div>
</section><!-- End Portfolio Section -->