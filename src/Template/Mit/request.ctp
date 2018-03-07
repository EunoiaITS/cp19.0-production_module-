<!--=========
      Create serial number form page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="part-title-planner text-uppercase text-center"><b>Material Issue Ticket Requests</b></div>
            <div class="clearfix"></div>
            <!--============== Add drawing table area ===================-->
            <div class="planner-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Create By</th>
                            <th>Department</th>
                            <th>Section</th>
                            <th><?php $action = ''; if($role == 'verifier'){$action = 'verify';echo 'Verify';}elseif($role == 'approve-1'){$action = 'approval';echo 'Approve';}elseif($role == 'approve-2'){$action = 'acknowledge';echo 'Acknowledge';}else{$action = 'edit';echo 'Edit';} ?></th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $count = 0; foreach($mit as $m): ?>
                            <?php $count++; ?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= $m->date ?></td>
                                <td><?= $m->location ?></td>
                                <td><?= $m->created_by ?></td>
                                <td><?= $role; ?></td>
                                <td>Production</td>
                                <td><a href="<?php echo $this->Url->build(['controller' => 'Mit', 'action' => $action, $m->id]); ?>"><?php if($role == 'verifier'){echo 'Verify';}elseif($role == 'approve-1'){echo 'Approve';}elseif($role == 'approve-2'){echo 'Ack';}else{echo 'Edit';} ?></a></td>
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