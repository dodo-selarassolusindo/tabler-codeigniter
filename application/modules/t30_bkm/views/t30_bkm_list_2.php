
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
                                echo anchor(site_url('t30_bkm/read/'.$t30_bkm->id),'Proses');
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
