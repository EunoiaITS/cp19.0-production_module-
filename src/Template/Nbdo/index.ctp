<!--=========
      Production Planner page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Material Request Report</b></div>
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
                        <th rowspan="2">Location</th>
                        <th rowspan="2">Create By</th>
                        <th rowspan="2"><?php $action = ''; if($role == 'verifier'){$action = 'verify';echo 'Verify';}elseif($role == 'approve_1'){$action = 'approve';echo 'Approve';}else{$action = 'edit';echo 'Edit';} ?></th>
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
                            <td><?= $mr->location ?></td>
                            <td><?= $mr->created_by ?></td>
                            <td><a href="<?php echo $this->url->build(['controller' => 'Nbdo', 'action' => $action, $mr->id]); ?>"><?php if($role == 'verifier'){echo 'Verify';}elseif($role == 'approve_1'){echo 'Approve';}else{echo 'Edit';} ?></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>