<div class="planner-from">
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
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <?php $n =0;
                    foreach($inventory as $inv): ?>
                        <tr>
                            <?php $n++;?>
                            <td><?php echo $n; ?></td>
                            <td><?= $inv->part_no ?></td>
                            <td><?= $inv->part_name ?></td>
                            <td><?= $inv->drawing_no ?></td>
                            <td><?= $inv->section ?>></td>
                            <td><?= $inv->uom ?></td>
                            <td><?= $inv->current_quantity ?></td>
                            <td><?= $inv->zon ?></td>
                            <td><?= $inv->rack_no ?></td>
                            <td><?= $inv->bin_no ?></td>
                            <td><?= $inv->level ?></td>
                            <td><?= $inv->min_stock ?></td>
                            <td><?= $inv->max_stock ?></td>
                            <td><a style="text-decoration: none;" class="btn btn-info" href="<?php echo $this->Url->build(['controller'=>'inventory','action'=>'view',$inv->id])?>">view</a></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
