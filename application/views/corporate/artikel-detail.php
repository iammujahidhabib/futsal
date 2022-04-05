<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Artikel</h2>
            <!-- <h3>Artikel</h3> -->
            <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>

        <div class="row">
            <div class="col-sm-8 m-auto">
                <h3><?= $article->title ?></h3>
                <p class="small text-muted"><?= $article->date ?></p>
                <img src="<?= base_url() ?>asset/image/article/<?= $article->image ?>" class="img-fluid">
                <p class="text-justify"><?= $article->text ?></p>
                <br>
                <p><i class="fa fa-user"></i> Penulis : <?=$writer?></p>
            </div>
        </div>

    </div>
</section><!-- End Pricing Section -->