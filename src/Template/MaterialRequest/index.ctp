<!--=========
      Production Planner page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Non Billing Delivery Order</b></div>
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
                        <th rowspan="2">Create By</th>
                        <th rowspan="2"><?php $action = ''; if($role == 'verifier'){$action = 'verify';echo 'Verify';}elseif($role == 'approve_1'){$action = 'approve';echo 'Approve';}else{$action = 'edit';echo 'Edit';} ?></th>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <?php foreach($materialRequest as $mr): ?>
                        <tr>
                            <td><?= $mr->id ?></td>
                            <td><?= $mr->date ?></td>
                            <td><?= $mr->location ?></td>
                            <td><?= $mr->created_by ?></td>
                            <td><a href="<a href="<?php echo $this->url->build(['controller' => 'MaterialRequest', 'action' => $action, $mr->id]); ?>"><?php if($role == 'verifier'){echo 'Verify';}elseif($role == 'approve_1'){echo 'Approve';}else{echo 'Edit';} ?></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>