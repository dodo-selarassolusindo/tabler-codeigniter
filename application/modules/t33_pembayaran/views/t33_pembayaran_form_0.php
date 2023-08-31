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
                    Pembayaran
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
                                <label class="form-label required" for="bkm_detail">Bkm Detail <?php echo form_error('bkm_detail') ?></label>
                                <div><input type="text" class="form-control" name="bkm_detail" id="bkm_detail" placeholder="Bkm Detail" value="<?php echo $bkm_detail; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="tanggal">Tanggal <?php echo form_error('tanggal') ?></label>
                                <div><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="mata_uang">Mata Uang <?php echo form_error('mata_uang') ?></label>
                                <div><input type="text" class="form-control" name="mata_uang" id="mata_uang" placeholder="Mata Uang" value="<?php echo $mata_uang; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="jumlah">Jumlah <?php echo form_error('jumlah') ?></label>
                                <div><input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" /></div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><?= $button ?></button>
                    	    <a href="<?php echo site_url('t33_pembayaran') ?>" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dist/_partials/footer') ?>
