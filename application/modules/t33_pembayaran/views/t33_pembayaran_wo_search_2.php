<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

                            <div class="row row-cards">
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        <?= $start ?>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="mb-3">
                                        <select class="form-control select2" name="bkm_detail[]" multiple="multiple">
                                            <?php foreach($t31_bkm_detail_all_data as $row) { ?>
                                            <option value="<?= $row->id ?>"><?= $row->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-cards">
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        3
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <select class="form-control select2" name="mata_uang" placeholder="Selisih">
                                            <option value="-1">-</option>
                                        <?php foreach($this->T02_jenis_selisih_pembayaran_model->get_all() as $row) { ?>
                                            <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <select class="form-control select2" name="mata_uang">
                                            <option value="-1">-</option>
                                        <?php foreach($this->T00_mata_uang_model->get_all() as $row) { ?>
                                            <option value="<?= $row->id ?>" <?= $row->id == $t33_pembayaran->mata_uang ? 'selected' : '' ?>><?= $row->kode ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?= $t33_pembayaran->jumlah ?>" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer ">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
