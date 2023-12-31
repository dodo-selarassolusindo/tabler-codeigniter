<?php

$string2 =
"<?php
defined('BASEPATH') OR exit('No direct script access allowed');
\$this->load->view('dist/_partials/header');
?>
<!-- Page header -->
<div class=\"page-header d-print-none\">
    <div class=\"container-xl\">
        <div class=\"row g-2 align-items-center\">
            <div class=\"col\">
                <!-- Page pre-title -->
                <div class=\"page-pretitle\">
                    List Data
                </div>
                <h2 class=\"page-title\">
                    ".ucwords(implode(' ', explode('_', substr($table_name, 4))))."
                </h2>
            </div>
            <!-- Page title actions -->
            <div class=\"col-auto ms-auto d-print-none\">
                <div class=\"btn-list\">
                    <a href=\"<?= site_url('".$c_url."/create') ?>\" class=\"btn btn-primary d-none d-sm-inline-block\">
                        Tambah Data
                    </a>
                    <a href=\"<?= site_url() ?>\" class=\"btn btn-secondary d-none d-sm-inline-block\">
                        Kembali
                    </a>
                </div>
            </div>
            <!-- Message -->
            <?php if (\$this->session->userdata('message') <> '') { ?>
            <div class=\"alert alert-success alert-dismissible\" role=\"alert\">
                <!-- <h4 class=\"alert-title\">Wow! Everything worked!</h4> -->
                <div class=\"text-secondary\"><?= \$this->session->userdata('message') ?></div>
                <a class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"close\"></a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Page body -->
<div class=\"page-body\">
    <div class=\"container-xl\">
        <div class=\"row row-cards\">

            <div class=\"col-12\">
                <div class=\"card\">
                    <div class=\"card-body border-bottom py-3\">
                        <div class=\"d-flex\">
                            <div class=\"text-muted\">
                                Cari Data:
                                <div class=\"ms-2 d-inline-block\">
                                    <form action=\"<?= site_url('$c_url/index') ?>\" method=\"get\">
                                        <div class=\"input-group\">
                                            <input type=\"text\" class=\"form-control form-control-sm\" name=\"q\" value=\"<?= \$q ?>\">
                                            <span class=\"input-group-btn\">
                                                <?php if (\$q <> '') { ?>
                                                <a href=\"<?= site_url('$c_url') ?>\" class=\"btn btn-secondary btn-sm\">Reset</a>
                                                <?php } ?>
                                                <button class=\"btn btn-primary btn-sm\" type=\"submit\">Cari</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"table-responsive\">
                        <table class=\"table card-table table-vcenter text-nowrap datatable\">
                            <tr>
                                <th>No</th>";
                                foreach ($non_pk as $row) {
                                    $string2 .= "
                                <th>" . label($row['column_name']) . "</th>";
                                }
                        		$string2 .= "
                                <th>Proses Data</th>
                            </tr>";
                            $string2 .= "
                            <?php foreach ($".$c_url."_data as \$$c_url) { ?>
                            <tr>";
                            $string2 .= "
                                <td><?= ++\$start ?></td>";
                            foreach ($non_pk as $row) {
                                $string2 .= "
                                <td><?= $" . $c_url ."->". $row['column_name'] . " ?></td>";
                            }
                            $string2 .= "
                                <td>
                                <?php
                                echo anchor(site_url('".$c_url."/read/'.$".$c_url."->".$pk."),'Detail');
                                echo ' | ';
                                echo anchor(site_url('".$c_url."/update/'.$".$c_url."->".$pk."),'Ubah');
                                echo ' | ';
                                echo anchor(site_url('".$c_url."/delete/'.$".$c_url."->".$pk."),'Hapus','onclick=\"javasciprt: return confirm(\\'Hapus data ?\\')\"');
                                ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class=\"card-footer d-flex align-items-center\">
                        <p class=\"m-0 text-muted\">Menampilkan <span><?= count($".$c_url."_data) ?></span> dari <span><?= \$total_rows ?></span> data</p>
                        <?= \$pagination ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php \$this->load->view('dist/_partials/footer') ?>
";

$string = "<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel=\"stylesheet\" href=\"<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>\"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style=\"margin-top:0px\">".ucfirst($table_name)." List</h2>
        <div class=\"row\" style=\"margin-bottom: 10px\">
            <div class=\"col-md-4\">
                <?= anchor(site_url('".$c_url."/create'),'Create', 'class=\"btn btn-primary\"') ?>
            </div>
            <div class=\"col-md-4 text-center\">
                <div style=\"margin-top: 8px\" id=\"message\">
                    <?= \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : '' ?>
                </div>
            </div>
            <div class=\"col-md-1 text-right\">
            </div>
            <div class=\"col-md-3 text-right\">
                <form action=\"<?= site_url('$c_url/index') ?>\" class=\"form-inline\" method=\"get\">
                    <div class=\"input-group\">
                        <input type=\"text\" class=\"form-control\" name=\"q\" value=\"<?= \$q ?>\">
                        <span class=\"input-group-btn\">
                            <?php
                                if (\$q <> '')
                                {
                                    ?>
                                    <a href=\"<?= site_url('$c_url') ?>\" class=\"btn btn-default\">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class=\"btn btn-primary\" type=\"submit\">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class=\"table table-bordered\" style=\"margin-bottom: 10px\">
            <tr>
                <th>No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t<th>Action</th>
            </tr>";
$string .= "<?php
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
                <tr>";

$string .= "\n\t\t\t<td width=\"80px\"><?= ++\$start ?></td>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t<td><?= $" . $c_url ."->". $row['column_name'] . " ?></td>";
}


$string .= "\n\t\t\t<td style=\"text-align:center\" width=\"200px\">"
        . "\n\t\t\t\t<?php "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/read/'.$".$c_url."->".$pk."),'Read'); "
        . "\n\t\t\t\techo ' | '; "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/update/'.$".$c_url."->".$pk."),'Update'); "
        . "\n\t\t\t\techo ' | '; "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/delete/'.$".$c_url."->".$pk."),'Delete','onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"'); "
        . "\n\t\t\t\t?>"
        . "\n\t\t\t</td>";

$string .=  "\n\t\t</tr>
                <?php
            }
            ?>
        </table>
        <div class=\"row\">
            <div class=\"col-md-6\">
                <a href=\"#\" class=\"btn btn-primary\">Total Record : <?= \$total_rows ?></a>";

$string .= "\n\t    </div>
            <div class=\"col-md-6 text-right\">
                <?= \$pagination ?>
            </div>
        </div>
    </body>
</html>";


$hasil_view_list = createFile($string2, $target."views/" . $c_url . "/" . $v_list_file);

?>
