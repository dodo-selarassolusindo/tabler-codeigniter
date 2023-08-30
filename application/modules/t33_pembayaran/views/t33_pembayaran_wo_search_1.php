<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Mata Uang</th>
                                <th>Jumlah</th>
                                <!-- <th>Proses Data</th> -->
                            </tr>
                            <?php //foreach ($t33_pembayaran_data as $t33_pembayaran) { ?>
                            <?php $t33_pembayaran = $t33_pembayaran_data ?>
                            <tr>
                                <td><?= $start ?></td>
                                <td><?= $this->T31_bkm_detail_model->get_by_id($t33_pembayaran->bkm_detail)->name ?></td>
                                <td>
                                    <select class="form-control select2" name="mata_uang">
                                    <?php foreach($this->T00_mata_uang_model->get_all() as $row) { ?>
                                        <option value="<?= $row->id ?>" <?= $row->id == $t33_pembayaran->mata_uang ? 'selected' : '' ?>><?= $row->kode ?></option>
                                    <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" style="display: inline; width: auto;" class="form-control" name="jumlah" id="jumlah" value="<?= $t33_pembayaran->jumlah ?>" />
                                </td>
                                <!-- <td> -->
                                <?php
                                // echo anchor(site_url('t33_pembayaran/read/'.$t33_pembayaran->id),'Detail');
                                // echo ' | ';
                                // echo anchor(site_url('t33_pembayaran/update/'.$t33_pembayaran->id),'Ubah');
                                // echo ' | ';
                                // echo anchor(site_url('t33_pembayaran/delete/'.$t33_pembayaran->id),'Hapus','onclick="javasciprt: return confirm(\'Hapus data ?\')"');
                                ?>
                                <!-- </td> -->
                            </tr>
                            <?php //} ?>
                        </table>
                    </div>
