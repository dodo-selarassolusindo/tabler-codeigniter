<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

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
                            </tr>
                            <?php $t31_bkm_detail = $t31_bkm_detail_data ?>
                            <?php // foreach ($t31_bkm_detail_data as $t31_bkm_detail) { ?>
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
                            </tr>
                            <?php // } ?>
                        </table>
                    </div>
