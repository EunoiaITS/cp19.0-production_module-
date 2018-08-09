<!--=========
Production Planner page
==============-->

<div class="planner-from">
    <span class="container-fluid">
        <div class="row">
            <div class="clearfix"></div>
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Inventory Create</b></div>
            </div>
        <div class="clearfix">
            <div class="col-sm-12">
                <form action="<?php echo $this->Url->build(['controller'=>'inventory','action'=>'add']);?>" method="post">
                    <div id="add-item-tr">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-6">
                                    <label for="ic-date" class="cn-text">Date <span class="planner-fright">:</span></label>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <input type="text" name="date0" class="form-control datepicker" id="ic-date" placeholder="mm/dd/yyyy">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-3 col-xs-6">
                                    <label for="part-no0" class="cn-text">Part No <span class="planner-fright">:</span></label>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <span id="no-td0"></span><input type="text" class="form-control part-no" id="part-no0" rel="0" name="part_no0"><span id="no0"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-3 col-xs-6">
                                    <label for="part-name0" class="cn-text">Part Name <span class="planner-fright">:</span></label>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <span id="name-td0"></span><input type="text" class="form-control part-name" id="part-name0" rel="0" name="part_name0"><span id="name0"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-3 col-xs-6">
                                    <label for="drawing-no0" class="cn-text">Drawing No <span class="planner-fright">:</span></label>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <input type="text" class="form-control drawing-no" id="drawing-no0" rel="0" name="drawing_no0">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-6">
                                    <label for="section-type" class="cn-text">Section <span class="planner-fright">:</span></label>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <select class="form-control" name="section0" id="section-type">
                                        <option value="Welding">Welding</option>
                                        <option value="Main Line Tank">Main Line Tank</option>
                                        <option value="Drive Mechanism">Drive Mechanism</option>
                                        <option value="Vacuum Camber">Vacuum Camber</option>
                                        <option value="Welding">Welding</option>
                                        <option value="BTA">BTA</option>
                                        <option value="Metal Clad">Metal Clad</option>
                                        <option value="Wiring">Wiring</option>
                                        <option value="Testing">Testing</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-3 col-xs-6">
                                    <label type="ic-mit-no" class="cn-text">Mit No <span class="planner-fright">:</span></label>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <select class="form-control" name="mit_no0" id="ic-mit-no">
                                        <?php foreach ($store_data as $sd): ?>
                                            <?php if(!empty($sd->mit_no)){?>
                                                <option value="<?php echo $sd->mit_no;?>"><?php echo $sd->mit_no;?></option>
                                            <?php }?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-3 col-xs-6">
                                    <label for="uom-car" class="cn-text">UOM <span class="planner-fright">:</span></label>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <input type="text" class="form-control" name="uom0" id="uom-car">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-6">
                                    <label for="cn-qty" class="cn-text">Current Quantity <span class="planner-fright">:</span></label>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <input type="text" class="form-control" name="current_quantity0" id="cn-qty">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-3 col-xs-6">
                                    <label for="cn-zon" class="cn-text">Zon <span class="planner-fright">:</span></label>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <input type="text" class="form-control" name="zon0" id="cn-zon">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-3 col-xs-6">
                                    <label for="ic-rack-no" class="cn-text">Rack No <span class="planner-fright">:</span></label>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <input type="text" class="form-control" name="rack_no0" id="ic-rack-no">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-3 col-xs-6">
                                    <label for="ic-bin-no" class="cn-text">Bin No <span class="planner-fright">:</span></label>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <input type="text" class="form-control" name="bin_no0" id="ic-bin-no">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-3 col-xs-6">
                                    <label for="ic-level" class="cn-text">Level<span class="planner-fright">:</span></label>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <input type="text" class="form-control" name="level0" id="ic-level">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-3 col-xs-6">
                                    <label for="min-stock-level" class="cn-text">Min Stock Level <span class="planner-fright">:</span></label>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <input type="text" class="form-control" name="min_stock0" id="min-stock-level">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-3 col-xs-6">
                                    <label for="max-stock-level" class="cn-text">Max Stock Level<span class="planner-fright">:</span></label>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <input type="text" class="form-control" name="max_stock0" id="max-stock-level"">
                                </div>
                            </div>
                        </div>
                    </div>
                <input type="hidden" id="total" name="total" value="1">
                <input type="hidden" name="pm_id0" id="pm-id0" value="">
                <input type="hidden" name="created_by0" value="<?= $user_pic ?>">
                <div class="clearfix"></div>
                <span id="add-item-table"></span>
                <button class="btn btn-info" id="add-part">Add Part</button>
            </div>
            <div class="col-sm-offset-10 col-sm-2 col-xs-12">
                <button type="submit" class="button btn btn-info btn-submit">Submit</button>
            </div>
        </div>
    </div>
