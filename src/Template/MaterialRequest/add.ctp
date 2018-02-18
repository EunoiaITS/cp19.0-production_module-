<!--=========
      Production Planner page
      ==============-->

<div class="planner-from">
    <form method="post" action="<?php echo $this->url->build(['controller' => 'MaterialRequest', 'action' => 'add']); ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Material Request Form</b></div>
            </div><!-- end mit title -->
                <div class="col-md-5 col-sm-6">
                    <div class="form-group left-from-group">
                        <div class="col-sm-3 col-xs-6">
                            <label for="mr-date" class="planner-year mit-label-item">Date <span class="planner-fright">:</span></label>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <input name="date" type="text" class="form-control datepicker" id="mr-date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Mr No <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text">MR<?= $sn_no ?></p>
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
                            <label class="cn-text" for="mr-form">Location <span class="planner-fright">:</span></label>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <select class="form-control" name="location" id="mr-form">
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
                        <th>NO.</th>
                        <th>Part No</th>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Remarks</th>
                    </tr>
                    </thead>
                    <tbody id="add-item-table">
                    <tr>
                        <td>1</td>
                        <td><input type="text" class="form-control part-no" id="part-no0" rel="part-name0" name="part_no0" required=""></td>
                        <td><input type="text" class="form-control part-name" id="part-name0" rel="part-no0" name="part_desc0" required=""></td>
                        <td><input type="text" class="form-control" name="quantity0" required=""></td>
                        <td><input type="hidden" id="total" name="total" value="1"></td>
                    </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-info" id="add-part">Add Part</button>
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="col-sm-offset-10 col-sm-2 col-xs-12">
            <input type="hidden" name="status" value="requested">
            <input type="hidden" name="created_by" value="<?= $pic ?>">
            <button type="submit" class="button btn btn-info btn-submit">Create</button>
        </div>
    </div>
    </form>
</div>
</div>

<script>
    $(document).ready(function(){

        var count = 1;

        $('#add-part').on('click', function(e){
            e.preventDefault();
            var html_table = '';
            html_table += '<tr>'+
            '<td>'+(count+1)+'</td>'+
            '<td><input type="text" class="form-control part-no" id="part-no'+count+'" rel="part-name'+count+'" name="part_no'+count+'" required></td>'+
            '<td><input type="text" class="form-control part-name" id="part-name'+count+'" rel="part-no'+count+'" name="part_desc'+count+'" required></td>'+
            '<td><input type="text" class="form-control" name="quantity'+count+'" required></td>'+
            '<td></td>'+
            '</tr>';
            count++;
            $('#total').val(count);
            $('#add-item-table').append(html_table);
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