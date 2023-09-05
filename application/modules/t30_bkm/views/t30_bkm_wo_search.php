<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

                    <div class="card-header">
                        <h3 class="card-title">BKM</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <tr>
                                <!-- <th>No</th> -->
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Rate Usd</th>
                                <th>Rate Aud</th>
                            </tr>
                            <?php $t30_bkm = $t30_bkm_data ?>
                            <?php // foreach ($t30_bkm_data as $t30_bkm) { ?>
                            <tr>
                                <!-- <td><?= ++$start ?></td> -->
                                <td><?= $t30_bkm->nomor ?></td>
                                <td><?= date_dmy($t30_bkm->tanggal) ?></td>
                                <td><?= number_format($t30_bkm->rate_usd, 0) ?></td>
                                <td><?= number_format($t30_bkm->rate_aud, 0) ?></td>
                            </tr>
                            <?php // } ?>
                        </table>
                    </div>
