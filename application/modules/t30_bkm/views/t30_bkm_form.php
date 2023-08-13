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
        <h2 style="margin-top:0px">T30_bkm <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nomor <?php echo form_error('nomor') ?></label>
            <input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor" value="<?php echo $nomor; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Rate Usd <?php echo form_error('rate_usd') ?></label>
            <input type="text" class="form-control" name="rate_usd" id="rate_usd" placeholder="Rate Usd" value="<?php echo $rate_usd; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Rate Aud <?php echo form_error('rate_aud') ?></label>
            <input type="text" class="form-control" name="rate_aud" id="rate_aud" placeholder="Rate Aud" value="<?php echo $rate_aud; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t30_bkm') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>