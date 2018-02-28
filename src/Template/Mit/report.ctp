<!--=========
Production Planner page
==============-->
<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Material Issue Ticket Report</b></div>
                <div class="clearfix"></div>

                <!--============== Add drawing table area ===================-->

                <div class="planner-table table-responsive clearfix">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th rowspan="2">NO.</th>
                                <th rowspan="2">So No</th>
                                <th rowspan="2">Customer Name</th>
                                <th rowspan="2">MIT Date</th>
                                <th rowspan="2">MIT No</th>
                                <th rowspan="2">Model</th>
                                <th rowspan="2">Version</th>
                                <th rowspan="2">Type 1</th>
                                <th rowspan="2">Type 2</th>
                                <th rowspan="2">Qty</th>
                                <th rowspan="2">Create By</th>
                                <th rowspan="2">Department</th>
                                <th rowspan="2">Section</th>
                                <th rowspan="2">Location</th>
                                <th colspan="4">Store</th>
                                <th rowspan="2">Ack Status</th>
                                <th rowspan="2">Ack By</th>
                                <th rowspan="2">Document</th>
                                <th rowspan="2">Remark</th>
                            </tr>
                            <tr class="table-cell">
                                <th>Ack Status</th>
                                <th>Recive By</th>
                                <th>Delivery Date</th>
                                <th>Delivery Status</th>
                            </tr>
                            </thead>
                            <tbody class="csn-text-up">
                            <?php $i=0;foreach ($mit as $m):?>
                                <?php $i++;?>
                                <tr>
                                <td><?php echo $i;?></td>
                                <td><?= $m->sales->salesorder_no?></td>
                                <td><?= $m->cus->name?></td>
                                <td><?= $m->date?></td>
                                <td>MIT <?= $m->id?></td>
                                <td><?= $m->items->model?></td>
                                <td><?= $m->items->version?></td>
                                <td>INDOOR</td>
                                <td>Motorized</td>
                                <td><?= $m->items->quantity;?></td>
                                <td><?= $m->created_by?></td>
                                <td>Production</td>
                                <td>Welding</td>
                                <td><?= $m->location?></td>
                                <td class="colored-red">Pending</td>
                                <td>Amira</td>
                                <td>15/10/2017</td>
                                <td  class="colored-csn">Complete</td>
                                <td  class="colored-csn">Ack</td>
                                <td>Joned</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
