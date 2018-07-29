<!--=========
      Production Planner page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>MATERIAL REQUEST</b></div>
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
                        <th rowspan="2">Location</th>
                        <th rowspan="2">Section</th>
                        <th rowspan="2">Create By</th>
                        <th rowspan="2"><?php $action = ''; if($role == 'verifier'){$action = 'verify';echo 'Verify';}elseif($role == 'approve-1'){$action = 'approve';echo 'Approve';}else{$action = 'reqEdit';echo 'Edit';} ?></th>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <?php $count = 0; foreach($materialRequest as $mr): $count++; ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $mr->date ?></td>
                            <td><span style="cursor: pointer;" class="click-button" data-toggle="modal" data-target="#myModal-<?= $count ?>"><b><?= 'MR ' . $mr->id ?></b></span></td>
                            <td><?= $mr->location ?></td>
                            <td><?= $mr->section ?></td>
                            <td><?= $mr->created_by ?></td>
                            <td><a href="<?php echo $this->Url->build(['controller' => 'MaterialRequest', 'action' => $action, $mr->id]); ?>"><?php if($role == 'verifier'){echo 'Verify';}elseif($role == 'approve-1'){echo 'Approve';}else{echo 'Edit';} ?></a></td>
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
<?php $count = 0; foreach($materialRequest as $mr): $count++; ?>
<div class="modal fade" id="myModal-<?= $count ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Material Request Popup</h4>
            </div>
            <div class="modal-body supplier-modal-body table-responsive">
                <table class="table table-bordered ">
                    <thead>
                    <tr>
                        <th>Part No</th>
                        <th>Description</th>
                        <th>Quantity</th>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <?php foreach ($mr->items as $item): ?>
                    <tr>
                        <td><?= $item->part_no ?></td>
                        <td><?= $item->part_desc ?></td>
                        <td><?= $item->quantity ?></td>
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