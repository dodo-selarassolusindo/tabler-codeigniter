<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

                    <?php $t33_pembayaran = $t33_pembayaran_data ?>
                    <form class="card">
                        <div class="card-body">
                            <div class="row row-cards">
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        <label class="form-label">No</label>
                                        <?= $start ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <?= $this->T31_bkm_detail_model->get_by_id($t33_pembayaran->bkm_detail)->name ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Mata Uang</label>
                                        <select class="form-control select2" name="mata_uang">
                                        <?php foreach($this->T00_mata_uang_model->get_all() as $row) { ?>
                                            <option value="<?= $row->id ?>" <?= $row->id == $t33_pembayaran->mata_uang ? 'selected' : '' ?>><?= $row->kode ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah</label>
                                        <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?= $t33_pembayaran->jumlah ?>" />
                                    </div>
                                </div>
                            </div>
