<!--=========
Production Planner page
==============-->

<div class="planner-from">
    <form action="<?php echo $this->Url->build(['controller'=>'inventory','action'=>'add']);?>" method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Inventory Create</b></div>
            </div><!-- end mit title -->
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
                        <th>Part Name</th>
                        <th>Drawing No</th>
                        <th>Section</th>
                        <th>UOM</th>
                        <th>Current Qty</th>
                        <th>Zon</th>
                        <th>Rack No</th>
                        <th>Bin No</th>
                        <th>Level</th>
                        <th>Min Stock Level</th>
                        <th>Max Stock Level</th>
                    </tr>
                    </thead>
                    <tbody id="add-item-table">
                    <tr>
                        <td>1</td>
                        <td><input type="text" class="form-control part-no" id="part-no0" rel="0" name="part_no0"></td>
                        <td><input type="text" class="form-control part-name" id="part-name0" rel="0" name="part_name0"></td>
                        <td><input type="text" class="form-control drawing-no" id="drawing-no0" rel="0" name="drawing_no0"></td>
                        <td><input type="text" class="form-control" name="section0"></td>
                        <td><input type="text" class="form-control" name="uom0"></td>
                        <td><input type="text" class="form-control" name="current_quantity0"></td>
                        <td><input type="text" class="form-control" name="zon0"></td>
                        <td><input type="text" class="form-control" name="rack_no0"></td>
                        <td><input type="text" class="form-control" name="bin_no0"></td>
                        <td><input type="text" class="form-control" name="level0"></td>
                        <td><input type="text" class="form-control" name="min_stock0"></td>
                        <td><input type="text" class="form-control" name="max_stock0"></td>
                        <input type="hidden" id="total" name="total" value="1">
                    </tr>
                    </tbody>
                </table>
                <button class="btn btn-info" id="add-part">Add Part</button>
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="col-sm-offset-10 col-sm-2 col-xs-12">
            <button type="submit" class="button btn btn-info btn-submit">Submit</button>
        </div>
    </div>
</form>
</div>
<!--================
add item
========================-->
<script>
    $(document).ready(function(){
        var count = 1;
        $('#add-part').on('click', function(e){
            e.preventDefault();
            var html_create = '<tr>'+
                '<td>'+(count+1)+'</td>'+
                '<td><input type="text" name="part_no'+count+'" id="part-no'+count+'" rel="'+count+'" class="form-control part-no half-control-sm"></td>'+
                '<td><input type="text" name="part_name'+count+'" id="part-name'+count+'" rel="'+count+'" class="form-control part-name"></td>'+
                '<td><input type="text" name="drawing_no'+count+'" id="drawing-no'+count+'" rel="'+count+'" class="form-control drawing-no"></td>'+
                '<td><input type="text" name="section'+count+'" class="form-control"></td>'+
                '<td><input type="text" name="uom'+count+'" class="form-control"></td>'+
                '<td><input type="text" name="current_quantity'+count+'" class="form-control"></td>'+
                '<td><input type="text" name="zon'+count+'" class="form-control"></td>'+
                '<td><input type="text" name="rack_no'+count+'" class="form-control"></td>'+
                '<td><input type="text" name="bin_no'+count+'" class="form-control"></td>'+
                '<td><input type="text" name="level'+count+'" class="form-control"></td>'+
                '<td><input type="text" name="min_stock'+count+'" class="form-control"></td>'+
                '<td><input type="text" name="max_stock'+count+'" class="form-control"></td>'+
                '<tr>';
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
            $('#part-name'+targetName).val(ui.item.idx);
            $('#drawing-no'+targetName).val(ui.item.idw);
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
            $('#part-no'+targetNo).val(ui.item.idx);
            $('#drawing-no'+targetNo).val(ui.item.idw);

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
            $('#part-name'+targetDraw).val(ui.item.idx);
            $('#part-name'+targetDraw).val(ui.item.idw);
        });
    });
</script>
