<!--=========
Production Planner page
==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Inventory Report</b></div>
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
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <?php $n =0;
                    foreach($inventory as $inv): ?>
                    <tr>
                        <?php $n++;?>
                        <td><?php echo $n; ?></td>
                        <td id="part-no<?= $inv->id; ?>"><?= $inv->part_no; ?></td>
                        <td id="part-name<?= $inv->id; ?>"><?= $inv->part_name; ?></td>
                        <td id="drawing-no<?= $inv->id; ?>"><?= $inv->drawing_no; ?></td>
                        <td id="section<?= $inv->id; ?>"><?= $inv->section; ?></td>
                        <td id="uom<?= $inv->id; ?>"><?= $inv->uom; ?></td>
                        <td id="current<?= $inv->id; ?>"><?= $inv->current_quantity; ?></td>
                        <td id="zon<?= $inv->id; ?>"><?= $inv->zon; ?></td>
                        <td id="rack<?= $inv->id; ?>"><?= $inv->rack_no; ?></td>
                        <td id="bin<?= $inv->id; ?>"><?= $inv->bin_no; ?></td>
                        <td id="level<?= $inv->id; ?>"><?= $inv->level; ?></td>
                        <td id="min-stock<?= $inv->id; ?>"><?= $inv->min_stock; ?></td>
                        <td id="max-stock<?= $inv->id; ?>"><?= $inv->max_stock; ?></td>
                        <td><button id="modal-popup" class="btn btn-info my_button" id="view<?= $inv->id; ?>" data-toggle="modal" data-target="#myModal" rel="<?= $inv->id; ?>">Edit</button></td>
                    </tr>
                        <span class="hidden" id="edit-id<?= $inv->id;?>"><?= $inv->id; ?></span>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!--Inventory edit popup
  ===================-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
    <form action="<?php echo $this->Url->build(['controller'=>'Inventory','action'=>'edit']);?>" method="post">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Inventory Edit </h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Inventory Title</th>
                        <th>Edit Option</th>
                    </tr>
                    </thead>
                    <tbody id="add-item-table">
                    <tr>
                        <td>1</td>
                        <td>Part No</td>
                        <td><input id="part-no-view" type="text" class="form-control" name="part_no"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Part Name</td>
                        <td><input id="part-name-view" type="text" class="form-control" name="part_name"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Drawing No</td>
                        <td><input id="drawing-no-view" type="text" class="form-control" name="drawing_no"></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Section</td>
                        <td><input id="section-view" type="text" class="form-control" name="section"></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>UOM</td>
                        <td><input id="uom-view" type="text" class="form-control" name="uom"></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Current Qty</td>
                        <td><input id="current-view" type="text" class="form-control" name="current_quantity"></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Zon</td>
                        <td><input id="zon-view" type="text" class="form-control" name="zon"></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Rack No</td>
                        <td><input id="rack-view" type="text" class="form-control" name="rack_no"></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Bin No</td>
                        <td><input id="bin-view" type="text" class="form-control" name="bin_no"></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Level</td>
                        <td><input id="level-view" type="text" class="form-control" name="level"></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Min Stock Level</td>
                        <td><input id="min-stock-view" type="text" class="form-control" name="min_stock"></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Max Stock Level</td>
                        <td><input id="max-stock-view" type="text" class="form-control" name="max_stock"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="inventory_id" name="inv_name" value="">
                <button id="modal-save" type="submit" class="btn btn-primary save">Save</button>
            </div>
        </div>
    </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('.my_button').on('click',function(e) {
            e.preventDefault();
            var id = $(this).attr("rel");
            $('#part-no-view').val($('#part-no'+id).text());
            $('#part-name-view').val($('#part-name'+id).text());
            $('#drawing-no-view').val($('#drawing-no'+id).text());
            $('#section-view').val($('#section'+id).text());
            $('#uom-view').val($('#uom'+id).text());
            $('#current-view').val($('#current'+id).text());
            $('#zon-view').val($('#zon'+id).text());
            $('#rack-view').val($('#rack'+id).text());
            $('#bin-view').val($('#bin'+id).text());
            $('#level-view').val($('#level'+id).text());
            $('#min-stock-view').val($('#min-stock'+id).text());
            $('#max-stock-view').val($('#max-stock'+id).text());
            $('#inventory_id').val(id);
        });
    });
</script>