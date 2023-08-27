<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

                    <div class="card-header">
                        <h3 class="card-title">Selisih Bayar</h3>
                        <!-- <div class="ms-auto text-muted">
                            <?php echo anchor(site_url('t35_selisih_bayar/create/'.$this->uri->segment(4)),'Tambah','class="btn btn-primary btn-sm"'); ?>
                        </div> -->
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
                            <?php foreach ($t35_selisih_bayar_data as $t35_selisih_bayar) { ?>
                            <tr>
                                <td><?= ++$start ?></td>
                                <!-- <td><?= $t35_selisih_bayar->bkm_detail ?></td> -->
                                <td><?= date_dmy($t35_selisih_bayar->tanggal) ?></td>
                                <!-- <td><?= $t35_selisih_bayar->mata_uang ?></td> -->
                                <td><?= $t35_selisih_bayar->mata_uang.' '.number_format($t35_selisih_bayar->jumlah, 0) ?></td>
                                <td>
                                <?php
                                // echo anchor(site_url('t35_selisih_bayar/read/'.$t35_selisih_bayar->id),'Detail','class="btn btn-primary btn-sm"');
                                // echo ' ';
                                echo anchor(site_url('t35_selisih_bayar/update/'.$t35_selisih_bayar->id),'Ubah','class="btn btn-primary btn-sm"');
                                echo ' ';
                                echo anchor(site_url('t35_selisih_bayar/delete/'.$t35_selisih_bayar->id),'Hapus','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Hapus data ?\')"');
                                ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
