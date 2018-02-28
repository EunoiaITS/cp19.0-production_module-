<!--=========
      Production Planner page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Material Request Approval Status</b></div>
            </div><!-- end mit title -->
        </div>

        <div class="clearfix"></div>

        <!--============== Add drawing table area ===================-->

        <div class="planner-table table-responsive clearfix">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>MR No</th>
                        <th>Part No</th>
                        <th>Description</th>
                        <th>UOM</th>
                        <th>QTY</th>
                        <th>Document</th>
                        <th>Create By</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Verify By</th>
                        <th>Status</th>
                        <th>Approve By</th>
                        <th>Remark</th>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <?php foreach($mr as $m): ?>
                    <?php $count = 0; foreach($m->items as $item): $count++; ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $m->date ?></td>
                        <td>MR<?= $m->id ?></td>
                        <td><?= $item->part_no ?></td>
                        <td><?= $item->part_desc ?></td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td><a href="#">View</a></td>
                        <td><?= $m->created_by ?></td>
                        <td>Production</td>
                        <td class="<?php if($m->status == 'verified' || $m->status == 'approved'){echo 'colored-csn';}elseif($m->status == 'requested' || $m->status == 'rejected'){echo 'colored-red';}else{echo '';} ?>"><?php if($m->status == 'verified' || $m->status == 'approved'){echo 'Verified';}elseif($m->status == 'requested'){echo 'Pending';}elseif($m->status == 'rejected'){echo 'Rejected';}else{echo '';} ?></td>
                        <td><?= $m->verified_by ?></td>
                        <td class="<?php if($m->status == 'approved'){echo 'colored-csn';}elseif($m->status == 'requested' || $m->status == 'verified' || $m->status == 'rejected'){echo 'colored-red';}else{echo '';} ?>"><?php if($m->status == 'approved'){echo 'Approved';}elseif($m->status == 'requested' || $m->status == 'requested'){echo 'Pending';}elseif($m->status == 'rejected'){echo 'Rejected';}else{echo '';} ?></td>
                        <td><?= $m->approved_by ?></td>
                        <td><?= $m->remark ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>