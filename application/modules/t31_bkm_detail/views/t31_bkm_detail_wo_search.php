<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
                    <div class="row">
                        <div class="col-4">
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable bkm_detail">
                                    <tr>
                                        <!-- <th>No</th> -->
                                        <th rowspan="2">Name</th>
                                        <th rowspan="2">Package</th>
                                        <th rowspan="2">Night</th>
                                        <th style="padding-right: 0px;padding-left: 0px;width: 1px;">&nbsp;</th>
                                        <!-- <th rowspan="2">Check In</th>
                                        <th rowspan="2">Check Out</th>
                                        <th rowspan="2">Agent</th>
                                        <th rowspan="2">Price List</th>
                                        <th rowspan="2">Price #1</th>
                                        <th rowspan="2">Fee Taman Nasional</th>
                                        <th rowspan="2">Price #2</th>
                                        <th rowspan="2">Remarks</th>
                                        <th colspan="8" class="text-center">Payment</th> -->
                                    </tr>
                                    <tr>
                                        <td style="padding-right: 0px;padding-left: 0px;width: 1px;">&nbsp;</td>
                                    </tr>
                                    <?php $t31_bkm_detail = $t31_bkm_detail_data ?>
                                    <?php // foreach ($t31_bkm_detail_data as $t31_bkm_detail) { ?>
                                    <tr>
                                        <!-- <td><?= ++$start ?></td> -->
                                        <td><?= $t31_bkm_detail->name ?></td>
                                        <td><?= $t31_bkm_detail->package ?></td>
                                        <td><?= $t31_bkm_detail->night ?></td>
                                        <td style="padding-right: 0px;padding-left: 0px;width: 1px;">&nbsp;</td>
                                    </tr>
                                    <?php // } ?>
                                </table>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable bkm_detail">
                                    <tr>
                                        <!-- <th>No</th> -->
                                        <!-- <th rowspan="2">Name</th>
                                        <th rowspan="2">Package</th>
                                        <th rowspan="2">Night</th> -->
                                        <th rowspan="2">Check In</th>
                                        <th rowspan="2">Check Out</th>
                                        <th rowspan="2">Agent</th>
                                        <th rowspan="2">Price List</th>
                                        <th rowspan="2">Price #1</th>
                                        <th rowspan="2">Fee Taman Nasional</th>
                                        <th rowspan="2">Price #2</th>
                                        <th rowspan="2">Remarks</th>
                                        <th colspan="8" class="text-center">Payment</th>
                                    </tr>
                                    <tr>
                                        <?php foreach($this->T07_kolom_payment_model->get_all() as $row) { ?>
                                        <th class="text-center"><?= $row->nama ?></th>
                                        <?php } ?>
                                    </tr>
                                    <?php $t31_bkm_detail = $t31_bkm_detail_data ?>
                                    <?php // foreach ($t31_bkm_detail_data as $t31_bkm_detail) { ?>
                                    <tr>
                                        <!-- <td><?= ++$start ?></td> -->
                                        <!-- <td><?= $t31_bkm_detail->name ?></td>
                                        <td><?= $t31_bkm_detail->package ?></td>
                                        <td><?= $t31_bkm_detail->night ?></td> -->
                                        <td><?= date_dmy($t31_bkm_detail->check_in) ?></td>
                                        <td><?= date_dmy($t31_bkm_detail->check_out) ?></td>
                                        <td><?= $t31_bkm_detail->agent ?></td>
                                        <td><?= $t31_bkm_detail->mata_uang.' '.$t31_bkm_detail->price ?></td>
                                        <td><?= ($t31_bkm_detail->price_1_value != '' ? (substr(trim($t31_bkm_detail->price_1), 0, 4) == '[$00' ? 'USD ' : (substr(trim($t31_bkm_detail->price_1), 0, 4) == '[$am' ? 'AUD ' : '')) . number_format($t31_bkm_detail->price_1_value, 0) : '') ?></td>
                                        <td><?= ($t31_bkm_detail->fee_tanas_value != '' ? (substr(trim($t31_bkm_detail->fee_tanas), 0, 4) == '[$00' ? 'USD ' : (substr(trim($t31_bkm_detail->fee_tanas), 0, 4) == '[$am' ? 'AUD ' : '')) . number_format($t31_bkm_detail->fee_tanas_value, 0) : '') ?></td>
                                        <td><?= $t31_bkm_detail->price_2 ?></td>
                                        <td><?= $t31_bkm_detail->remarks ?></td>
                                        <?php foreach($this->T07_kolom_payment_model->get_all() as $row) { ?>
                                            <?php $var = 'echo $t31_bkm_detail->kolom_payment_id_'.$row->id.' == 0 ? "" : number_format($t31_bkm_detail->kolom_payment_id_'.$row->id.', 0);' ?>
                                            <td class="text-right"><?php eval($var) ?></td>
                                        <?php } ?>
                                    </tr>
                                    <?php // } ?>
                                </table>
                            </div>
                        </div>
                    </div>
