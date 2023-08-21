<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

                    <div class="card-header">
                        <h3 class="card-title">Selisih Bayar</h3>
                    </div>
                    <div class="card-body border-bottom py-3">
                        <div class="d-flex">
                            <div class="text-muted">
                                Cari Data:
                                <div class="ms-2 d-inline-block">
                                    <form action="<?= site_url('t35_selisih_bayar/index') ?>" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" name="q" value="<?= $q ?>">
                                            <span class="input-group-btn">
                                                <?php if ($q <> '') { ?>
                                                <a href="<?= site_url('t35_selisih_bayar') ?>" class="btn btn-secondary btn-sm">Reset</a>
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
                            <?php foreach ($t35_selisih_bayar_data as $t35_selisih_bayar) { ?>
                            <tr>
                                <td width="80px"><?= ++$start ?></td>
                                <td><?= $t35_selisih_bayar->bkm_detail ?></td>
                                <td><?= $t35_selisih_bayar->tanggal ?></td>
                                <td><?= $t35_selisih_bayar->mata_uang ?></td>
                                <td><?= $t35_selisih_bayar->jumlah ?></td>
                                <td style="text-align:center" width="200px">
                                <?php
                                echo anchor(site_url('t35_selisih_bayar/read/'.$t35_selisih_bayar->id),'Detail');
                                echo ' | ';
                                echo anchor(site_url('t35_selisih_bayar/update/'.$t35_selisih_bayar->id),'Ubah');
                                echo ' | ';
                                echo anchor(site_url('t35_selisih_bayar/delete/'.$t35_selisih_bayar->id),'Hapus','onclick="javasciprt: return confirm(\'Hapus data ?\')"');
                                ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-muted">Menampilkan <span><?= count($t35_selisih_bayar_data) ?></span> dari <span><?= $total_rows_selisih_bayar ?></span> data</p>
                        <?= $pagination ?>
                    </div>
