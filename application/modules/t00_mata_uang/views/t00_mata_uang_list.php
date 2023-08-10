<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- <!doctype html>
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
    <body> -->
        <!-- <h2 style="margin-top:0px">T00_mata_uang List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t00_mata_uang/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t00_mata_uang/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t00_mata_uang'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>Nama</th>
		<th>Simbol</th>
		<th>Action</th>
            </tr><?php
            foreach ($t00_mata_uang_data as $t00_mata_uang)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $t00_mata_uang->kode ?></td>
			<td><?php echo $t00_mata_uang->nama ?></td>
			<td><?php echo $t00_mata_uang->simbol ?></td>
			<td style="text-align:center" width="200px">
				<?php
				echo anchor(site_url('t00_mata_uang/read/'.$t00_mata_uang->id),'Read');
				echo ' | ';
				echo anchor(site_url('t00_mata_uang/update/'.$t00_mata_uang->id),'Update');
				echo ' | ';
				echo anchor(site_url('t00_mata_uang/delete/'.$t00_mata_uang->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>

<?php $this->load->view('dist/_partials/footer'); ?>
