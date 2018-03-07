<!--=========
      Create serial number form page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="part-title-planner text-uppercase text-center"><b>Production Planner Progress-Report</b></div>
            <form action="#" class="planner-relative">
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Month <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text"><?php echo date('M-Y'); ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Actual Qty <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text">17</p>
                        </div>
                    </div>
                </div>
            </form>

            <div class="clearfix"></div>
            <!--============== Add drawing table area ===================-->
            <div class="planner-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Po No</th>
                            <th>Tender No</th>
                            <th>So No</th>
                            <th>Customer Code</th>
                            <th>Customer Name</th>
                            <th>Date Completion</th>
                            <th>Delivery Date</th>
                            <th>Model</th>
                            <th>Version</th>
                            <th>Type 1</th>
                            <th>Type 2</th>
                            <th>QTY</th>
                            <th>Ready For PI</th>
                            <th>After PI</th>
                            <th>Ready For Delivery</th>
                            <th>Complete Delivery</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $count = 0; foreach($ps as $p): ?>
                        <?php foreach($sales->{$p->id} as $s): ?>
                        <?php foreach($s->soi as $item): $count ++; ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $s->tenderNo ?></td>
                            <td><?= $s->salesorder_no ?></td>
                            <td><?php foreach($s->cus as $cus){echo $cus->customerID;} ?></td>
                            <td><?php foreach($s->cus as $cus){echo $cus->name;} ?></td>
                            <td><?= date('m/d/Y', strtotime($s->delivery_date)) ?></td>
                            <td><?= (isset($s->fgtt->date) ? $s->fgtt->date : '') ?></td>
                            <td><?= $item->model ?></td>
                            <td><?= $item->version ?></td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td><?= $item->quantity ?></td>
                            <td>10</td>
                            <td>1</td>
                            <td>4</td>
                            <td></td>
                        </tr>
                                <?php endforeach; endforeach; endforeach; ?>
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