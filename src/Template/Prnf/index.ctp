<!--=========
Production Planner page
==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Production Reject Note Request</b></div>
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
                        <th rowspan="2">PRN No</th>
                        <th rowspan="2">Location</th>
                        <th rowspan="2">Section</th>
                        <th rowspan="2">Create By</th>
                        <?php if($role != 'requester'): ?>
                        <th rowspan="2">
                            <?php $action = ''; if($role == 'verifier'){$action = 'verify';echo 'Verify';}elseif($role == 'approve-1'){$action = 'approval1';echo 'Approve';}elseif($role == 'approve-2'){$action = 'approval2';echo 'Approve';}elseif($role == 'approve-3'){$action = 'approval3';echo 'Approve';}elseif($role == 'approve-4'){$action = 'approval4';echo 'Approve';}else{$action = 'edit';echo 'Edit';} ?>
                        </th>
                        <?php endif; ?>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <?php $count=0;foreach($prnf as $pr): $count++?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $pr->date ?></td>
                        <td><span style="cursor: pointer;" class="click-button" data-toggle="modal" data-target="#myModal-<?= $count ?>"><b><?= 'PRN '.$pr->id ?></b></span></td>
                        <td><?= $pr->location ?></td>
                        <td><?= $pr->section ?></td>
                        <td><?= $pr->created_by?></td>
                        <?php if($role != 'requester'): ?>
                            <td><a href="<?php echo $this->Url->build(['controller' => 'Prnf', 'action' => $action, $pr->id]); ?>"><?php if($role == 'verifier'){echo 'Verify';}elseif($role == 'approve-1'){echo 'Approve';}elseif($role == 'approve-2'){echo 'Approve';}elseif($role == 'approve-3'){echo 'Approve';}elseif($role == 'approve-4'){echo 'Approve';}else{echo 'Edit';} ?></a></td>
                        <?php endif; ?>
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
<!--======
        PURCHASE ORDER REQUEST LIST POPUP
      ===============================-->
<?php $count = 0; foreach($prnf as $pr): $count++; ?>
    <div class="modal fade" id="myModal-<?= $count ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Production Reject Note Popup</h4>
                </div>
                <div class="modal-body supplier-modal-body table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                        <tr>
                            <th>Part No</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th>Document</th>
                            <th>Reason</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php foreach ($pr->items as $item): ?>
                            <tr>
                                <td><?= $item->part_no ?></td>
                                <td><?= $item->part_name ?></td>
                                <td><?= $item->quantity ?></td>
                                <td><?= $item->description ?></td>
                                <td><a target="_blank" href="<?php if(isset($item->document)){echo $item->document;}else{ '';}?>"><span class="btn btn-primary">View</span></a></td>
                                <td><?= $item->reason ?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php endforeach;?>