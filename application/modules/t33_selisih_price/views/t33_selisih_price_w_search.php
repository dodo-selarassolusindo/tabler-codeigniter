<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

                    <div class="card-body border-bottom py-3">
                        <div class="d-flex">
                            <div class="text-muted">
                                Cari Data:
                                <div class="ms-2 d-inline-block">
                                    <form action="<?= site_url('t33_selisih_price/index') ?>" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" name="q" value="<?= $q ?>">
                                            <span class="input-group-btn">
                                                <?php if ($q <> '') { ?>
                                                <a href="<?= site_url('t33_selisih_price') ?>" class="btn btn-secondary btn-sm">Reset</a>
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
                                <th>Bkm Detail</th>
                                <th>Tanggal</th>
                                <th>Mata Uang</th>
                                <th>Jumlah</th>
                                <th>Proses Data</th>
                            </tr>
                            <?php foreach ($t33_selisih_price_data as $t33_selisih_price) { ?>
                            <tr>
                                <td width="80px"><?= ++$start ?></td>
                                <td><?= $t33_selisih_price->bkm_detail ?></td>
                                <td><?= $t33_selisih_price->tanggal ?></td>
                                <td><?= $t33_selisih_price->mata_uang ?></td>
                                <td><?= $t33_selisih_price->jumlah ?></td>
                                <td style="text-align:center" width="200px">
                                <?php
                                echo anchor(site_url('t33_selisih_price/read/'.$t33_selisih_price->id),'Detail');
                                echo ' | ';
                                echo anchor(site_url('t33_selisih_price/update/'.$t33_selisih_price->id),'Ubah');
                                echo ' | ';
                                echo anchor(site_url('t33_selisih_price/delete/'.$t33_selisih_price->id),'Hapus','onclick="javasciprt: return confirm(\'Hapus data ?\')"');
                                ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-muted">Menampilkan <span><?= count($t33_selisih_price_data) ?></span> dari <span><?= $total_rows ?></span> data</p>
                        <?= $pagination ?>
                    </div>
