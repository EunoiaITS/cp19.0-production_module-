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
                        <th rowspan="2"><?php $action = ''; if($role == 'verifier'){$action = 'verify';echo 'Verify';}elseif($role == 'approve_1'){$action = 'approve1';echo 'Approve';}elseif($role == 'approve_2'){$action = 'approve2';echo 'Approve';}else{$action = 'view';echo 'View';} ?></th>
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
                            <td><a href="<?php echo $this->url->build(['controller' => 'Ps', 'action' => 'view', $p->id]); ?>"><?php if($role == 'verifier'){echo 'Verify';}elseif($role == 'approve_1'){echo 'Approve';}elseif($role == 'approve_2'){echo 'Approve';}else{echo 'View';} ?></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>