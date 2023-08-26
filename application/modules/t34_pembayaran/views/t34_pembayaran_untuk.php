<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

                    <div class="card-header">
                        <h3 class="card-title">Pembayaran untuk :</h3>
                        <!-- <div class="ms-auto text-muted">
                            <?php echo anchor(site_url('t34_pembayaran/create/'.$this->uri->segment(4)),'Tambah','class="btn btn-primary btn-sm"'); ?>
                        </div> -->
                    </div>

                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                                <tr>
                                    <th>No</th>
                                    <!-- <th>Bkm Detail</th> -->
                                    <!-- <th>Tanggal</th> -->
                                    <th>Nama Tamu</th>
                                    <th>Mata Uang</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Proses Data</th>
                                </tr>
                                <?php foreach ($t34_pembayaran_untuk_data as $t34_pembayaran) { ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td><?= $t34_pembayaran->bkm_detail ?></td>
                                    <!-- <td><?= date_dmy($t34_pembayaran->tanggal) ?></td> -->
                                    <!-- <td><?= $t34_pembayaran->mata_uang.' '.number_format($t34_pembayaran->jumlah, 0) ?></td> -->
                                    <!-- <td><?= $t34_pembayaran->mata_uang ?></td> -->
                                    <td>
                                        <!-- <select class="form-select" id="select-users"> -->
                                        <select class="form-select select2">
                                        <?php foreach($t00_mata_uang_data as $t00_mata_uang) { ?>
                                            <option value="<?= $t00_mata_uang->id ?>" <?= ($t00_mata_uang->id == $t34_pembayaran->mata_uang ? 'selected' : '') ?>><?= $t00_mata_uang->kode ?></option>
                                        <?php } ?>
                                        </select>
                                    </td>
                                    <!-- <td><?= number_format($t34_pembayaran->jumlah, 0) ?></td> -->
                                    <td><div><input type="text" class="form-control" name="jumlah" id="jumlah<?= $t34_pembayaran->id ?>" placeholder="Jumlah" value="<?php echo $t34_pembayaran->jumlah; ?>" /></div></td>
                                    <td>
                                    <?php
                                    // echo anchor(site_url('t34_pembayaran/read/'.$t34_pembayaran->id),'Detail','class="btn btn-primary btn-sm"');
                                    // echo ' ';
                                    // echo anchor(site_url('t34_pembayaran/update/'.$t34_pembayaran->id),'Ubah','class="btn btn-primary btn-sm"');
                                    // echo ' ';
                                    echo anchor(site_url('t34_pembayaran/delete/'.$t34_pembayaran->id),'Hapus','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Hapus data ?\')"');
                                    ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            <tfoot>
                                <tr>
                                    <td><button class="btn btn-sm btn-primary" type="button" name="button" onclick="alert('<?= $t34_pembayaran->id ?>')">Tambah Data</button></td>
                                    <td>&nbsp;</td>
                                    <td>Total Bayar</td>
                                    <td><div><input type="text" class="form-control" name="jumlah" id="jumlah-total" placeholder="Jumlah" value="<?php echo $t34_pembayaran->jumlah; ?>" /></div></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
