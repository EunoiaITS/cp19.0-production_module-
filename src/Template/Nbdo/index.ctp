<!--=========
      Production Planner page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>NON BILLING DELIVERY ORDER</b></div>
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
                        <th rowspan="2">Customer Name</th>
                        <th rowspan="2">Address</th>
                        <th rowspan="2">Contact Person</th>
                        <th rowspan="2">Contact No</th>
                        <th rowspan="2">Section</th>
                        <th rowspan="2">Location</th>
                        <th rowspan="2">Create By</th>
                        <?php if($role != 'requester'): ?>
                        <th rowspan="2"><?php $action = ''; if($role == 'verifier'){$action = 'verify';echo 'Verify';}elseif($role == 'approve-1'){$action = 'approve';echo 'Approve';} ?></th>
                        <?php endif;?>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <?php foreach($nbdo as $mr): ?>
                        <tr>
                            <td><?= $mr->id ?></td>
                            <td><?= $mr->date ?></td>
                            <td><?= $mr->cust_name ?></td>
                            <td><?= $mr->address ?></td>
                            <td><?= $mr->contact_person ?></td>
                            <td><?= $mr->contact_no ?></td>
                            <td><?= $mr->section ?></td>
                            <td><?= $mr->location ?></td>
                            <td><?= $mr->created_by ?></td>
                            <?php if($role != 'requester'): ?>
                            <td><a href="<?php echo $this->url->build(['controller' => 'Nbdo', 'action' => $action, $mr->id]); ?>"><?php if($role == 'verifier'){echo 'Verify';}elseif($role == 'approve-1'){echo 'Approve';} ?></a></td>
                            <?php endif;?>
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