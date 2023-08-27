<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

                    <div class="card-header">
                        <h3 class="card-title">Pembayaran</h3>
                        <div class="ms-auto text-muted">
                            <?php echo anchor(site_url('t34_pembayaran/create/'.$this->uri->segment(4)),'Tambah','class="btn btn-primary btn-sm"'); ?>
                        </div>
                    </div>
                    <div class="card-body border-bottom py-3">
                        <div class="d-flex">
                            <div class="text-muted">
                                Cari Data:
                                <div class="ms-2 d-inline-block">
                                    <form action="<?= site_url('t34_pembayaran/index') ?>" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" name="q" value="<?= $q ?>">
                                            <span class="input-group-btn">
                                                <?php if ($q <> '') { ?>
                                                <a href="<?= site_url('t34_pembayaran') ?>" class="btn btn-secondary btn-sm">Reset</a>
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
                                <!-- <th>Bkm Detail</th> -->
                                <th>Tanggal</th>
                                <!-- <th>Mata Uang</th> -->
                                <th>Jumlah</th>
                                <th>Proses Data</th>
                            </tr>
                            <?php foreach ($t34_pembayaran_data as $t34_pembayaran) { ?>
                            <tr>
                                <td><?= ++$start ?></td>
                                <!-- <td><?= $t34_pembayaran->bkm_detail ?></td> -->
                                <td><?= date_dmy($t34_pembayaran->tanggal) ?></td>
                                <!-- <td><?= $t34_pembayaran->mata_uang ?></td> -->
                                <td><?= $t34_pembayaran->mata_uang.' '.number_format($t34_pembayaran->jumlah, 0) ?></td>
                                <td>
                                <?php
                                // echo anchor(site_url('t34_pembayaran/read/'.$t34_pembayaran->id),'Detail','class="btn btn-primary btn-sm"');
                                // echo ' ';
                                echo anchor(site_url('t34_pembayaran/update/'.$t34_pembayaran->id),'Ubah','class="btn btn-primary btn-sm"');
                                echo ' ';
                                echo anchor(site_url('t34_pembayaran/delete/'.$t34_pembayaran->id),'Hapus','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Hapus data ?\')"');
                                ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-muted">Menampilkan <span><?= count($t34_pembayaran_data) ?></span> dari <span><?= $total_rows_pembayaran ?></span> data</p>
                        <?= $pagination ?>
                    </div>
