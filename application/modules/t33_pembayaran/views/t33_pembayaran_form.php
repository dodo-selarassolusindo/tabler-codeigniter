<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

                    <?php // $t33_pembayaran = $t33_pembayaran_data ?>
                    <form class="card" action="<?= $action ?>" method="post">
                        <div class="card-header">
                            <h3 class="card-title">PEMBAYARAN</h3>
                        </div>
                        <div class="card-body">

                            <!-- tamu terpilih -->
                            <div class="row row-cards">
                                <!-- <div class="col-md-1">
                                    <div class="mb-3"><label class="form-label"><strong>No</strong></label><label class="col-form-label">1</label></div>
                                </div> -->
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Name</strong></label>
                                        <label class="col-form-label">
                                        <?= $this->T31_bkm_detail_model->get_by_id($t33_pembayaran_1->bkm_detail)->name ?>
                                        </label>
                                        <input type="hidden" name="bkm_detail" id="bkm_detail_utama" value="<?= $t33_pembayaran_1->bkm_detail ?>">
                                    </div>
                                </div>
                                <!-- <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Mata Uang</strong></label>
                                        <select class="form-control select2" name="mata_uang">
                                        <?php foreach($this->T00_mata_uang_model->get_all() as $row) { ?>
                                            <option value="<?= $row->id ?>" <?= $row->id == $t33_pembayaran_1->mata_uang ? 'selected' : '' ?>><?= $row->kode ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div> -->
                                <input type="hidden" name="mata_uang" value="1">

                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Jumlah</strong></label>
                                        <div class="col input-group">
                                            <label class="col-form-label pe-2">Rp. </label>
                                            <input type="text" class="form-control rupiah" name="jumlah" id="jumlah" value="<?= $t33_pembayaran_1->jumlah ?>" />
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- tamu yang dibayari oleh tamu terpilih -->
                            <div class="row row-cards">
                                <!-- <div class="col-md-1">
                                    <div class="mb-3"><label class="col-form-label">2</label></div>
                                </div> -->
                                <div class="col-md-11">
                                    <div class="mb-3">
                                        <select class="form-control select2" name="bkm_detail_for[]" multiple="multiple" id="list_bkm_detail">
                                            <?php //pre($arr_bayar); exit; ?>
                                            <?php foreach($t31_bkm_detail_all_data as $row) { ?>
                                                <?php $arr_check = array_search($row->id, array_column($arr_bayar, 'bkm_detail')) ?>
                                                <?php //pre($arr_check); exit; ?>
                                                <?php if ($arr_check === false) { ?>
                                                    <?php // pre($arr_check); exit; ?>
                                                    <option value="<?= $row->id ?>" <?= in_array($row->id, $tamu_terbayar) ? 'selected' : '' ?>><?= $row->name ?></option>
                                                <?php } else { ?>
                                                    <?php if ($arr_bayar[$arr_check]['dibayar_oleh'] == $t33_pembayaran_1->bkm_detail) { ?>
                                                        <?php // pre($arr_bayar[$arr_check]['dibayar_oleh']); exit; ?>
                                                        <option value="<?= $row->id ?>" <?= in_array($row->id, $tamu_terbayar) ? 'selected' : '' ?>><?= $row->name ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- selisih -->
                            <div class="row row-cards">
                                <!-- <div class="col-md-1">
                                    <div class="mb-3"><label class="col-form-label">3</label></div>
                                </div> -->
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <!-- <select class="form-control select2-selisih" name="selisih"> -->
                                        <!-- <select class="form-control select2-selisih" name="selisih"> -->
                                        <select class="form-control" name="selisih" id="select-users" placeholder="Selisih">
                                            <option value=""></option>
                                        <?php foreach($this->T02_jenis_selisih_pembayaran_model->get_all() as $row) { ?>
                                            <option value="<?= $row->id ?>" <?= $row->id == $t33_pembayaran_1->selisih ? 'selected' : '' ?>><?= $row->nama ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-md-2">
                                    <div class="mb-3">
                                        <select class="form-control select2" name="selisih_mata_uang">
                                        <?php foreach($this->T00_mata_uang_model->get_all() as $row) { ?>
                                            <option value="<?= $row->id ?>" <?= $row->id == $t33_pembayaran_1->selisih_mata_uang ? 'selected' : '' ?>><?= $row->kode ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div> -->
                                <input type="hidden" name="selisih_mata_uang" value="1">
                                <input type="hidden" name="" value="<?= $rate_usd ?>" id="rate_usd">
                                <input type="hidden" name="" value="<?= $rate_aud ?>" id="rate_aud">
                                <div class="col-md-2">
                                    <div class="mb-3 input-group">
                                        <label class="col-form-label pe-2">Rp. </label>
                                        <input type="text" class="form-control rupiah" name="selisih_jumlah" id="selisih_jumlah" value="<?= $t33_pembayaran_1->selisih_jumlah ?>" />
                                        <!-- <input type="text" name="" value="<?= $price_rp ?>"> -->
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
