<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

                    <div class="card-body border-bottom py-3">
                        <div class="d-flex">
                            <div class="text-muted">
                                Cari Data:
                                <div class="ms-2 d-inline-block">
                                    <form action="<?= site_url('t30_bkm/detail/'.$bkm) ?>" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" name="q" value="<?= $q ?>">
                                            <span class="input-group-btn">
                                                <?php if ($q <> '') { ?>
                                                <a href="<?= site_url('t30_bkm/detail/'.$bkm) ?>" class="btn btn-secondary btn-sm">Reset</a>
                                                <?php } ?>
                                                <button class="btn btn-primary btn-sm" type="submit">Cari</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable bkm_detail">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Name</th>
                                        <th rowspan="2">Package</th>
                                        <th rowspan="2">Night</th>
                                        <th style="padding-right: 0px;padding-left: 0px;width: 1px;">&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <td style="padding-right: 0px;padding-left: 0px;width: 1px;">&nbsp;</td>
                                    </tr>
                                    <?php foreach ($t31_bkm_detail_data as $t31_bkm_detail) { ?>
                                    <tr>
                                        <td><?= ++$start ?></td>
                                        <td><?= $t31_bkm_detail->name ?></td>
                                        <td><?= $t31_bkm_detail->package ?></td>
                                        <td><?= $t31_bkm_detail->night ?></td>
                                        <td style="padding-right: 0px;padding-left: 0px;width: 1px;">&nbsp;</td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable bkm_detail">
                                    <tr>
                                        <th rowspan="2">Check In</th>
                                        <th rowspan="2">Check Out</th>
                                        <th rowspan="2">Agent</th>
                                        <th rowspan="2">Price List</th>
                                        <th rowspan="2">Price #1</th>
                                        <th rowspan="2">Fee Taman Nasional</th>
                                        <th rowspan="2">Price #2</th>
                                        <th rowspan="2">Remarks</th>
                                        <th colspan="8" class="text-center">Payment</th>
                                        <th rowspan="2">Proses Data</th>
                                    </tr>
                                    <tr>
                                        <?php foreach($this->T07_kolom_payment_model->get_all() as $row) { ?>
                                        <th class="text-center"><?= $row->nama ?></th>
                                        <?php } ?>
                                    </tr>
                                    <?php $style = 'style="padding-top: 0px; padding-bottom: 0px; border-bottom-width: 0px; border-top-width: 0px; "'?>
                                    <?php $catatan = array() ?>
                                    <?php foreach ($t31_bkm_detail_data as $t31_bkm_detail) { ?>
                                        <?php
                                            if ($t31_bkm_detail->price_1_value == null
                                                || $t31_bkm_detail->price_1_value == 0
                                                || $t31_bkm_detail->price_1_value == '') {
                                                $catatan[] = $t31_bkm_detail->name . ' : Data Price #1 kosong';
                                            }
                                        ?>
                                    <tr>
                                        <td><?= date_dmy($t31_bkm_detail->check_in) ?></td>
                                        <td><?= date_dmy($t31_bkm_detail->check_out) ?></td>
                                        <td><?= $t31_bkm_detail->agent ?></td>
                                        <td><?= $t31_bkm_detail->mata_uang.' '.$t31_bkm_detail->price ?></td>
                                        <td><?= ($t31_bkm_detail->price_1_value != '' ? (substr(trim($t31_bkm_detail->price_1), 0, 4) == '[$00' ? 'USD ' : 'AUD ') . number_format($t31_bkm_detail->price_1_value, 0) : '') ?></td>
                                        <td><?= ($t31_bkm_detail->fee_tanas_value != '' ? (substr(trim($t31_bkm_detail->fee_tanas), 0, 4) == '[$00' ? 'USD ' : 'AUD ') . number_format($t31_bkm_detail->fee_tanas_value, 0) : '') ?></td>
                                        <td><?= $t31_bkm_detail->price_2 ?></td>
                                        <td><?= $t31_bkm_detail->remarks ?></td>
                                        <?php foreach($this->T07_kolom_payment_model->get_all() as $row) { ?>
                                            <?php $var = 'echo $t31_bkm_detail->kolom_payment_id_'.$row->id.' == 0 ? "" : number_format($t31_bkm_detail->kolom_payment_id_'.$row->id.', 0);' ?>
                                            <td class="text-right"><?php eval($var) ?></td>
                                        <?php } ?>
                                        <td>
                                        <?php
                                        if ($this->T33_pembayaran_model->get_by_bkm_detail($t31_bkm_detail->id)) {
                                            if ($this->T33_pembayaran_model->get_by_bkm_detail($t31_bkm_detail->id)->dibayar_oleh == $t31_bkm_detail->id) {
                                                echo anchor(site_url('t30_bkm/pembayaran/'.$t31_bkm_detail->bkm.'/'.$t31_bkm_detail->id),'Edit Bayar','class="btn btn-primary btn-sm m-0" '.$style);
                                                echo ' ';
                                            }
                                        } else {
                                            echo anchor(site_url('t30_bkm/pembayaran/'.$t31_bkm_detail->bkm.'/'.$t31_bkm_detail->id),'Bayar','class="btn btn-primary btn-sm m-0" '.$style);
                                            echo ' ';
                                        }
                                        echo anchor(site_url('t31_bkm_detail/update/'.$t31_bkm_detail->id),'Ubah','class="btn btn-primary btn-sm m-0" '.$style);
                                        ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="card-footer d-flex align-items-center"> -->
                    <div class="card-footer">
                        <p class="m-0 text-muted">Menampilkan <span><?= count($t31_bkm_detail_data) ?></span> dari <span><?= $total_rows ?></span> data</p>
                        <?= $pagination ?>
                        <?php if ($catatan) { ?>
                            <p class="m-0 text-warning">Catatan:</p>
                            <?php foreach($catatan as $row) { ?>
                                <p class="m-0 text-warning">- <?= $row?></p>
                            <?php } ?>
                        <?php } ?>
                    </div>
