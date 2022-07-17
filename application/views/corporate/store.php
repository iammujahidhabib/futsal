<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<section id="about" class="about section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title mb-3">
            <!-- <h2>Artikel</h2> -->
            <h3>Transaksi</h3>
            <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>
        <div class="row">
            <div class="col-lg-8 aos-init aos-animate content" data-aos="fade-right" data-aos-delay="100">
                <h4>Lapangan Futsal <?= $place->name ?></h4>
                <div class="row">
                    <div class="col-sm-6">
                        <img src="<?= base_url() ?>asset/image/<?= $place->photo ?>" class="img-fluid" alt="">
                    </div>
                    <div class="col-sm-6">
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
                    </div>
                    <div class="col-lg-6 col-sm-12 mt-3">
                        <div class="form-group card" style="border-radius: 20px;padding: 20px;">
                            <h5>Bank <?= $place->bank ?></h5>
                            <p>Nomor Rekening : <?= $place->bank_account ?></p>
                            <p>Nama Rekening : <?= $place->bank_name ?></p>
                            <p class="small text-danger">*Silahkan transfer terlebih dahulu kemudian upload bukti transfer</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 mt-3">
                        <div class="card form-group" style="border-radius: 20px;padding: 20px;">
                            Pembayaran DP minimal 50% dari Total Pembayaran.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pt-4 pt-lg-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <h4>Ringkasan Sewa Lapangan</h4>
                <table class="example2 table table-bordered" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr>
                            <td>Keterangan</td>
                            <td>Total Bayar</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        $i = 0;
                        foreach ($price as $key) {
                        ?>
                            <tr>
                                <td><b>Jam <?= $rent['start'] + $i . ":00" ?></td>
                                <td><b>Rp <?= number_format($key->price,0,',','.'); ?></b></td>
                            </tr>
                        <?php $i++;
                            $no += $key->price;
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><b><?= $field->name ?> (<?= $rent['end'] - $rent['start'] ?> Jam)</b><br><?= $rent['date'] ?> <?= $rent['start'] . ":00-" . $rent['end'] . ":00" ?></td>
                            <td><b>Rp <?= number_format($no,0,',','.'); ?></b></td>
                        </tr>
                    </tfoot>
                </table>
                <form method="post" enctype="multipart/form-data" action="<?= site_url('transaksi/save') ?>">
                    <input type="hidden" name="total" value="<?= $no ?>">
                    <input type="hidden" name="place_id" value="<?= $rent['place_id'] ?>">
                    <input type="hidden" name="field_id" value="<?= $rent['field_id'] ?>">
                    <input type="hidden" name="user_id" value="<?= $rent['user_id'] ?>">
                    <input type="hidden" name="date" value="<?= $rent['date'] ?>">
                    <input type="hidden" name="start" value="<?= $rent['start'] ?>">
                    <input type="hidden" name="end" value="<?= $rent['end'] ?>">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Pembayaran</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="type" id="type_bayar" required>
                                <option value="" selected disabled>Pilih Jenis Pembayaran</option>
                                <option value="1">DP</option>
                                <option value="2">Lunas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="asdasd">Bank Pembayaran</label>
                            <select class="form-control" required name="rent_bank" id="asdasd">
                                <option value="" disabled selected>Pilih Bank Pembayaran</option>
                                <option value="BCA">BCA</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="BNI">BNI</option>
                                <option value="BRI">BRI</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="zzz">Nominal Pembayaran</label>
                            <input type="number" min="0" id="zzz" class="form-control" name="dp" value="<?=$no/2?>" required>
                        </div>
                        <div class="form-group">
                            <label for="aaaasdasd">Nomor Rekening Pembayaran</label>
                            <input type="text" id="aaaasdasd" class="form-control" name="rent_bank_account" required>
                        </div>
                        <div class="form-group">
                            <label for="asadsdasd">Nama Rekening Pembayaran</label>
                            <input type="text" id="asadsdasd" class="form-control" name="rent_bank_name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Bukti Transfer</label>
                            <input type="file" name="bill_file" required class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-sm btn-block btn-primary w-100" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    // $(document).ready(function(){
    //     $("#type_bayar").change(function(){
    //         event.preventDefault();
    //         var zzz = $(this).val()
    //         if(zzz == 1){

    //         }
    //     })
    // })
</script>