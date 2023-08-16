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
        <h2 style="margin-top:0px">T06_country <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Country Name <?php echo form_error('country_name') ?></label>
            <input type="text" class="form-control" name="country_name" id="country_name" placeholder="Country Name" value="<?php echo $country_name; ?>" />
        </div>
	    <input type="hidden" name="id_country" value="<?php echo $id_country; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t06_country') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>