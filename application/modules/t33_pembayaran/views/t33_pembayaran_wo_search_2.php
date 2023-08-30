<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <tr>
                                <td><?= $start ?></td>
                                <td>
                                    <select class="form-control select2" name="bkm_detail[]" multiple="multiple">
                                        <?php foreach($t31_bkm_detail_all_data as $row) { ?>
                                        <option value="<?= $row->id ?>"><?= $row->name ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                Column
                            </div>
                            <div class="col">
                                Column
                            </div>
                            <div class="col">
                                Column
                            </div>
                        </div>
                    </div>
