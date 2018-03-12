<!--=========
      Create serial number form page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="part-title-planner text-uppercase text-center"><b>Finish Good Transger Ticket Approval Status</b></div>
            <div class="clearfix"></div>
            <!--============== Add drawing table area ===================-->
            <div class="planner-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tender No</th>
                            <th>So No</th>
                            <th>Model</th>
                            <th>Version</th>
                            <th>Type 1</th>
                            <th>Type 2</th>
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
                        <?php $count = 0; foreach($fgtt as $f): $count++; ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td>TNB 380/2016</td>
                            <td><?= $f->so_no ?></td>
                            <td><?= $f->details->model ?></td>
                            <td><?= $f->details->version ?></td>
                            <td><?= $f->details->type1 ?></td>
                            <td><?= $f->details->type2 ?></td>
                            <td><?= $f->qty ?></td>
                            <td><?= $f->created_by ?></td>
                            <td>Production</td>
                            <td>Wiring</td>
                            <td class="<?php if($f->status == 'verified' || $f->status == 'approved'){echo 'colored-csn';}elseif($f->status == 'requested' || $f->status == 'rejected'){echo 'colored-red';}else{echo '';} ?>"><?php if($f->status == 'verified' || $f->status == 'approved'){echo 'Verified';}elseif($f->status == 'requested'){echo 'Pending';}elseif($f->status == 'rejected'){echo 'Rejected';}else{echo '';} ?></td>
                            <td><?= $f->verified_by ?></td>
                            <td class="<?php if($f->status == 'approved'){echo 'colored-csn';}elseif($f->status == 'requested' || $f->status == 'verified' || $f->status == 'rejected'){echo 'colored-red';}else{echo '';} ?>"><?php if($f->status == 'approved'){echo 'Approved';}elseif($f->status == 'requested' || $f->status == 'requested'){echo 'Pending';}elseif($f->status == 'rejected'){echo 'Rejected';}else{echo '';} ?></td>
                            <td><?= $f->approved_by ?></td>
                            <td><a href="<?php echo $this->url->build(['controller' => 'Fgtt', 'action' => 'view', $f->id]); ?>">View</a></td>
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
