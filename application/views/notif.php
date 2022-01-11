<?php $this->load->view('template/header'); 
usort($notif, function($a, $b) { return $b->date > $a->date; });

?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <!-- Page Heading/Breadcrumbs -->
        <!-- <h1 class="mt-4 mb-4 text-center">Notifikasi Anda</h1> -->
        <p class="text-center">Update Pemberitahuan Untuk Admin</p>
        <div class="table-responsive">
            <table class="table">
                <?php foreach ($notif as $key) { ?>
                    <tr>
                        <td><?= $key->notif ?></td>
                        <td><?= date("d M Y H:i",strtotime($key->date)) ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<?php $this->load->view('template/footer'); ?>