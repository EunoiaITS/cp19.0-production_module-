<div class="planner-from">
    <form action="<?php echo $this->Url->build(['controller'=>'scn','action'=>'reqEdit',$scn->id])?>" method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Store Credit Note Form</b></div>
                <!-- </div>end mit title -->
                <div class="col-md-5 col-sm-6">
                    <div class="form-group left-from-group">
                        <div class="col-sm-3 col-xs-6">
                            <label for="scn-date" class="planner-year mit-label-item">Date <span class="planner-fright">:</span></label>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <input name="date" type="text" class="form-control datepicker" id="scn-date" value="<?php echo date('m/d/Y'); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Scn No <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text text-uppercase">SCN <?= $scn->id ?></p>
                        </div>
                    </div>
                    <div class="form-group left-from-group">
                        <div class="col-sm-3 col-xs-6">
                            <label for="mr-date" class="planner-year mit-label-item">So No<span class="planner-fright">:</span></label>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <input name="so_no" type="text" class="form-control" id="so-no" value="<?= $scn->so_no ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Create By <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text"><?= $pic ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Department <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text">Production</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Section <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <select class="form-control" name="section" id="mr-form">
                                <option value="Welding" <?php if($scn->section == 'Welding'): echo 'selected'; endif; ?>>Welding</option>
                                <option value="Main Line Tank" <?php if($scn->section == 'Main Line Tank'): echo 'selected'; endif; ?>>Main Line Tank</option>
                                <option value="Drive Mechanism" <?php if($scn->section == 'Drive Mechanism'): echo 'selected'; endif; ?>>Drive Mechanism</option>
                                <option value="Vacuum Camber" <?php if($scn->section == 'Vacuum Camber'): echo 'selected'; endif; ?>>Vacuum Camber</option>
                                <option value="Welding" <?php if($scn->section == 'Welding'): echo 'selected'; endif; ?>>Welding</option>
                                <option value="BTA" <?php if($scn->section == 'BTA'): echo 'selected'; endif; ?>>BTA</option>
                                <option value="Metal Clad" <?php if($scn->section == 'Metal Clad'): echo 'selected'; endif; ?>>Metal Clad</option>
                                <option value="Wiring" <?php if($scn->section == 'Wiring'): echo 'selected'; endif; ?>>Wiring</option>
                                <option value="Testing" <?php if($scn->section == 'Testing'): echo 'selected'; endif; ?>>Testing</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <label class="scn-text" for="prn-lo-form">Location <span class="planner-fright">:</span></label>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <select class="form-control" name="location" id="mr-form">
                                <option value="INDKOM 16" <?php if($scn->location == 'INDKOM 16'): echo 'selected'; endif; ?>>INDKOM 16</option>
                                <option value="INDKOM 24" <?php if($scn->location == 'INDKOM 24'): echo 'selected'; endif; ?>>INDKOM 24</option>
                            </select>
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
                        <th>Serial No</th>
                        <th>Part No</th>
                        <th>Part Name</th>
                        <th>QTY</th>
                        <th>Reason</th>
                        <th>Remark 1</th>
                        <th>Remark 2</th>
                    </tr>
                    </thead>
                    <tbody id="add-item-table">
                    <?php $count=0; foreach ($scn->items as $item): $count++;?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><input type="text" name="part_no<?= $count ?>" class="form-control" value="<?= $item->part_no ?>" readonly></td>
                        <td><input type="text" name="part_name<?= $count ?>" class="form-control" value="<?= $item->part_desc ?>" readonly></td>
                        <td><input type="text" name="quantity<?= $count ?>" class="form-control" value="<?= $item->quantity ?>" required></td>
                        <td><input type="text" name="reason<?= $count ?>" class="form-control" value="<?= $item->reason ?>"></td>
                        <td><input type="text" name="remark<?= $count ?>" class="form-control" value="<?= $item->remark ?>"></td>
                        <td><input type="hidden" name="item_id<?= $count ?>" value="<?= $item->id ?>"><input type="hidden" id="action" name="action<?= $count ?>" value="edit"></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <input type="hidden" id="total-count" value="<?= $count ?>">
                <button type="button" class="btn btn-info" id="add-part">Add Part</button>
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="col-sm-offset-10 col-sm-2 col-xs-12">
            <input type="hidden" name="created_by" value="<?= $pic ?>">
            <input type="hidden" name="status" value="requested">
            <input type="hidden" name="count" id="total" value="<?= $count?>">
            <button type="submit" class="button btn btn-info btn-submit">Update</button>
        </div>
            </div>
    </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        var count = +$('#total-count').val() + 1;
            $('#add-part').on('click', function (e) {
                e.preventDefault();
                var html_create = '<tr>' +
                    '<td>' + count + '</td>' +
                    '<td><input type="text" id="part-no' + count + '" rel="part-name' + count + '" name="part_no' + count + '" class="form-control half-control-sm part-no" required></td>' +
                    '<td><input type="text" id="part-name' + count + '" rel="part-name' + count + '" name="part_name' + count + '" class="form-control part-name" required></td>' +
                    '<td><input type="text" name="quantity' + count + '" class="form-control" required></td>' +
                    '<td><input type="text" name="reason' + count + '" class="form-control"></td>' +
                    '<td><input type="text" name="remark' + count + '" class="form-control"></td>' +
                    '<td><input type="hidden" id="action" name="action' + count + '" value="add"></td>' +
                    '<tr>';
                count++;
                $('#total').val(count);
                $('#add-item-table').append(html_create);
            });
        var part_no = 'input.part-no';
        var part_name = 'input.part-name';
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
            $('#'+targetName).val(ui.item.idx);
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
            $('#'+targetNo).val(ui.item.idx);
        });
    });
</script>

