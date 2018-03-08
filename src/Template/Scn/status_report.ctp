<!--=========
      Production Planner page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Store Credit Note Approval Status</b></div>
            </div><!-- end mit title -->
        </div>

        <div class="clearfix"></div>

        <!--============== Add drawing table area ===================-->

        <div class="planner-table table-responsive clearfix">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Part No</th>
                        <th>Part Name</th>
                        <th>Reason Code</th>
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
                    <?php $count = 0; foreach($scn as $s): ?>
                        <?php foreach($s->items as $item): $count++; ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $s->date ?></td>
                        <td><?= $item->part_no ?></td>
                        <td><?= $item->part_desc ?></td>
                        <td><?= $item->reason ?></td>
                        <td><?= $item->quantity ?></td>
                        <td><?= $s->created_by ?></td>
                        <td>Production</td>
                        <td>Welding</td>
                        <td class="<?php if($s->status == 'verified' || $s->status == 'approved'){echo 'colored-csn';}elseif($s->status == 'requested' || $s->status == 'rejected'){echo 'colored-red';}else{echo '';} ?>"><?php if($s->status == 'verified' || $s->status == 'approved'){echo 'Verified';}elseif($s->status == 'requested'){echo 'Pending';}elseif($s->status == 'rejected'){echo 'Rejected';}else{echo '';} ?></td>
                        <td><?= $s->verified_by ?></td>
                        <td class="<?php if($s->status == 'approved'){echo 'colored-csn';}elseif($s->status == 'requested' || $s->status == 'verified' || $s->status == 'rejected'){echo 'colored-red';}else{echo '';} ?>"><?php if($s->status == 'approved'){echo 'Approved';}elseif($s->status == 'requested' || $s->status == 'requested'){echo 'Pending';}elseif($s->status == 'rejected'){echo 'Rejected';}else{echo '';} ?></td>
                        <td><?= $s->approved_by ?></td>
                        <td><a href="#">View</a></td>
                        <td><?= $s->remark ?></td>
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