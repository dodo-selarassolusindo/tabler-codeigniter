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
                    <?= $this->uri->segment(2) == 'create' ? 'Tambah' : 'Ubah'?> Data
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
                    <form action="<?php echo $action; ?>" method="post" class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required" for="nomor">Nomor <?php echo form_error('nomor') ?></label>
                                <div><input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor" value="<?php echo $nomor; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="tanggal">Tanggal <?php echo form_error('tanggal') ?></label>
                                <div><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="rate_usd">Rate Usd <?php echo form_error('rate_usd') ?></label>
                                <div><input type="text" class="form-control" name="rate_usd" id="rate_usd" placeholder="Rate Usd" value="<?php echo $rate_usd; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="rate_aud">Rate Aud <?php echo form_error('rate_aud') ?></label>
                                <div><input type="text" class="form-control" name="rate_aud" id="rate_aud" placeholder="Rate Aud" value="<?php echo $rate_aud; ?>" /></div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><?= $button ?></button>
                    	    <a href="<?php echo site_url('t30_bkm') ?>" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dist/_partials/footer') ?>
