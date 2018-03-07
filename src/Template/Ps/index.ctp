<!--=========
      Production Planner page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>PRODUCTION PLANNER MONTHLY SCHEDULER</b></div>
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
                        <th rowspan="2">Location</th>
                        <th rowspan="2">Year</th>
                        <th rowspan="2">Month</th>
                        <th rowspan="2">Total Items</th>
                        <th rowspan="2">Create By</th>
                        <th rowspan="2"><?php $action = ''; if($role == 'verifier'){$action = 'verify';echo 'Verify';}elseif($role == 'approve-1'){$action = 'approve1';echo 'Approve';}elseif($role == 'approve-2'){$action = 'approve2';echo 'Approve';}else{$action = 'view';echo 'View';} ?></th>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <?php foreach($ps as $p): ?>
                        <tr>
                            <td><?= $p->id ?></td>
                            <td><?= $p->date ?></td>
                            <td><?= $p->location ?></td>
                            <td><?= $p->year ?></td>
                            <td><?= $p->month ?></td>
                            <td><?= $p->total_items ?></td>
                            <td><?= $p->created_by ?></td>
                            <td><a href="<?php echo $this->url->build(['controller' => 'Ps', 'action' => 'view', $p->id]); ?>"><?php if($role == 'verifier'){echo 'Verify';}elseif($role == 'approve-1'){echo 'Approve';}elseif($role == 'approve-2'){echo 'Approve';}else{echo 'View';} ?></a></td>
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