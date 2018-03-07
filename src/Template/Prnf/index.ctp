<!--=========
Production Planner page
==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Production Reject Request</b></div>
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
                        <th rowspan="2">Part No</th>
                        <th rowspan="2">Quantity</th>
                        <th rowspan="2">Location</th>
                        <th rowspan="2">Description</th>
                        <th rowspan="2">Document</th>
                        <th rowspan="2">Create By</th>
                        <th rowspan="2">
                            <?php $action = ''; if($role == 'verifier'){$action = 'verify';echo 'Verify';}elseif($role == 'approve-1'){$action = 'approval1';echo 'Approve';}elseif($role == 'approve-2'){$action = 'approval2';echo 'Approve';}elseif($role == 'approve-3'){$action = 'approval3';echo 'Approve';}elseif($role == 'approve-4'){$action = 'approval4';echo 'Approve';}else{$action = 'edit';echo 'Edit';} ?>
                            </th>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <?php $i=0;foreach($prnf as $pr):$i++?>
                    <tr>
                            <td><?= $i?></td>
                            <td><?= $pr->date?></td>
                            <td><?= $pr->part_no?></td>
                            <td><?= $pr->quantity?></td>
                            <td><?= $pr->location?></td>
                            <td><?= $pr->description?></td>
                            <td><a href="<?= $pr->document?>"><?php if(isset($pr->document)){ echo "View";}else{echo '';}?></td>
                            <td><?= $pr->created_by?></td>
                            <td><a href="<?php echo $this->url->build(['controller' => 'Prnf', 'action' => $action, $pr->id]); ?>"><?php if($role == 'verifier'){echo 'Verify';}elseif($role == 'approve-1'){echo 'Approve';}elseif($role == 'approve-2'){echo 'Approve';}elseif($role == 'approve-3'){echo 'Approve';}elseif($role == 'approve-4'){echo 'Approve';}else{echo 'Edit';} ?></a></td>
                    </tr>
                    <?php endforeach;?>
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
