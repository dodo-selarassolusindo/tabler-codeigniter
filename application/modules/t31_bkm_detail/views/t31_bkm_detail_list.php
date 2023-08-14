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
                    List Data
                </div>
                <h2 class="page-title">
                    Bkm Detail
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="<?= site_url('t31_bkm_detail/create') ?>" class="btn btn-primary d-none d-sm-inline-block">
                        Tambah Data
                    </a>
                    <a href="<?= site_url() ?>" class="btn btn-secondary d-none d-sm-inline-block">
                        Kembali
                    </a>
                </div>
            </div>
            <!-- Message -->
            <?php if ($this->session->userdata('message') <> '') { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <h4 class="alert-title">Wow! Everything worked!</h4>
                <div class="text-secondary"><?= $this->session->userdata('message') ?></div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">

            <div class="col-12">
                <div class="card">
                    <div class="card-body border-bottom py-3">
                        <div class="d-flex">
                            <div class="text-muted">
                                Cari Data:
                                <div class="ms-2 d-inline-block">
                                    <form action="<?= site_url('t31_bkm_detail/index') ?>" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" name="q" value="<?= $q ?>">
                                            <span class="input-group-btn">
                                                <?php if ($q <> '') { ?>
                                                <a href="<?= site_url('t31_bkm_detail') ?>" class="btn btn-secondary btn-sm">Reset</a>
                                                <?php } ?>
                                                <button class="btn btn-primary btn-sm" type="submit">Cari</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <tr>
                                <th>No</th>
                                <th>Bkm</th>
                                <th>Name</th>
                                <th>Mf</th>
                                <th>Country</th>
                                <th>Id Number</th>
                                <th>Package</th>
                                <th>Night</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Agent</th>
                                <th>Mata Uang</th>
                                <th>Price</th>
                                <th>Remarks</th>
                                <th>Usd</th>
                                <th>Aud</th>
                                <th>Paypal</th>
                                <th>Bca Dollar</th>
                                <th>Rp</th>
                                <th>Cc Bca</th>
                                <th>Cc Mandiri</th>
                                <th>Price 1</th>
                                <th>Price 1 Value</th>
                                <th>Fee Tanas</th>
                                <th>Fee Tanas Value</th>
                                <th>Price 2</th>
                                <th>Proses Data</th>
                            </tr>
                            <?php foreach ($t31_bkm_detail_data as $t31_bkm_detail) { ?>
                            <tr>
                                <td width="80px"><?= ++$start ?></td>
                                <td><?= $t31_bkm_detail->bkm ?></td>
                                <td><?= $t31_bkm_detail->name ?></td>
                                <td><?= $t31_bkm_detail->mf ?></td>
                                <td><?= $t31_bkm_detail->country ?></td>
                                <td><?= $t31_bkm_detail->id_number ?></td>
                                <td><?= $t31_bkm_detail->package ?></td>
                                <td><?= $t31_bkm_detail->night ?></td>
                                <td><?= $t31_bkm_detail->check_in ?></td>
                                <td><?= $t31_bkm_detail->check_out ?></td>
                                <td><?= $t31_bkm_detail->agent ?></td>
                                <td><?= $t31_bkm_detail->mata_uang ?></td>
                                <td><?= $t31_bkm_detail->price ?></td>
                                <td><?= $t31_bkm_detail->remarks ?></td>
                                <td><?= $t31_bkm_detail->usd ?></td>
                                <td><?= $t31_bkm_detail->aud ?></td>
                                <td><?= $t31_bkm_detail->paypal ?></td>
                                <td><?= $t31_bkm_detail->bca_dollar ?></td>
                                <td><?= $t31_bkm_detail->rp ?></td>
                                <td><?= $t31_bkm_detail->cc_bca ?></td>
                                <td><?= $t31_bkm_detail->cc_mandiri ?></td>
                                <td><?= $t31_bkm_detail->price_1 ?></td>
                                <td><?= $t31_bkm_detail->price_1_value ?></td>
                                <td><?= $t31_bkm_detail->fee_tanas ?></td>
                                <td><?= $t31_bkm_detail->fee_tanas_value ?></td>
                                <td><?= $t31_bkm_detail->price_2 ?></td>
                                <td style="text-align:center" width="200px">
                                <?php
                                echo anchor(site_url('t31_bkm_detail/read/'.$t31_bkm_detail->id),'Read');
                                echo ' | ';
                                echo anchor(site_url('t31_bkm_detail/update/'.$t31_bkm_detail->id),'Update');
                                echo ' | ';
                                echo anchor(site_url('t31_bkm_detail/delete/'.$t31_bkm_detail->id),'Delete','onclick="javasciprt: return confirm(\'Hapus data ?\')"');
                                ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-muted">Menampilkan <span><?= count($t31_bkm_detail_data) ?></span> dari <span><?= $total_rows ?></span> data</p>
                        <?= $pagination ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('dist/_partials/footer') ?>
