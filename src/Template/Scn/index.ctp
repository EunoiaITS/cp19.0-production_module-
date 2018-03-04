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
                            <th>Location</th>
                            <th>Create By</th>
                            <th>Department</th>
                            <th>Section</th>
                            <th><?php $action = ''; if($role == 'verifier'){$action = 'verify';echo 'Verify';}elseif($role == 'approve-1'){$action = 'approve';echo 'Approve';}else{$action = 'edit';echo 'Edit';} ?></th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php foreach($scn as $sn): ?>
                            <tr>
                                <td><?= $sn->id ?></td>
                                <td><?= $sn->date ?></td>
                                <td><?= $sn->location ?></td>
                                <td><?= $sn->created_by ?></td>
                                <td><?= $role; ?></td>
                                <td>Production</td>
                                <td><a href="<?php echo $this->url->build(['controller' => 'Scn', 'action' => $action, $sn->id]); ?>"><?php if($role == 'verifier'){echo 'Verify';}elseif($role == 'approve-1'){echo 'Approve';}else{echo 'Edit';} ?></a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>