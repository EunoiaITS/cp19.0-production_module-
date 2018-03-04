<!--=========
      Create serial number form page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="part-title-planner text-uppercase text-center"><b>Serial Number Approval Status</b></div>
            <div class="clearfix"></div>
            <!--============== Add drawing table area ===================-->
            <div class="planner-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>SO No</th>
                            <th>Model</th>
                            <th>Version</th>
                            <th>Type 1</th>
                            <th>Type 2</th>
                            <th>SN QTY</th>
                            <th>Create By</th>
                            <th>Department</th>
                            <th>Section</th>
                            <th>Status</th>
                            <th>Verify</th>
                            <th>Status</th>
                            <th>Approve</th>
                            <th>Remark</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $count = 0; foreach($sn as $s): ?>
                        <?php foreach($s->items as $item): ?>
                            <?php $count++; ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?= $s->date ?></td>
                            <td><?= $s->so_no ?></td>
                            <td><?= $s->model ?></td>
                            <td><?= $s->version ?></td>
                            <td><?= $s->type1 ?></td>
                            <td><?= $s->type2 ?></td>
                            <td><?= date('ymd', strtotime($s->date)).$item->id ?></td>
                            <td><?= $s->created_by ?></td>
                            <td>Production</td>
                            <td>Planner</td>
                            <td class="<?php if($s->status == 'verified' || $s->status == 'approved'){echo 'colored-csn';}elseif($s->status == 'requested'){echo 'colored-red';}elseif($s->status == 'rejected'){echo 'colored-red';}else{echo '';} ?>"><?php if($s->status == 'verified' || $s->status == 'approved'){echo 'Verified';}elseif($s->status == 'requested'){echo 'Pending';}elseif($s->status == 'rejected'){echo 'Rejected';}else{echo '';} ?></td>
                            <td><?= $s->verified_by ?></td>
                            <td class="<?php if($s->status == 'approved'){echo 'colored-csn';}elseif($s->status == 'requested' || $s->status == 'rejected' || $s->status == 'verified'){echo 'colored-red';} ?>"><?php if($s->status == 'approved'){echo 'Approved';}elseif($s->status == 'verified'){echo 'Pending';}elseif($s->status == 'requested'){echo 'Pending';}elseif($s->status == 'rejected'){echo 'Rejected';}else{echo '';} ?></td>
                            <td><?= $s->approved_by ?></td>
                            <td><?= $s->remark ?></td>
                        </tr>
                        <?php endforeach; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>