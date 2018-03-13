<!--=========
      Create serial number form page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="part-title-planner text-uppercase text-center"><b>Non Billing Delivery Order Approval Status</b></div>
            <div class="clearfix"></div>
            <!--============== Add drawing table area ===================-->
            <div class="planner-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Nbdo No</th>
                            <th>Customer Name</th>
                            <th>Part No</th>
                            <th>Part Name</th>
                            <th>QTY</th>
                            <th>Create By</th>
                            <th>Department</th>
                            <th>Section</th>
                            <th>Status</th>
                            <th>Verify By</th>
                            <th>Status</th>
                            <th>Approve By</th>
                            <th>Document</th>
                            <th>Remark</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $count = 0; foreach($nbdo as $n): ?>
                        <?php foreach($n->items as $item): $count++; ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $n->date ?></td>
                            <td>Nbdo<?= $n->id ?></td>
                            <td><?= $n->cust_name ?></td>
                            <td><?= $item->part_no ?></td>
                            <td><?= $item->part_desc ?></td>
                            <td><?= $item->quantity ?></td>
                            <td><?= $n->created_by ?></td>
                            <td>Production</td>
                            <td><?= $n->section?></td>
                            <td class="<?php if($n->status == 'verified' || $n->status == 'approved'){echo 'colored-csn';}elseif($n->status == 'requested' || $n->status == 'rejected'){echo 'colored-red';}else{echo '';} ?>"><?php if($n->status == 'verified' || $n->status == 'approved'){echo 'Verified';}elseif($n->status == 'requested'){echo 'Pending';}elseif($n->status == 'rejected'){echo 'Rejected';}else{echo '';} ?></td>
                            <td><?= $n->verified_by ?></td>
                            <td class="<?php if($n->status == 'approved'){echo 'colored-csn';}elseif($n->status == 'requested' || $n->status == 'verified' || $n->status == 'rejected'){echo 'colored-red';}else{echo '';} ?>"><?php if($n->status == 'approved'){echo 'Approved';}elseif($n->status == 'requested' || $n->status == 'verified'){echo 'Pending';}elseif($n->status == 'rejected'){echo 'Rejected';}else{echo '';} ?></td>
                            <td><?= $n->approved_by ?></td>
                            <td><a href="<?php echo $this->request->webroot.$item->document; ?>">View</a></td>
                            <td><?= $n->remark ?></td>
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