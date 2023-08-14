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
        <h2 style="margin-top:0px">T31_bkm_detail Read</h2>
        <table class="table">
	    <tr><td>Bkm</td><td><?php echo $bkm; ?></td></tr>
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Mf</td><td><?php echo $mf; ?></td></tr>
	    <tr><td>Country</td><td><?php echo $country; ?></td></tr>
	    <tr><td>Id Number</td><td><?php echo $id_number; ?></td></tr>
	    <tr><td>Package</td><td><?php echo $package; ?></td></tr>
	    <tr><td>Night</td><td><?php echo $night; ?></td></tr>
	    <tr><td>Check In</td><td><?php echo $check_in; ?></td></tr>
	    <tr><td>Check Out</td><td><?php echo $check_out; ?></td></tr>
	    <tr><td>Agent</td><td><?php echo $agent; ?></td></tr>
	    <tr><td>Mata Uang</td><td><?php echo $mata_uang; ?></td></tr>
	    <tr><td>Price</td><td><?php echo $price; ?></td></tr>
	    <tr><td>Remarks</td><td><?php echo $remarks; ?></td></tr>
	    <tr><td>Usd</td><td><?php echo $usd; ?></td></tr>
	    <tr><td>Aud</td><td><?php echo $aud; ?></td></tr>
	    <tr><td>Paypal</td><td><?php echo $paypal; ?></td></tr>
	    <tr><td>Bca Dollar</td><td><?php echo $bca_dollar; ?></td></tr>
	    <tr><td>Rp</td><td><?php echo $rp; ?></td></tr>
	    <tr><td>Cc Bca</td><td><?php echo $cc_bca; ?></td></tr>
	    <tr><td>Cc Mandiri</td><td><?php echo $cc_mandiri; ?></td></tr>
	    <tr><td>Price 1</td><td><?php echo $price_1; ?></td></tr>
	    <tr><td>Price 1 Value</td><td><?php echo $price_1_value; ?></td></tr>
	    <tr><td>Fee Tanas</td><td><?php echo $fee_tanas; ?></td></tr>
	    <tr><td>Fee Tanas Value</td><td><?php echo $fee_tanas_value; ?></td></tr>
	    <tr><td>Price 2</td><td><?php echo $price_2; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t31_bkm_detail') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>