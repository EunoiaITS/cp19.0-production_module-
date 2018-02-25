<!--=========
      Create serial number form page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="part-title-planner text-uppercase text-center"><b>Production Planner Monthy Production Planning Approval Status</b></div>
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
                            <th>Month</th>
                            <th>Year</th>
                            <th>QTY</th>
                            <th>Create By</th>
                            <th>Status</th>
                            <th>Verify </th>
                            <th>Status</th>
                            <th>Approval 1</th>
                            <th>Status</th>
                            <th>Approval 2</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php foreach($ps as $p): ?>
                        <tr>
                            <td><?= $p->id ?></td>
                            <td><?= $p->date ?></td>
                            <td><?= $p->location ?></td>
                            <td><?= $p->month ?></td>
                            <td><?= $p->year ?></td>
                            <td><?= $p->total_items ?></td>
                            <td><?= $p->created_by ?></td>
                            <td class="<?php if($p->status == 'verified'){echo 'colored-csn';}else{echo 'colored-red';} ?>"><?php if($p->status == 'verified'){echo 'Verified';}else{echo 'Pending';} ?></td>
                            <td><?= $p->verified_by ?></td>
                            <td class="<?php if($p->status == 'approval_1'){echo 'colored-csn';}else{echo 'colored-red';} ?>"><?php if($p->status == 'approval_1'){echo 'Approved';}else{echo 'Pending';} ?></td>
                            <td><?= $p->approval1_by ?></td>
                            <td class="<?php if($p->status == 'approval_2'){echo 'colored-csn';}else{echo 'colored-red';} ?>"><?php if($p->status == 'approval_2'){echo 'Approved';}else{echo 'Pending';} ?></td>
                            <td><?= $p->approval2_by ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>