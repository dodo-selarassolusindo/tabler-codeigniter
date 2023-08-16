<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    View Detail Data
                </div>
                <h2 class="page-title">
                    Bkm
                </h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <tr><td>Nomor</td><td><?php echo $nomor; ?></td></tr>
                            <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
                            <tr><td>Rate Usd</td><td><?php echo $rate_usd; ?></td></tr>
                            <tr><td>Rate Aud</td><td><?php echo $rate_aud; ?></td></tr>
                            <tr><td></td><td><a href="<?php echo site_url('t30_bkm') ?>" class="btn btn-secondary">Kembali</a></td></tr>
                        </table>
                    </div>
                    <?= $t31_bkm_detail_data ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dist/_partials/footer') ?>
