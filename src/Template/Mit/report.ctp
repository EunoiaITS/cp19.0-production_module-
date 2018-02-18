<!--=========
Production Planner page
==============-->
<?php echo "<pre>";
print_r($sales);
echo "</pre>";?>
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
                                <th rowspan="2">Date</th>
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
                            <?php $i=0;foreach ($sales as $sal):?>
                            <?php foreach ($sal->soi as $item):?>
                                <?php $i++;?>
                                <tr>
                                <td><?php echo $i;?></td>
                                <td><?= $sal->salesorder_no?></td>
                                <td><?php foreach ($sal->cus as $c){echo $c->name;} ?></td>
                                <td><?=  date('d/m/Y', strtotime($sal->date));?></td>
                                <td>MIT 12345</td>
                                <td><?= $item->model?></td>
                                <td><?= $item->version?></td>
                                <td>INDOOR</td>
                                <td>Motorized</td>
                                <td><?= $item->quantity;?></td>
                                <td>MALIK</td>
                                <td>Production</td>
                                <td>Welding</td>
                                <td>Indkom 16</td>
                                <td>13/10/2017</td>
                                <td class="colored-red">Pending</td>
                                <td>Amira</td>
                                <td>15/10/2017</td>
                                <td  class="colored-csn">Complete</td>
                                <td  class="colored-csn">Ack</td>
                                <td>Joned</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php endforeach;endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
