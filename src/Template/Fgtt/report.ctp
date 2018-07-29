<!--=========
      Production Planner page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Finish Good Transfer Ticket Report</b></div>
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
                        <th rowspan="2">Tender No</th>
                        <th rowspan="2">So No</th>
                        <th rowspan="2">Model</th>
                        <th rowspan="2">Version</th>
                        <th rowspan="2">Type 1</th>
                        <th rowspan="2">Type 2</th>
                        <th rowspan="2">QTY</th>
                        <th rowspan="2">Create By</th>
                        <th rowspan="2">Department</th>
                        <th rowspan="2">Section</th>
                        <th colspan="3">Testing</th>
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
                    <?php $count = 0; foreach($fgtt as $f): $count++; ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td>N/A</td>
                        <td><?= $f->so_no ?></td>
                        <td><?php if(isset($f->details->model)){echo $f->details->model;} ?></td>
                        <td><?php if(isset($f->details->version)){echo $f->details->version;}  ?></td>
                        <td><?php if(isset($f->details->type1)){echo $f->details->type1;}  ?></td>
                        <td><?php if(isset($f->details->type2)){echo $f->details->type2;}  ?></td>
                        <td><?php if(isset($f->details->quantity)){echo $f->details->quantity;} ?></td>
                        <td><?= $f->created_by ?></td>
                        <td>Production</td>
                        <td>Wiring</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="#">View</a></td>
                        <td><?= $f->remark ?></td>
                    </tr>
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