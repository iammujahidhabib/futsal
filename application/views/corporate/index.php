<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1>Selamat Datang di <span>Futsal Cilacap</span></h1>
        <h2>Informasi mengenai dunia futsal di Kota Cilacap</h2>
        <div class="d-flex">
            <!-- <a href="#about" class="btn-get-started scrollto">Get Started</a> -->
            <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
        </div>
    </div>
</section>
<!-- End Hero -->

<main id="main">
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2><a href="<?=site_url('acara')?>">Event Terdekat</a></h2>
                <!-- <h3>Check our <span>Pricing</span></h3> -->
                <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
            </div>
            <?php if (!empty($event)) { ?>
                <div class="row">
                    <?php foreach ($event as $key) { ?>
                        <div class="col-lg-4 col-md-4 col-sm-12" data-aos="fade-up" data-aos-delay="100">
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
                <a href="<?= site_url('acara') ?>">
                    <h5 style="color: black;text-align: right;">Lihat lebih ...</h5>
                </a>
            <?php } else { ?>
                <div class="col-lg-12 d-flex justify-content-center p-5" style="border-radius: 20px;background-color: lightblue;">
                    <h3>Belum ada event dalam waktu dekat ini.</h3>
                </div>
            <?php } ?>
        </div>
    </section><!-- End Pricing Section -->
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Lapangan</h2>
                <h3>Sewa <a href="<?=site_url('lapangan')?>"><span style="cursor: pointer;" >Lapangan</span></a> Sekarang!</h3>
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
                <?php foreach ($place as $key) { ?>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <a href="<?= site_url('lapangan/detail/' . $key->id) ?>">
                            <img src="<?= base_url() ?>asset/image/<?= $key->photo ?>" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><?= $key->name ?></h4>
                                <p><?= $key->address ?></p>
                                <a href="<?= base_url() ?>asset/image/<?= $key->photo ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $key->name ?>"><i class="bx bx-plus"></i></a>
                                <a href="<?= site_url('lapangan/detail/' . $key->id) ?>" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>

        </div>
    </section><!-- End Portfolio Section -->
    <!-- ======= Featured Services Section ======= -->
    <!-- <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                        <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4 class="title"><a href="">Magni Dolores</a></h4>
                        <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4 class="title"><a href="">Nemo Enim</a></h4>
                        <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                    </div>
                </div>

            </div>

        </div>
    </section> -->
    <!-- End Featured Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Tentang Kami</h2>
                <h3>Sistem Informasi Futsal <span>Kota Cilacap</span></h3>
                <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <img src="<?=base_url('asset/image/futsal_cilacap.png')?>" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <!-- <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3> -->
                    <p class="">
                        Website ini merupakan pusat informasi seputar Futsal di Kota Cilacap. Melalui website ini diharapkan dapat mempermudah anda dalam
                        mendapatkan informasi baik sewa lapangan, artikel-artiker, sampai dengan informasi mengenai Event atau Turnament Futsal yang ada
                        di Kota Cilacap.
                    </p>
                    <!-- <ul>
                        <li>
                            <i class="bx bx-store-alt"></i>
                            <div>
                                <h5>Ullamco laboris nisi ut aliquip consequat</h5>
                                <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade</p>
                            </div>
                        </li>
                        <li>
                            <i class="bx bx-images"></i>
                            <div>
                                <h5>Magnam soluta odio exercitationem reprehenderi</h5>
                                <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi</p>
                            </div>
                        </li>
                    </ul> -->
                    <p>
                        Apabila memiliki keluhan atau kritik dan saran, anda dapat menghubungi kami melalui form berikut.
                    </p>
                    <br>
                    <h4 class="text-center">Hubungi Kami</h4>
                    <div class="col-lg-126">
                        <form action="<?= site_url() ?>home/mail" method="post" role="form" class="php-email-form">
                            <div class="row mb-2">
                                <div class="col form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" required>
                                </div>
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" required>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" required>
                            </div>
                            <div class="form-group mb-2">
                                <textarea class="form-control" name="message" rows="5" placeholder="Pesan" required></textarea>
                            </div>
                            <div class="text-center mb-2"><button class="btn btn-primary" type="submit">Kirim Pesan</button></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End About Section -->
</main>
<!-- End #main -->