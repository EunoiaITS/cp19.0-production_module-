<!--=========
      Create serial number form page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="part-title-planner text-uppercase text-center"><b>Serial Number Requests</b></div>
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
                            <th><?php $action = ''; if($role == 'verifier'){$action = 'verify';echo 'Verify';}elseif($role == 'approve_1'){$action = 'approve';echo 'Approve';}elseif($role == 'approve_1'){$action = 'acknowledge';echo 'Acknowledge';}elseif($role == 'approve_1'){$action = 'acknowledgeVerify';echo 'Acknowledge Verify';}else{$action = 'edit';echo 'Edit';} ?></th>
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
                                <td><a href="<?php echo $this->Url->build(['controller' => 'Mit', 'action' => $action, $m->id]); ?>"><?php if($role == 'verifier'){echo 'Verify';}elseif($role == 'approve_1'){echo 'Approve';}elseif($role == 'approve_2'){echo 'Ack';}elseif($role == 'approve_3'){echo 'Ack Verify';}else{echo 'Edit';} ?></a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>