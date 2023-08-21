<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <tr>
                                <th>No</th>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Rate Usd</th>
                                <th>Rate Aud</th>
                            </tr>
                            <?php $t30_bkm = $t30_bkm_data ?>
                            <?php // foreach ($t30_bkm_data as $t30_bkm) { ?>
                            <tr>
                                <td width="80px"><?= ++$start ?></td>
                                <td><?= $t30_bkm->nomor ?></td>
                                <td><?= $t30_bkm->tanggal ?></td>
                                <td><?= $t30_bkm->rate_usd ?></td>
                                <td><?= $t30_bkm->rate_aud ?></td>
                            </tr>
                            <?php // } ?>
                        </table>
                    </div>
