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
                                    <th>Name</th>
                                    <th>Package</th>
                                    <th>Night</th>
                                    <th>Price List</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Proses Data</th>
                                </tr>
                                <?php $total_price = 0 ?>
                                <?php foreach ($t36_pembayaran_oleh_data as $t36_pembayaran_oleh) { ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td><?= $t36_pembayaran_oleh->name ?></td>
                                    <td><?= $t36_pembayaran_oleh->package_nama ?></td>
                                    <td><?= $t36_pembayaran_oleh->night ?></td>
                                    <td><?= $t36_pembayaran_oleh->mata_uang_kode . ' ' . $t36_pembayaran_oleh->price ?></td>
                                    <td><?= 'Rp.' . ' ' . number_format($t36_pembayaran_oleh->price * 13900, 0) ?></td>
                                    <td>
                                    <?php
                                    // echo anchor(site_url('t34_pembayaran/read/'.$t34_pembayaran->id),'Detail','class="btn btn-primary btn-sm"');
                                    // echo ' ';
                                    // echo anchor(site_url('t34_pembayaran/update/'.$t34_pembayaran->id),'Ubah','class="btn btn-primary btn-sm"');
                                    // echo ' ';
                                    echo anchor(site_url('t34_pembayaran/delete/'.$t36_pembayaran_oleh->id),'Hapus','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Hapus data ?\')"');
                                    ?>
                                    </td>
                                </tr>
                                    <?php $total_price += ($t36_pembayaran_oleh->price * 13900) ?>
                                <?php } ?>
                            <tfoot>
                                <tr>
                                    <td><button class="btn btn-sm btn-primary" type="button" name="button" onclick="alert('<?= '1' ?>')">Tambah Data</button></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <th>Total Bayar</th>
                                    <td><div><input readonly type="text" class="form-control" name="jumlah" id="jumlah-total" placeholder="Jumlah" value="<?php echo 'Rp. ' . number_format($total_price, 0); ?>" /></div></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
