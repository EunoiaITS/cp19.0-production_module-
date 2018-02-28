<!--=========
      Production Planner page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Non Billing Delivery Order Report</b></div>
            </div><!-- end mit title -->
        </div>

        <div class="clearfix"></div>

        <!--============== Add drawing table area ===================-->

        <div class="planner-table table-responsive clearfix">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Date</th>
                        <th rowspan="2">Nbdo No</th>
                        <th rowspan="2">Customer Name</th>
                        <th rowspan="2">Part No</th>
                        <th rowspan="2">Part Name</th>
                        <th rowspan="2">QTY</th>
                        <th rowspan="2">Create By</th>
                        <th rowspan="2">Department</th>
                        <th rowspan="2">Section</th>
                        <th colspan="3">Store</th>
                        <th rowspan="2">Document</th>
                        <th rowspan="2">Remark</th>
                    </tr>
                    <tr class="table-cell">
                        <th>Date</th>
                        <th>Ack Status</th>
                        <th>Verify By</th>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <?php $count = 0; foreach($nbdo as $n): ?>
                    <?php foreach($n->items as $item): $count++; ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $n->date ?></td>
                        <td>NBDO<?= $n->id ?></td>
                        <td><?= $n->cust_name ?></td>
                        <td><?= $item->part_no ?></td>
                        <td><?= $item->part_desc ?></td>
                        <td><?= $item->quantity ?></td>
                        <td><?= $n->created_by ?></td>
                        <td>Production</td>
                        <td>Busbar</td>
                        <td>11-03-17</td>
                        <td class="colored-csn">Ack</td>
                        <td>Amira</td>
                        <td><a href="#">View</a></td>
                        <td><?= $n->remark ?></td>
                    </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>