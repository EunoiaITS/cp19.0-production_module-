<!--=========
      Production Planner page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Material Request Report</b></div>
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
                        <th rowspan="2">MR No</th>
                        <th rowspan="2">Part No</th>
                        <th rowspan="2">Description</th>
                        <th rowspan="2">Uom</th>
                        <th rowspan="2">QTY</th>
                        <th rowspan="2">Document</th>
                        <th rowspan="2">Create By</th>
                        <th rowspan="2">Department</th>
                        <th rowspan="2">Section</th>
                        <th colspan="5">Store Department</th>
                        <th rowspan="2">Ack Status</th>
                        <th rowspan="2">Ack By</th>
                        <th rowspan="2">Remark</th>
                    </tr>
                    <tr class="table-cell">
                        <th>Ack Status</th>
                        <th>Recevied By</th>
                        <th>Delivery Date</th>
                        <th>Delivery Qty</th>
                        <th>Delivery Status</th>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <?php $count = 0; foreach($mr as $m): ?>
                    <?php foreach($m->items as $item): $count++; ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $m->date ?></td>
                        <td>MR<?= $m->id ?></td>
                        <td><?= $item->part_no ?></td>
                        <td><?= $item->part_desc ?></td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td><a href="#">View</a></td>
                        <td><?= $m->created_by ?></td>
                        <td>Production</td>
                        <td>13/10/2017</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?= $m->approved_by ?></td>
                        <td></td>
                    </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-12">
            <!-- pagination bar -->
            <div class="pagination-bar pull-right">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php
                        echo $this->Paginator->prev(__('Previous'), array('tag' => 'li', 'class' => 'page-item'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                        echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'page-link active','tag' => 'li','first' => 1));
                        echo $this->Paginator->next(__('Next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                        ?>
                    </ul>
                </nav>
            </div><!-- end pagination bar -->
        </div>
    </div>
</div>