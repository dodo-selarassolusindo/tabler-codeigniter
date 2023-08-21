<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
                    <div class="card-header">
                        <h3 class="card-title">BKM</h3>
                    </div>
                    <div class="card-body border-bottom py-3">
                        <div class="d-flex">
                            <div class="text-muted">
                                Cari Data:
                                <div class="ms-2 d-inline-block">
                                    <form action="<?= site_url('t30_bkm/pembayaran') ?>" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" name="q" value="<?= $q ?>">
                                            <span class="input-group-btn">
                                                <?php if ($q <> '') { ?>
                                                <a href="<?= site_url('t30_bkm/pembayaran') ?>" class="btn btn-secondary btn-sm">Reset</a>
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
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Rate Usd</th>
                                <th>Rate Aud</th>
                                <th>Proses Data</th>
                            </tr>
                            <?php foreach ($t30_bkm_data as $t30_bkm) { ?>
                            <tr>
                                <td width="80px"><?= ++$start ?></td>
                                <td><?= $t30_bkm->nomor ?></td>
                                <td><?= $t30_bkm->tanggal ?></td>
                                <td><?= $t30_bkm->rate_usd ?></td>
                                <td><?= $t30_bkm->rate_aud ?></td>
                                <td style="text-align:center" width="200px">
                                <?php
                                echo anchor(site_url('t30_bkm/pembayaran/'.$t30_bkm->id),'Proses');
                                // echo ' | ';
                                // echo anchor(site_url('t30_bkm/update/'.$t30_bkm->id),'Ubah');
                                // echo ' | ';
                                // echo anchor(site_url('t30_bkm/delete/'.$t30_bkm->id),'Hapus','onclick="javasciprt: return confirm(\'Hapus data ?\')"');
                                ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-muted">Menampilkan <span><?= count($t30_bkm_data) ?></span> dari <span><?= $total_rows ?></span> data</p>
                        <?= $pagination ?>
                    </div>