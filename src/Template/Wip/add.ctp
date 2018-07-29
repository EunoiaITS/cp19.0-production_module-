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
                                <span id="hidden-so"></span>
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
                            <td><input id="op-name1" name="operator_name_1" type="text" class="form-control"></td>
                            <td><input id="sup-name1" name="supervisor_name_1" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb1" name="cb_1" class="cb-class" type="checkbox" value="1"></td>
                                <input id="sec1" type="hidden" name="section1" value="Welding 1">
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Main link Tank</td>
                            <td><input id="op-name2" name="operator_name_2" type="text" class="form-control"></td>
                            <td><input id="sup-name2" name="supervisor_name_2" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb2" name="cb_2" class="cb-class" type="checkbox" value="2"></td>
                            <input id="sec2" type="hidden" name="section2" value="Main link Tank">
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Drive Mechanism</td>
                            <td><input id="op-name3" name="operator_name_3" type="text" class="form-control"></td>
                            <td><input id="sup-name3" name="supervisor_name_3" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb3" name="cb_3" class="cb-class" type="checkbox" value="3"></td>
                            <input id="sec3" type="hidden" name="section3" value="Drive Mechanism">
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Vacuum Chamber</td>
                            <td><input id="op-name4" name="operator_name_4" type="text" class="form-control"></td>
                            <td><input id="sup-name4" name="supervisor_name_4" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb4" name="cb_4" class="cb-class" type="checkbox" value="4"></td>
                            <input id="sec4" type="hidden" name="section4" value="Vacuum Chamber">
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Welding</td>
                            <td><input id="op-name5" name="operator_name_5" type="text" class="form-control"></td>
                            <td><input id="sup-name5" name="supervisor_name_5" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb5" name="cb_5" class="cb-class" type="checkbox" value="5"></td>
                            <input id="sec5" type="hidden" name="section5" value="Welding 2">
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Bta</td>
                            <td><input id="op-name6" name="operator_name_6" type="text" class="form-control"></td>
                            <td><input id="sup-name6" name="supervisor_name_6" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb6" name="cb_6" class="cb-class" type="checkbox" value="6"></td>
                            <input id="sec6" type="hidden" name="section6" value="Bta">
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Metal Clad</td>
                            <td><input id="op-name7" name="operator_name_7" type="text" class="form-control"></td>
                            <td><input id="sup-name7" name="supervisor_name_7" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb7" name="cb_7" class="cb-class" type="checkbox" value="7"></td>
                            <input id="sec7" type="hidden" name="section7" value="Metal Clad">
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Wiring</td>
                            <td><input id="op-name8" name="operator_name_8" type="text" class="form-control"></td>
                            <td><input id="sup-name8" name="supervisor_name_8" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb8" name="cb_8" class="cb-class" type="checkbox" value="8"></td>
                            <input id="sec8" type="hidden" name="section8" value="Wiring">
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Testing</td>
                            <td><input id="op-name9" name="operator_name_9" type="text" class="form-control"></td>
                            <td><input id="sup-name9" name="supervisor_name_9" type="text" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><input id="cb9" name="cb_9" class="cb-class" type="checkbox" value="9"></td>
                            <input id="sec9" type="hidden" name="section9" value="Testing">
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                <div class="prepareted-by-submit">
                    <input type="hidden" name="action" id="action" value="">
                    <input type="hidden" name="wipId" id="wipId" value="">
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
            var date = "<?php echo date('m/d/Y');?>";
            $('#date-id').val(date);
            var wip = "<?php echo "WIP" .$wp_no; ?>";
            $('#wip-id').val(wip);
            var sn_id = 'input#wip-so-no';
            var data_no = [<?php echo $sn_id; ?>];
            console.log(data_no);
            var options_no = {
                source: data_no,
                minLength: 0
            };
            $(document).on('keydown.autocomplete', sn_id, function () {
                $(this).autocomplete(options_no);
            });
            $(document).on('autocompleteselect', sn_id, function (e, ui) {
                setTimeout(function(){
                    $(this).addClass('so-loading-box');
                    $('#hidden-so').html('<img src="<?php echo $this->request->webroot."assets/img/loading.gif"; ?>" id="so-img" class="so-loading">');
                },100);
                setTimeout(function(){
                    $(this).removeClass('so-loading-box');
                    $('#hidden-so').html('');
                },500);
                var html = '';
                var totItems = ui.item.item_ids;
                for(j = 0; j < totItems.length; j++){
                    html += '<option value="'+totItems[j]+'">'+totItems[j]+'</option>';
                }
                $('#serial-no').html(html);
                $('#model').text(ui.item.idy);
                $('#version').text(ui.item.idz);
                if(ui.item.wip_action === 'edit'){
                    $('#action').val('edit');
                    $('#wipId').val(ui.item.wipId);
                }else {
                    $('#action').val('');
                    $('#wipId').val('');
                    $('#op-name1').val('');
                    $('#op-name1').prop('disabled', false);
                    $('#sup-name1').val('');
                    $('#sup-name1').prop('disabled', false);
                    $('#op-name2').val('');
                    $('#op-name2').prop('disabled', false);
                    $('#sup-name2').val('');
                    $('#sup-name2').prop('disabled', false);
                    $('#op-name3').val('');
                    $('#op-name3').prop('disabled', false);
                    $('#sup-name3').val('');
                    $('#sup-name3').prop('disabled', false);
                    $('#op-name4').val('');
                    $('#op-name4').prop('disabled', false);
                    $('#sup-name4').val('');
                    $('#sup-name4').prop('disabled', false);
                    $('#op-name5').val('');
                    $('#op-name5').prop('disabled', false);
                    $('#sup-name5').val('');
                    $('#sup-name5').prop('disabled', false);
                    $('#op-name6').val('');
                    $('#op-name6').prop('disabled', false);
                    $('#sup-name6').val('');
                    $('#sup-name6').prop('disabled', false);
                    $('#op-name7').val('');
                    $('#op-name7').prop('disabled', false);
                    $('#sup-name7').val('');
                    $('#sup-name7').prop('disabled', false);
                    $('#op-name8').val('');
                    $('#op-name8').prop('disabled', false);
                    $('#sup-name8').val('');
                    $('#sup-name8').prop('disabled', false);
                    $('#op-name9').val('');
                    $('#op-name9').prop('disabled', false);
                    $('#sup-name9').val('');
                    $('#sup-name9').prop('disabled', false);
                }
                $('.cb-class').prop('disabled', false);
                $('.cb-class').prop('checked', false);
                var sections = ui.item.sections;
                for(i = 0; i < sections.length; i++){
                    if(sections[i].secName === 'Welding 1'){
                        $('#cb1').prop('disabled', true);
                        $('#cb1').prop('checked', true);
                        $('#op-name1').val(sections[i].opName);
                        $('#op-name1').prop('disabled', true);
                        $('#sup-name1').val(sections[i].supName);
                        $('#sup-name1').prop('disabled', true);
                    }
                    if(sections[i].secName === 'Main link Tank'){
                        $('#cb2').prop('disabled', true);
                        $('#cb2').prop('checked', true);
                        $('#op-name2').val(sections[i].opName);
                        $('#op-name2').prop('disabled', true);
                        $('#sup-name2').val(sections[i].supName);
                        $('#sup-name2').prop('disabled', true);
                    }
                    if(sections[i].secName === 'Drive Mechanism'){
                        $('#cb3').prop('disabled', true);
                        $('#cb3').prop('checked', true);
                        $('#op-name3').val(sections[i].opName);
                        $('#op-name3').prop('disabled', true);
                        $('#sup-name3').val(sections[i].supName);
                        $('#sup-name3').prop('disabled', true);
                    }
                    if(sections[i].secName === 'Vacuum Chamber'){
                        $('#cb4').prop('disabled', true);
                        $('#cb4').prop('checked', true);
                        $('#op-name4').val(sections[i].opName);
                        $('#op-name4').prop('disabled', true);
                        $('#sup-name4').val(sections[i].supName);
                        $('#sup-name4').prop('disabled', true);
                    }
                    if(sections[i].secName === 'Welding 2'){
                        $('#cb5').prop('disabled', true);
                        $('#cb5').prop('checked', true);
                        $('#op-name5').val(sections[i].opName);
                        $('#op-name5').prop('disabled', true);
                        $('#sup-name5').val(sections[i].supName);
                        $('#sup-name5').prop('disabled', true);
                    }
                    if(sections[i].secName === 'Bta'){
                        $('#cb6').prop('disabled', true);
                        $('#cb6').prop('checked', true);
                        $('#op-name6').val(sections[i].opName);
                        $('#op-name6').prop('disabled', true);
                        $('#sup-name6').val(sections[i].supName);
                        $('#sup-name6').prop('disabled', true);
                    }
                    if(sections[i].secName === 'Metal Clad'){
                        $('#cb7').prop('disabled', true);
                        $('#cb7').prop('checked', true);
                        $('#op-name7').val(sections[i].opName);
                        $('#op-name7').prop('disabled', true);
                        $('#sup-name7').val(sections[i].supName);
                        $('#sup-name7').prop('disabled', true);
                    }
                    if(sections[i].secName === 'Wiring'){
                        $('#cb8').prop('disabled', true);
                        $('#cb8').prop('checked', true);
                        $('#op-name8').val(sections[i].opName);
                        $('#op-name8').prop('disabled', true);
                        $('#sup-name8').val(sections[i].supName);
                        $('#sup-name8').prop('disabled', true);
                    }
                    if(sections[i].secName === 'Testing'){
                        $('#cb9').prop('disabled', true);
                        $('#cb9').prop('checked', true);
                        $('#op-name9').val(sections[i].opName);
                        $('#op-name9').prop('disabled', true);
                        $('#sup-name9').val(sections[i].supName);
                        $('#sup-name9').prop('disabled', true);
                    }
                }
            });
        });
    </script>
