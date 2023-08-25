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
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Package</th>
                                <th>Night</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Agent</th>
                                <th>Price List</th>
                                <th>Price</th>
                                <th>Fee Taman Nasional</th>
                                <th>Pay</th>
                                <th>Remarks</th>
                                <th>Proses Data</th>
                            </tr>
                            <?php foreach ($t31_bkm_detail_data as $t31_bkm_detail) { ?>
                            <tr>
                                <td><?= ++$start ?></td>
                                <td><?= $t31_bkm_detail->name ?></td>
                                <td><?= $t31_bkm_detail->package ?></td>
                                <td><?= $t31_bkm_detail->night ?></td>
                                <td><?= date_dmy($t31_bkm_detail->check_in) ?></td>
                                <td><?= date_dmy($t31_bkm_detail->check_out) ?></td>
                                <td><?= $t31_bkm_detail->agent ?></td>
                                <td><?= $t31_bkm_detail->mata_uang.' '.$t31_bkm_detail->price ?></td>
                                <td><?= ($t31_bkm_detail->price_1_value != '' ? (substr(trim($t31_bkm_detail->price_1), 0, 4) == '[$00' ? 'USD ' : 'AUD ') . number_format($t31_bkm_detail->price_1_value, 0) : '') ?></td>
                                <td><?= ($t31_bkm_detail->fee_tanas_value != '' ? (substr(trim($t31_bkm_detail->fee_tanas), 0, 4) == '[$00' ? 'USD ' : 'AUD ') . number_format($t31_bkm_detail->fee_tanas_value, 0) : '') ?></td>
                                <td><?= $t31_bkm_detail->price_2 ?></td>
                                <td><?= $t31_bkm_detail->remarks ?></td>
                                <td>
                                <?php
                                echo anchor(site_url('t30_bkm/pembayaran/'.$t31_bkm_detail->bkm.'/'.$t31_bkm_detail->id),'Bayar','class="btn btn-primary btn-sm"');
                                // echo ' | ';
                                echo ' '.anchor(site_url('t31_bkm_detail/update/'.$t31_bkm_detail->id),'Ubah','class="btn btn-primary btn-sm"');
                                // echo ' | ';
                                echo ' '.anchor(site_url('t31_bkm_detail/delete/'.$t31_bkm_detail->id),'Hapus','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Hapus data ?\')"');
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
