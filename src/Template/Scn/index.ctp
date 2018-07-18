<!--=========
      Create serial number form page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="part-title-planner text-uppercase text-center"><b>Store Credit Note Requests</b></div>
            <div class="clearfix"></div>
            <!--============== Add drawing table area ===================-->
            <div class="planner-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>SCN No</th>
                            <th>Location</th>
                            <th>Section</th>
                            <th>Create By</th>
                            <th>Department</th>
                            <th>Section</th>
                            <th><?php $action = ''; if($role == 'verifier'){$action = 'verify';echo 'Verify';}elseif($role == 'approve-1'){$action = 'approve';echo 'Approve';}elseif($role == 'approve-2'){$action = 'approval1';echo 'Approve';}else{$action = 'reqEdit';echo 'Edit';} ?></th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $count = 0; foreach($scn as $sn): $count++ ?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= $sn->date ?></td>
                                <td><span style="cursor: pointer;" class="click-button" data-toggle="modal" data-target="#myModal-<?= $count ?>"><b><?= 'SCN ' . $sn->id ?></b></span></td>
                                <td><?= $sn->location ?></td>
                                <td><?= $sn->section ?></td>
                                <td><?= $sn->created_by ?></td>
                                <td><?= $role; ?></td>
                                <td>Production</td>
                                <td><a href="<?php echo $this->url->build(['controller' => 'Scn', 'action' => $action, $sn->id]); ?>"><?php if($role == 'verifier'){echo 'Verify';}elseif($role == 'approve-1'){echo 'Approve';}elseif($role == 'approve-2'){echo 'Approve';}else{echo 'Edit';} ?></a></td>
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

    <!--======
        PURCHASE ORDER REQUEST LIST POPUP
      ===============================-->
    <?php $count = 0; foreach($scn as $sn): $count++; ?>
    <div class="modal fade" id="myModal-<?= $count ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Store Credit Note Popup</h4>
                </div>
                <div class="modal-body supplier-modal-body table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                        <tr>
                            <th>Part No</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Reason</th>
                            <th>Remark</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php foreach ($sn->items as $item): ?>
                            <tr>
                                <td><?= $item->part_no ?></td>
                                <td><?= $item->part_desc ?></td>
                                <td><?= $item->quantity ?></td>
                                <td><?= $item->reason ?></td>
                                <td><?= $item->remark ?></td>
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