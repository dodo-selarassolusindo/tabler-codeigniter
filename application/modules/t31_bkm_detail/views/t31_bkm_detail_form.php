<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T31_bkm_detail <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Bkm <?php echo form_error('bkm') ?></label>
            <input type="text" class="form-control" name="bkm" id="bkm" placeholder="Bkm" value="<?php echo $bkm; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Mf <?php echo form_error('mf') ?></label>
            <input type="text" class="form-control" name="mf" id="mf" placeholder="Mf" value="<?php echo $mf; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Country <?php echo form_error('country') ?></label>
            <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?php echo $country; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Number <?php echo form_error('id_number') ?></label>
            <input type="text" class="form-control" name="id_number" id="id_number" placeholder="Id Number" value="<?php echo $id_number; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Package <?php echo form_error('package') ?></label>
            <input type="text" class="form-control" name="package" id="package" placeholder="Package" value="<?php echo $package; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Night <?php echo form_error('night') ?></label>
            <input type="text" class="form-control" name="night" id="night" placeholder="Night" value="<?php echo $night; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Check In <?php echo form_error('check_in') ?></label>
            <input type="text" class="form-control" name="check_in" id="check_in" placeholder="Check In" value="<?php echo $check_in; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Check Out <?php echo form_error('check_out') ?></label>
            <input type="text" class="form-control" name="check_out" id="check_out" placeholder="Check Out" value="<?php echo $check_out; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Agent <?php echo form_error('agent') ?></label>
            <input type="text" class="form-control" name="agent" id="agent" placeholder="Agent" value="<?php echo $agent; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Mata Uang <?php echo form_error('mata_uang') ?></label>
            <input type="text" class="form-control" name="mata_uang" id="mata_uang" placeholder="Mata Uang" value="<?php echo $mata_uang; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Price <?php echo form_error('price') ?></label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $price; ?>" />
        </div>
	    <div class="form-group">
            <label for="remarks">Remarks <?php echo form_error('remarks') ?></label>
            <textarea class="form-control" rows="3" name="remarks" id="remarks" placeholder="Remarks"><?php echo $remarks; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="double">Usd <?php echo form_error('usd') ?></label>
            <input type="text" class="form-control" name="usd" id="usd" placeholder="Usd" value="<?php echo $usd; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Aud <?php echo form_error('aud') ?></label>
            <input type="text" class="form-control" name="aud" id="aud" placeholder="Aud" value="<?php echo $aud; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Paypal <?php echo form_error('paypal') ?></label>
            <input type="text" class="form-control" name="paypal" id="paypal" placeholder="Paypal" value="<?php echo $paypal; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Bca Dollar <?php echo form_error('bca_dollar') ?></label>
            <input type="text" class="form-control" name="bca_dollar" id="bca_dollar" placeholder="Bca Dollar" value="<?php echo $bca_dollar; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Rp <?php echo form_error('rp') ?></label>
            <input type="text" class="form-control" name="rp" id="rp" placeholder="Rp" value="<?php echo $rp; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Cc Bca <?php echo form_error('cc_bca') ?></label>
            <input type="text" class="form-control" name="cc_bca" id="cc_bca" placeholder="Cc Bca" value="<?php echo $cc_bca; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Cc Mandiri <?php echo form_error('cc_mandiri') ?></label>
            <input type="text" class="form-control" name="cc_mandiri" id="cc_mandiri" placeholder="Cc Mandiri" value="<?php echo $cc_mandiri; ?>" />
        </div>
	    <div class="form-group">
            <label for="price_1">Price 1 <?php echo form_error('price_1') ?></label>
            <textarea class="form-control" rows="3" name="price_1" id="price_1" placeholder="Price 1"><?php echo $price_1; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="price_1_value">Price 1 Value <?php echo form_error('price_1_value') ?></label>
            <textarea class="form-control" rows="3" name="price_1_value" id="price_1_value" placeholder="Price 1 Value"><?php echo $price_1_value; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="fee_tanas">Fee Tanas <?php echo form_error('fee_tanas') ?></label>
            <textarea class="form-control" rows="3" name="fee_tanas" id="fee_tanas" placeholder="Fee Tanas"><?php echo $fee_tanas; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="fee_tanas_value">Fee Tanas Value <?php echo form_error('fee_tanas_value') ?></label>
            <textarea class="form-control" rows="3" name="fee_tanas_value" id="fee_tanas_value" placeholder="Fee Tanas Value"><?php echo $fee_tanas_value; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="price_2">Price 2 <?php echo form_error('price_2') ?></label>
            <textarea class="form-control" rows="3" name="price_2" id="price_2" placeholder="Price 2"><?php echo $price_2; ?></textarea>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t31_bkm_detail') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>