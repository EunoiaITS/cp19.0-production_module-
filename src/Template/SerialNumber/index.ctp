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
                            <th>Model</th>
                            <th>Version</th>
                            <th>Type 1</th>
                            <th>Type 2</th>
                            <th>Create By</th>
                            <th>Department</th>
                            <th>Section</th>
                            <th><?php $action = ''; if($role == 'verifier'){$action = 'verify';echo 'Verify';}elseif($role == 'approve_1'){$action = 'approve';echo 'Approve';}else{$action = 'edit';echo 'Edit';} ?></th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php foreach($serialNumber as $sn): ?>
                            <tr>
                                <td><?= $sn->id ?></td>
                                <td><?= $sn->date ?></td>
                                <td><?= $sn->model ?></td>
                                <td><?= $sn->version ?></td>
                                <td><?= $sn->type1 ?></td>
                                <td><?= $sn->type2 ?></td>
                                <td><?= $sn->created_by ?></td>
                                <td><?= $role; ?></td>
                                <td>Production</td>
                                <td><a href="<?php echo $this->url->build(['controller' => 'SerialNumber', 'action' => $action, $sn->id]); ?>"><?php if($role == 'verifier'){echo 'Verify';}elseif($role == 'approve_1'){echo 'Approve';}else{echo 'Edit';} ?></a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>