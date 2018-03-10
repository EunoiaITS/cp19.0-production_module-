<!--=========
MiT form page
==============-->
<div class="planner-from">
    <form action="<?php echo $this->Url->build(['controller'=>'wip','action'=>'add'])?>" method="post" enctype="multipart/form-data" class="planner-relative">
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
                                <p class="cn-main-text"><?= date('m/d/Y')?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label type="wip-so-no" class="cn-text">SO NO <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="so_no" type="text" class="form-control wip-so-no" id="wip-so-no">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label  type="so-form" class="cn-text">Serial No <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <select name="serial_no" class="form-control serial-no" id="serial-no">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">WIP No <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase wp-no" id="wp-no"><?= "WIP".' '.sprintf('%04d', $wp_no) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text text-uppercase">Model <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase model" id="model"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Version<span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text version" id="version"></p>
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
                            <th>Select</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <tr>
                            <td>1</td>
                            <td>Welding</td>
                            <td><input name="operator_name_1" type="text" class="form-control"></td>
                            <td><input name="supervisor_name_1" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb1" name="cb_1" class="cb-class" type="checkbox" value="1"></td>
                                <input id="sec1" type="hidden" name="section1" value="Welding 1">
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Main link Tank</td>
                            <td><input name="operator_name_2" type="text" class="form-control"></td>
                            <td><input name="supervisor_name_2" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb2" name="cb_2" class="cb-class" type="checkbox" value="2"></td>
                            <input id="sec1" type="hidden" name="section2" value="Main link Tank">
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Drive Mechanism</td>
                            <td><input name="operator_name_3" type="text" class="form-control"></td>
                            <td><input name="supervisor_name_3" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb3" name="cb_3" class="cb-class" type="checkbox" value="3"></td>
                            <input id="sec1" type="hidden" name="section3" value="Drive Mechanism">
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Vacuum Chamber</td>
                            <td><input name="operator_name_4" type="text" class="form-control"></td>
                            <td><input name="supervisor_name_4" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb4" name="cb_4" class="cb-class" type="checkbox" value="4"></td>
                            <input id="sec1" type="hidden" name="section4" value="Vacuum Chamber">
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Welding</td>
                            <td><input name="operator_name_5" type="text" class="form-control"></td>
                            <td><input name="supervisor_name_5" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb5" name="cb_5" class="cb-class" type="checkbox" value="5"></td>
                            <input id="sec1" type="hidden" name="section5" value="Welding 2">
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Bta</td>
                            <td><input name="operator_name_6" type="text" class="form-control"></td>
                            <td><input name="supervisor_name_6" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb6" name="cb_6" class="cb-class" type="checkbox" value="6"></td>
                            <input id="sec1" type="hidden" name="section6" value="Bta">
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Metal Clad</td>
                            <td><input name="operator_name_7" type="text" class="form-control"></td>
                            <td><input name="supervisor_name_7" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb7" name="cb_7" class="cb-class" type="checkbox" value="7"></td>
                            <input id="sec1" type="hidden" name="section7" value="Metal Clad">
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Wiring</td>
                            <td><input name="operator_name_8" type="text" class="form-control"></td>
                            <td><input name="supervisor_name_8" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb8" name="cb_8" class="cb-class" type="checkbox" value="8"></td>
                            <input id="sec1" type="hidden" name="section8" value="Wiring">
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Testing</td>
                            <td><input name="operator_name_9" type="text" class="form-control"></td>
                            <td><input name="supervisor_name_9" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb9" name="cb_9" class="cb-class" type="checkbox" value="9"></td>
                            <input id="sec1" type="hidden" name="section9" value="Testing">
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                <div class="prepareted-by-submit">
                    <input type="hidden" name="status" value="requested">
                    <input id="date-id" type="hidden" name="date" value="">
                    <input id="wip-id" type="hidden" name="wip_id" value="">
                    <input id="wip-id" type="hidden" name="created_by" value="<?= $pic?>">
                    <button type="submit" class="button btn btn-info btn-submit">Send</button>
                </div>
            </div>
        </div>
    </form>
    </div>
    <script>
        $(document).ready(function() {
            $('.cb-class').on('change',function (e) {
                e.preventDefault();
                $('.cb-class').not(this).prop('checked',false);
            });
            var date = "<?php echo date('m/d/Y');?>";
            $('#date-id').val(date);
            var wip = "<?php echo "WIP" .$wp_no; ?>";
            $('#wip-id').val(wip);
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
                $('#model').text(ui.item.idy);
                $('#version').text(ui.item.idz);
            });
            $('#wip-id').on('change',function (e) {
                e.preventDefault();
                var html = '';
                $.each(sn_id,function (i,c) {
                        var ids = c.item_ids;
                        for( i = 0; i < ids.length; i++ ){
                            html += '<option value="'+ids[i]+'">'+ids[i]+'</option>';
                        }
                });
                $('#serial-no').html(html);
            });
        });
    </script>