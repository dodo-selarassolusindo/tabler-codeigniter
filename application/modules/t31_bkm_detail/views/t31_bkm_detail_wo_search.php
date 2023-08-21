<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <tr>
                                <th>No</th>
                                <!-- <th>Bkm</th> -->
                                <th>Name</th>
                                <!-- <th>Mf</th> -->
                                <!-- <th>Country</th> -->
                                <!-- <th>Id Number</th> -->
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
                            </tr>
                            <?php $t31_bkm_detail = $t31_bkm_detail_data ?>
                            <?php // foreach ($t31_bkm_detail_data as $t31_bkm_detail) { ?>
                            <tr>
                                <td width="80px"><?= ++$start ?></td>
                                <!-- <td><?= $t31_bkm_detail->bkm ?></td> -->
                                <td><?= $t31_bkm_detail->name ?></td>
                                <!-- <td><?= $t31_bkm_detail->mf ?></td> -->
                                <!-- <td><?= $t31_bkm_detail->country ?></td> -->
                                <!-- <td><?= $t31_bkm_detail->id_number ?></td> -->
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
                            </tr>
                            <?php // } ?>
                        </table>
                    </div>
