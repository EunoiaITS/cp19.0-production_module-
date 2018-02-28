<!--=========
Production Planner page
==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Material Issue Ticket Approval Status</b></div>
                <div class="clearfix"></div>

                <!--============== Add drawing table area ===================-->

                <div class="planner-table table-responsive clearfix">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>NO.</th>
                                <th>SO No</th>
                                <th>Customer Name</th>
                                <th>MIT Date</th>
                                <th>MIT No</th>
                                <th>Model</th>
                                <th>Version</th>
                                <th>Type 1</th>
                                <th>Type 2</th>
                                <th>Qty</th>
                                <th>Create By</th>
                                <th>Department</th>
                                <th>Section</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Verify By</th>
                                <th>Status</th>
                                <th>Approve By</th>
                                <th>Document</th>
                                <th>Remark</th>
                            </tr>
                            </thead>
                            <tbody class="csn-text-up">
                            <?php $i=0;foreach ($mit as $m):$i++?>
                            <tr>
                                <td><?= $i?></td>
                                <td><?= $m->sales->salesorder_no?></td>
                                <td><?= $m->cus->name?></td>
                                <td><?= $m->date?></td>
                                <td>MIT <?= $m->id?></td>
                                <td><?= $m->items->model?></td>
                                <td><?= $m->items->version?></td>
                                <td>INDOOR</td>
                                <td>Motorized</td>
                                <td><?= $m->items->quantity;?></td>
                                <td><?= $m->created_by?></td>
                                <td>Production</td>
                                <td>Welding</td>
                                <td><?= $m->location?></td>
                                <td class="<?php if($m->status == 'verified' || $m->status == 'approved' || $m->status == 'acknowledged' || $m->status == 'acknowledged-verify')
                                {echo 'colored-csn';}
                                elseif($m->status == 'requested' || $m->status == 'rejected')
                                {echo 'colored-red';}
                                else{echo '';} ?>">
                                    <?php if($m->status == 'verified' || $m->status == 'approved' || $m->status == 'acknowledged' || $m->status == 'acknowledged-verify')
                                    {echo 'Verified';}
                                    elseif($m->status == 'requested')
                                    {echo 'Pending';}
                                    elseif($m->status == 'rejected')
                                    {echo 'Rejected';}else{echo '';} ?>
                                </td>
                                <td><?= $m->verified_by?></td>
                                <td class="<?php if($m->status == 'approved')
                                {echo 'colored-csn';}
                                elseif($m->status == 'requested' || $m->status == 'verified' || $m->status == 'rejected')
                                {echo 'colored-red';}
                                else{echo '';} ?>">
                                    <?php if($m->status == 'approved')
                                    {echo 'Approved';}
                                    elseif($m->status == 'requested' || $m->status == 'verified')
                                    {echo 'Pending';}elseif($m->status == 'rejected'){echo 'Rejected';}else{echo '';} ?></td>
                                <td><?= $m->approved_by?></td>
                                <td><a href="#">View</a></td>
                                <td></td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
