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
                    Detail Data
                </div>
                <h2 class="page-title">
                    Bkm Detail Payment
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
                            <tr><td>Bkm Detail</td><td><?php echo $bkm_detail; ?></td></tr>
                            <tr><td>Kolom Payment</td><td><?php echo $kolom_payment; ?></td></tr>
                            <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
                            <tr><td></td><td><a href="<?php echo site_url('t32_bkm_detail_payment') ?>" class="btn btn-secondary">Kembali</a></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dist/_partials/footer') ?>
