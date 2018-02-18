<div class="planner-from">
    <form action="<?php echo $this->Url->build(['controller'=>'scn','action'=>'add'])?>" method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Store Credit Note Form</b></div>
            </div><!-- end mit title -->
                <div class="col-md-5 col-sm-6">
                    <div class="form-group left-from-group">
                        <div class="col-sm-3 col-xs-6">
                            <label for="scn-date" class="planner-year mit-label-item">Date <span class="planner-fright">:</span></label>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <input name="date" type="text" class="form-control datepicker" id="scn-date">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Scn No <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text text-uppercase">SCN12345</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Create By <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text"><?= $pic_name ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Department <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text"><?= $pic_dept ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Section <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text"><?= $pic_section ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <label class="scn-text" for="prn-lo-form">Location <span class="planner-fright">:</span></label>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <select class="form-control" name="location" id="scn-lo-form">
                                <option value="INDKOM 16">INDKOM 16</option>
                                <option value="INDKOM 24">INDKOM 24</option>
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
                        <th>No</th>
                        <th>Part No</th>
                        <th>Part Name</th>
                        <th>Reason Code</th>
                        <th>QTY</th>
                        <th>Remark 1</th>
                        <th>Remark 2</th>
                    </tr>
                    </thead>
                    <tbody id="add-item-table">
                    <tr>
                        <td>1</td>
                        <td><input type="text" class="form-control part-no" id="part-no" rel="part-name" name="scnPartNo1"></td>
                        <td><input type="text" class="form-control part-name" id="part-name" rel="part-no" name="scnPartName1"></td>
                        <td><input type="text"  class="form-control" name="scnReasonCode1"></td>
                        <td><input type="text"  class="form-control" name="scnQty1"></td>
                        <td><input type="text" class="form-control" name="scnRemark1"></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <button class="btn btn-info" id="add-part">Add Part</button>
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="col-sm-offset-10 col-sm-2 col-xs-12">
            <input type="hidden" name="created_by" value="<?= $pic ?>">
            <input type="hidden" name="status" value="requested">
            <button type="submit" class="button btn btn-info btn-submit">Create</button>
        </div>
    </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        var count = 1;
        $('#add-part').on('click', function(e){
            e.preventDefault();
            count++;
            var html_create = '<tr>'+
                '<td>'+count+'</td>'+
                '<td><input type="text" id="part-no'+count+'" rel="part-name'+count+'" name="scnPartNo'+count+'" class="form-control half-control-sm part-no"></td>'+
                '<td><input type="text" id="part-name'+count+'" rel="part-name'+count+'" name="scnPartName'+count+'" class="form-control part-name"></td>'+
                '<td><input type="text" name="scnReasonCode'+count+'" class="form-control"></td>'+
                '<td><input type="text" name="scnQty'+count+'" class="form-control"></td>'+
                '<td><input type="text" name="scnRemark'+count+'" class="form-control"></td>'+
                '<td></td>'+
                '<tr>'+
                '<input type="hidden" name="count" value="'+count+'">';
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

