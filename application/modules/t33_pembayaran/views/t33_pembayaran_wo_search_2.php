<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

                    <div class="row row-cards">
                        <div class="col-md-1">
                            <div class="mb-3">
                                <!-- <label class="form-label">No</label> -->
                                <?= $start ?>
                            </div>
                        </div>
                        <div class="col-md-11">
                            <div class="mb-3">
                                <!-- <label class="form-label">Name</label> -->
                                <select class="form-control select2" name="bkm_detail[]" multiple="multiple">
                                    <?php foreach($t31_bkm_detail_all_data as $row) { ?>
                                    <option value="<?= $row->id ?>"><?= $row->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
                <!-- </div> -->
