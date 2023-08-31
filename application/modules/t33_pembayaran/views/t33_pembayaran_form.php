<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

                    <?php // $t33_pembayaran = $t33_pembayaran_data ?>
                    <form class="card" action="<?= $action ?>" method="post">
                        <div class="card-body">

                            <!-- tamu terpilih -->
                            <div class="row row-cards">
                                <div class="col-md-1">
                                    <div class="mb-3"><label class="form-label"><strong>No</strong></label>1</div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Name</strong></label>
                                        <?= $this->T31_bkm_detail_model->get_by_id($t33_pembayaran_1->bkm_detail)->name ?>
                                        <input type="hidden" name="bkm_detail" value="<?= $t33_pembayaran_1->bkm_detail ?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Mata Uang</strong></label>
                                        <select class="form-control select2" name="mata_uang">
                                            <option value="-1">-</option>
                                        <?php foreach($this->T00_mata_uang_model->get_all() as $row) { ?>
                                            <option value="<?= $row->id ?>" <?= $row->id == $t33_pembayaran_1->mata_uang ? 'selected' : '' ?>><?= $row->kode ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Jumlah</strong></label>
                                        <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?= $t33_pembayaran_1->jumlah ?>" />
                                    </div>
                                </div>
                            </div>

                            <!-- tamu yang dibayari oleh tamu terpilih -->
                            <div class="row row-cards">
                                <div class="col-md-1">
                                    <div class="mb-3">2</div>
                                </div>
                                <div class="col-md-11">
                                    <div class="mb-3">
                                        <select class="form-control select2" name="bkm_detail_for[]" multiple="multiple">
                                            <?php foreach($t31_bkm_detail_all_data as $row) { ?>
                                            <option value="<?= $row->id ?>" <?= in_array($row->id, $tamu_terbayar) ? 'selected' : '' ?>><?= $row->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- selisih -->
                            <div class="row row-cards">
                                <div class="col-md-1">
                                    <div class="mb-3">3</div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <select class="form-control select2-selisih" name="selisih">
                                            <option value=""></option>
                                        <?php foreach($this->T02_jenis_selisih_pembayaran_model->get_all() as $row) { ?>
                                            <option value="<?= $row->id ?>" <?= $row->id == $t33_pembayaran_1->selisih ? 'selected' : '' ?>><?= $row->nama ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <select class="form-control select2" name="selisih_mata_uang">
                                            <!-- <option value=""></option> -->
                                        <?php foreach($this->T00_mata_uang_model->get_all() as $row) { ?>
                                            <option value="<?= $row->id ?>" <?= $row->id == $t33_pembayaran_1->selisih_mata_uang ? 'selected' : '' ?>><?= $row->kode ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="selisih_jumlah" id="selisih_jumlah" value="<?= $t33_pembayaran_1->selisih_jumlah ?>" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer ">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <input type="hidden" name="kembali" value="<?= $kembali ?>">
                            <a href="<?= site_url($kembali) ?>" class="btn btn-secondary d-none d-sm-inline-block">
                                Batal / Kembali
                            </a>
                        </div>
                    </form>
