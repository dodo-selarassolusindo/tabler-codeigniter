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
                    Bkm Detail
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
                    <?= $t30_bkm ?>
                </div>
            </div>
        </div>
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <form action="<?php echo $action; ?>" method="post" class="card">
                        <div class="card-body">
                            <!-- <div class="mb-3">
                                <label class="form-label required" for="bkm">Bkm <?php echo form_error('bkm') ?></label>
                                <div><input type="text" class="form-control" name="bkm" id="bkm" placeholder="Bkm" value="<?php echo $bkm; ?>" /></div>
                            </div> -->
                            <input type="hidden" name="bkm" value="<?php echo $bkm; ?>" />
                            <div class="mb-3">
                                <label class="form-label required" for="name">Name <?php echo form_error('name') ?></label>
                                <div><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="mf">Male/Female <?php echo form_error('mf') ?></label>
                                <div>
                                    <!-- <input type="text" class="form-control" name="mf" id="mf" placeholder="Mf" value="<?php echo $mf; ?>" /> -->
                                    <select class="form-control" name="mf" id="mf">
                                        <option value="Male" <?= $mf == 'Male' ? 'selected' : '' ?>>Male</option>
                                        <option value="Female" <?= $mf == 'Female' ? 'selected' : '' ?>>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="country">Country <?php echo form_error('country') ?></label>
                                <div><input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?php echo $country; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="id_number">ID Number <?php echo form_error('id_number') ?></label>
                                <div><input type="text" class="form-control" name="id_number" id="id_number" placeholder="Id Number" value="<?php echo $id_number; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="package">Package <?php echo form_error('package') ?></label>
                                <div><input type="text" class="form-control" name="package" id="package" placeholder="Package" value="<?php echo $package; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="night">Night <?php echo form_error('night') ?></label>
                                <div><input type="text" class="form-control" name="night" id="night" placeholder="Night" value="<?php echo $night; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="check_in">Check In <?php echo form_error('check_in') ?></label>
                                <div><input type="text" class="form-control" name="check_in" id="check_in" placeholder="Check In" value="<?php echo $check_in; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="check_out">Check Out <?php echo form_error('check_out') ?></label>
                                <div><input type="text" class="form-control" name="check_out" id="check_out" placeholder="Check Out" value="<?php echo $check_out; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="agent">Agent <?php echo form_error('agent') ?></label>
                                <div><input type="text" class="form-control" name="agent" id="agent" placeholder="Agent" value="<?php echo $agent; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="mata_uang">Mata Uang <?php echo form_error('mata_uang') ?></label>
                                <div><input type="text" class="form-control" name="mata_uang" id="mata_uang" placeholder="Mata Uang" value="<?php echo $mata_uang; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="price">Price <?php echo form_error('price') ?></label>
                                <div><input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $price; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="remarks">Remarks <?php echo form_error('remarks') ?></label>
                                <div><textarea class="form-control" rows="3" name="remarks" id="remarks" placeholder="Remarks"><?php echo $remarks; ?></textarea></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="usd">Usd <?php echo form_error('usd') ?></label>
                                <div><input type="text" class="form-control" name="usd" id="usd" placeholder="Usd" value="<?php echo $usd; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="aud">Aud <?php echo form_error('aud') ?></label>
                                <div><input type="text" class="form-control" name="aud" id="aud" placeholder="Aud" value="<?php echo $aud; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="paypal">Paypal <?php echo form_error('paypal') ?></label>
                                <div><input type="text" class="form-control" name="paypal" id="paypal" placeholder="Paypal" value="<?php echo $paypal; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="bca_dollar">Bca Dollar <?php echo form_error('bca_dollar') ?></label>
                                <div><input type="text" class="form-control" name="bca_dollar" id="bca_dollar" placeholder="Bca Dollar" value="<?php echo $bca_dollar; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="rp">Rp <?php echo form_error('rp') ?></label>
                                <div><input type="text" class="form-control" name="rp" id="rp" placeholder="Rp" value="<?php echo $rp; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="cc_bca">Cc Bca <?php echo form_error('cc_bca') ?></label>
                                <div><input type="text" class="form-control" name="cc_bca" id="cc_bca" placeholder="Cc Bca" value="<?php echo $cc_bca; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="cc_mandiri">Cc Mandiri <?php echo form_error('cc_mandiri') ?></label>
                                <div><input type="text" class="form-control" name="cc_mandiri" id="cc_mandiri" placeholder="Cc Mandiri" value="<?php echo $cc_mandiri; ?>" /></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="price_1">Price 1 <?php echo form_error('price_1') ?></label>
                                <div><textarea class="form-control" rows="3" name="price_1" id="price_1" placeholder="Price 1"><?php echo $price_1; ?></textarea></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="price_1_value">Price 1 Value <?php echo form_error('price_1_value') ?></label>
                                <div><textarea class="form-control" rows="3" name="price_1_value" id="price_1_value" placeholder="Price 1 Value"><?php echo $price_1_value; ?></textarea></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="fee_tanas">Fee Tanas <?php echo form_error('fee_tanas') ?></label>
                                <div><textarea class="form-control" rows="3" name="fee_tanas" id="fee_tanas" placeholder="Fee Tanas"><?php echo $fee_tanas; ?></textarea></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="fee_tanas_value">Fee Tanas Value <?php echo form_error('fee_tanas_value') ?></label>
                                <div><textarea class="form-control" rows="3" name="fee_tanas_value" id="fee_tanas_value" placeholder="Fee Tanas Value"><?php echo $fee_tanas_value; ?></textarea></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="price_2">Price 2 <?php echo form_error('price_2') ?></label>
                                <div><textarea class="form-control" rows="3" name="price_2" id="price_2" placeholder="Price 2"><?php echo $price_2; ?></textarea></div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><?= $button ?></button>
                    	    <a href="<?php echo site_url('t31_bkm_detail') ?>" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dist/_partials/footer') ?>
