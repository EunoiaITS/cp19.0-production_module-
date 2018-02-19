<!--=========
MiT form page
==============-->
<div class="planner-from">
    <form action="<?php echo $this->Url->build(['controller'=>'wp','action'=>'add'])?>" method="post" enctype="multipart/form-data" class="planner-relative">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Work In Progress Form</b></div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Date <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">01/01/2018</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label type="wip-so-no" class="cn-text">SO NO<span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="so_no" type="text" class="form-control wip-so-no" id="wip-so-no">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label  type="serial-no" class="cn-text">Serial No <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="serial_no" type="text" class="form-control serial-no" id="serial-no" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">WIP No <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="wp_no" type="text" class="form-control wp-no" value="<?= "WIP".' '.$wp_no ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-6">
                                    <p class="cn-text">Model <span class="planner-fright">:</span></p>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <input name="model" type="text" class="form-control model" id="model" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Version<span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="version" type="text" class="form-control version" id="version" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Type 1 <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">Indoor</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Type 2 <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">Motorized</p>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="clearfix"></div>
            <!--============== Add drawing table area ===================-->
            <div class="planner-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Section</th>
                            <th>Operator Name</th>
                            <th>Supervisor Name</th>
                            <th>Status</th>
                            <th>Remark</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <tr>
                            <td>1</td>
                            <td>Welding</td>
                            <td><input name="wld1_on" type="text" class="form-control"></td>
                            <td><input name="wld1_sn" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Main link Tank</td>
                            <td><input name="mlt_on" type="text" class="form-control"></td>
                            <td><input name="mlt_sn" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Drive Mechanism</td>
                            <td><input name="dm_on" type="text" class="form-control"></td>
                            <td><input name="dm_sn" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Vacuum Chamber</td>
                            <td><input name="vc_on" type="text" class="form-control"></td>
                            <td><input name="vc_sn" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Welding</td>
                            <td><input name="wld2_on" type="text" class="form-control"></td>
                            <td><input name="wld2_sn" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Bta</td>
                            <td><input name="bta_on" type="text" class="form-control"></td>
                            <td><input name="bta_sn" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Metal Clad</td>
                            <td><input name="mc_on" type="text" class="form-control"></td>
                            <td><input name="mc_sn" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Wiring</td>
                            <td><input name="wir_on" type="text" class="form-control"></td>
                            <td><input name="wir_sn" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Testing</td>
                            <td><input name="test_on" type="text" class="form-control"></td>
                            <td><input name="test_sn" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                <div class="prepareted-by-submit">
                    <input type="hidden" name="status" value="Pending">
                    <button type="submit" class="button btn btn-info btn-submit">Send</button>
                </div>
            </div>
        </div>
    </form>
    </div>
<script>
    $(document).ready(function() {
        var sn_id = 'input#wip-so-no';
        var data_no = [<?php echo $sn_id; ?>];
        var options_no = {
            source: data_no,
            minLength: 0
        };
        $(document).on('keydown.autocomplete', sn_id, function () {
            $(this).autocomplete(options_no);
        });
        $(document).on('autocompleteselect', sn_id, function (e, ui) {
            $('#serial-no').val(ui.item.idx);
            $('#model').val(ui.item.idy);
            $('#version').val(ui.item.idz);
        });
    });
</script>