</div>
</div>

<!--================
add item
========================-->
<script>
    $(document).ready(function(){
        var count = 1;
        $('#add-part').on('click', function(e){
            e.preventDefault();
            var html_create = '<div class="clearfix"></div><hr/><div id="add-item-tr">' +
                '<div class="col-sm-6">' +
                '<div class="form-group">' +
                '<div class="col-sm-3 col-xs-6">' +
                '<label for="ic-date" class="cn-text">Date <span class="planner-fright">:</span></label>' +
                '</div>' +
                '<div class="col-sm-5 col-xs-6">' +
                '<input type="text" name="date'+count+'" class="form-control datepicker" id="ic-date" placeholder="mm/dd/yyyy"><input type="hidden" class="new-count" value="'+count+'">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<div class="col-sm-3 col-xs-6">' +
                '<label for="part-no0" class="cn-text">Part No <span class="planner-fright">:</span></label>' +
                '</div>' +
                '<div class="col-sm-5 col-xs-6">' +
                '<span id="no-td0"></span><input type="text" class="form-control part-no" id="part-no'+count+'" rel="'+count+'" name="part_no'+count+'"><span id="no0"></span>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<div class="col-sm-3 col-xs-6">' +
                '<label for="part-name0" class="cn-text">Part Name <span class="planner-fright">:</span></label>' +
                '</div>' +
                '<div class="col-sm-5 col-xs-6">' +
                '<span id="name-td0"></span><input type="text" class="form-control part-name" id="part-name'+count+'" rel="'+count+'" name="part_name'+count+'"><span id="name0"></span>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<div class="col-sm-3 col-xs-6">' +
                '<label for="drawing-no0" class="cn-text">Drawing No <span class="planner-fright">:</span></label>' +
                '</div>' +
                '<div class="col-sm-5 col-xs-6">' +
                '<input type="text" class="form-control drawing-no" id="drawing-no'+count+'" rel="'+count+'" name="drawing_no'+count+'">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<div class="col-sm-3 col-xs-6">' +
                '<label for="section-type" class="cn-text">Section <span class="planner-fright">:</span></label>' +
                '</div>' +
                '<div class="col-sm-5 col-xs-6">' +
                '<select class="form-control" name="section'+count+'" id="section-type">' +
                '<option value="Welding">Welding</option>' +
                '<option value="Main Line Tank">Main Line Tank</option>' +
                '<option value="Drive Mechanism">Drive Mechanism</option>' +
                '<option value="Vacuum Camber">Vacuum Camber</option>' +
                '<option value="Welding">Welding</option>' +
                '<option value="BTA">BTA</option>' +
                '<option value="Metal Clad">Metal Clad</option>' +
                '<option value="Wiring">Wiring</option>' +
                '<option value="Testing">Testing</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<div class="col-sm-3 col-xs-6">' +
                '<label type="ic-mit-no" class="cn-text">Mit No <span class="planner-fright">:</span></label>' +
                '</div>' +
                '<div class="col-sm-5 col-xs-6">' +
                '<select class="form-control" name="mit_no'+count+'" id="ic-mit-no">' +
                '<?php foreach ($store_data as $sd): ?>' +
                '<?php if(!empty($sd->mit_no)){?>' +
                '<option value="<?php echo $sd->mit_no;?>"><?php echo $sd->mit_no;?></option>' +
                '<?php }?>' +
                '<?php endforeach;?>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<div class="col-sm-3 col-xs-6">' +
                '<label for="uom-car" class="cn-text">UOM <span class="planner-fright">:</span></label>' +
                '</div>' +
                '<div class="col-sm-5 col-xs-6">' +
                '<input type="text" class="form-control" name="uom'+count+'" id="uom-car">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-6">' +
                '<div class="form-group">' +
                '<div class="col-sm-3 col-xs-6">' +
                '<label for="cn-qty" class="cn-text">Current Qty <span class="planner-fright">:</span></label>' +
                '</div>' +
                '<div class="col-sm-5 col-xs-6">' +
                '<input type="text" class="form-control" name="current_quantity'+count+'" id="cn-qty">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<div class="col-sm-3 col-xs-6">' +
                '<label for="cn-zon" class="cn-text">Zon <span class="planner-fright">:</span></label>' +
                '</div>' +
                '<div class="col-sm-5 col-xs-6">' +
                '<input type="text" class="form-control" name="zon'+count+'" id="cn-zon">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<div class="col-sm-3 col-xs-6">' +
                '<label for="ic-rack-no" class="cn-text">Rack No <span class="planner-fright">:</span></label>' +
                '</div>' +
                '<div class="col-sm-5 col-xs-6">' +
                '<input type="text" class="form-control" name="rack_no'+count+'" id="ic-rack-no">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<div class="col-sm-3 col-xs-6">' +
                '<label for="ic-bin-no" class="cn-text">Bin No <span class="planner-fright">:</span></label>' +
                '</div>' +
                '<div class="col-sm-5 col-xs-6">' +
                '<input type="text" class="form-control" name="bin_no'+count+'" id="ic-bin-no">' +
                '</div>' +
                '</div>' +
                '' +
                '<div class="form-group">' +
                '<div class="col-sm-3 col-xs-6">' +
                '<label for="ic-level" class="cn-text">Level<span class="planner-fright">:</span></label>' +
                '</div>' +
                ' <div class="col-sm-5 col-xs-6">' +
                '<input type="text" class="form-control" name="level'+count+'" id="ic-level">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<div class="col-sm-3 col-xs-6">' +
                '<label for="min-stock-level" class="cn-text">Min Stock Level <span class="planner-fright">:</span></label>' +
                '</div>' +
                '<div class="col-sm-5 col-xs-6">' +
                '<input type="text" class="form-control" name="min_stock'+count+'" id="min-stock-level">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<div class="col-sm-3 col-xs-6">' +
                '<label for="max-stock-level" class="cn-text">Max Stock Level<span class="planner-fright">:</span></label>' +
                '</div>' +
                '<div class="col-sm-5 col-xs-6">' +
                '<input type="text" class="form-control" name="max_stock'+count+'" id="max-stock-level""><input type="hidden" name="pm_id'+count+'" id="pm-id'+count+'" value=""><input type="hidden" name="created_by'+count+'" value="<?= $user_pic ?>">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
                count++;
            $('#total').val(count);
            $('#add-item-table').append(html_create);
        });
        var part_no = 'input.part-no';
        var part_name = 'input.part-name';
        var drawing_no = 'input.drawing-no';
        var data_no = [<?php echo $part_no; ?>];
        var options_no = {
            source: data_no,
            minLength: 0
        };
        var targetName = null;
        $(document).on('keydown.autocomplete', part_no, function() {
            $(this).autocomplete(options_no);
        });
        $(document).on('autocompleteselect', part_no, function(e, ui) {
            targetName = $(this).attr('rel');
            var newCount = $('.new-count').val();
            //alert(newCount);
            setTimeout(function(){
                $('#name-td'+newCount).addClass('so-loading-box');
                $('#name'+newCount).html('<img src="<?php echo $this->request->webroot."assets/img/loading.gif"; ?>" id="so-img" class="so-loading-table">');
            },100);
            setTimeout(function(){
                $('#name-td'+newCount).removeClass('so-loading-box');
                $('#name'+newCount).html('');
            },500);
            $('#part-name'+targetName).val(ui.item.idx);
            $('#drawing-no'+targetName).val(ui.item.idw);
            $('#pm-id'+targetName).val(ui.item.pm_id);
        });
        var data_name = [<?php echo $part_name; ?>];
        var options_name = {
            source: data_name,
            minLength: 0
        };
        var targetNo = null;
        $(document).on('keydown.autocomplete', part_name, function() {
            $(this).autocomplete(options_name);
        });
        $(document).on('autocompleteselect', part_name, function(e, ui) {
            targetNo = $(this).attr('rel');
            var newCount = $('.new-count').val();
            //alert(newCount);
            setTimeout(function(){
                $('#no-td'+newCount).addClass('so-loading-box');
                $('#no'+newCount).html('<img src="<?php echo $this->request->webroot."assets/img/loading.gif"; ?>" id="so-img" class="so-loading-table">');
            },100);
            setTimeout(function(){
                $('#no-td'+newCount).removeClass('so-loading-box');
                $('#no'+newCount).html('');
            },500);
            $('#part-no'+targetNo).val(ui.item.idx);
            $('#drawing-no'+targetNo).val(ui.item.idw);
            $('#pm-id'+targetName).val(ui.item.pm_id);
        });
        var data_draw = [<?php echo $drawing_no; ?>];
        var options_draw = {
            source: data_draw,
            minLength: 0
        };
        var targetDraw = null;
        $(document).on('keydown.autocomplete', drawing_no, function() {
            $(this).autocomplete(options_draw);
        });
        $(document).on('autocompleteselect', drawing_no, function(e, ui) {
            targetDraw = $(this).attr('rel');
            $('#part-no'+targetDraw).val(ui.item.idx);
            $('#part-name'+targetDraw).val(ui.item.idw);
            $('#pm-id'+targetName).val(ui.item.pm_id);
        });
    });
</script>
