<!--=========
      Drawing Notification page
      ==============-->

<div class="drawing-from">
    <div class="container">
        <div class="row">
            <h4 class="part-title-planner text-uppercase text-center">Dashboard</h4>
            <!--============== Add drawing table area ===================-->
            <div class="drawing-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Section</th>
                            <th>Requests</th>
                            <th>PIC</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Serial Number</td>
                            <?php if($role == 'requester'): ?>
                                <td></td>
                            <?php else: ?>
                                <td><b><?php if($role == 'verifier'){ echo $sn_v;}elseif($role == 'approve-1'){echo $sn_a1;}else{echo 0;} ?></b></td>
                            <?php endif; ?>
                            <td><?= $user_pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td><?php if($role == 'verifier'){ echo 'Requested';}elseif($role == 'approve-1'){echo 'Verified';} ?></td>
                            <td><a href="<?php echo $this->Url->build(['controller'=>'SerialNumber', 'action'=>'index']);?>"><?php if($role == 'verifier' || $role == 'approve-1'): ?><span class="btn btn-primary"><?php if($role == 'verifier'){ echo 'Verify';}elseif($role == 'approve-1'){echo 'Approve';} ?></span><?php endif;?></a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Production Planner Monthly Scheduler</td>
                            <?php if($role == 'requester'): ?>
                                <td></td>
                            <?php else: ?>
                                <td><b><?php if($role == 'verifier'){echo $ps_v;}elseif($role == 'approve-1'){echo $ps_a1;}elseif ($role == 'approve-2'){echo $ps_a2;}else{echo 0;} ?></b></td>
                            <?php endif; ?>
                            <td><?= $user_pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td><?php if($role == 'verifier'){ echo 'Requested';}elseif($role == 'approve-1'){echo 'Verified';}elseif ($role == 'approve-2'){echo 'Approved';} ?></td>
                            <td><a href="<?php echo $this->Url->build(['controller'=>'Ps', 'action'=>'index']);?>"><?php if($role == 'verifier' || $role == 'approve-1' || $role == 'approve-2'): ?><span class="btn btn-primary"><?php if($role == 'verifier'){ echo 'Verify';}elseif($role == 'approve-1'){echo 'Approve';}elseif($role == 'approve-2'){echo 'Approve';} ?></span><?php endif;?></a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Material Issue Ticket</td>
                            <?php if($role == 'requester'): ?>
                                <td></td>
                            <?php else: ?>
                                <td><b><?php if($role == 'verifier'){echo $mit_v;}elseif($role == 'approve-1'){ echo $mit_a1;}else{echo 0;} ?></b></td>
                            <?php endif; ?>
                            <td><?= $user_pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td><?php if($role == 'verifier'){ echo 'Requested';}elseif($role == 'approve-1'){echo 'Verified';} ?></td>
                            <td><a href="<?php echo $this->Url->build(['controller'=>'Mit', 'action'=>'index']);?>"><?php if($role == 'verifier' || $role == 'approve-1'): ?><span class="btn btn-primary"><?php if($role == 'verifier'){ echo 'Verify';}elseif($role == 'approve-1'){echo 'Approve';} ?></span><?php endif;?></a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Material Request</td>
                            <?php if($role == 'requester'): ?>
                                <td></td>
                            <?php else: ?>
                                <td><b><?php if($role == 'verifier'){echo $mr_v;}elseif($role == 'approve-1'){ echo $mr_a1;}else{echo 0;} ?></b></td>
                            <?php endif; ?>
                            <td><?= $user_pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td><?php if($role == 'verifier'){ echo 'Requested';}elseif($role == 'approve-1'){echo 'Verified';} ?></td>
                            <td><a href="<?php echo $this->Url->build(['controller'=>'MaterialRequest', 'action'=>'index']);?>"><?php if($role == 'verifier' || $role == 'approve-1'): ?><span class="btn btn-primary"><?php if($role == 'verifier'){ echo 'Verify';}elseif($role == 'approve-1'){echo 'Approve';} ?></span><?php endif;?></a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Production Reject Request</td>
                            <td><b><?php if($role == 'verifier'){echo $prn_v;}elseif($role == 'approve-1'){echo $prn_a1;}elseif($role == 'approve-2'){echo $prn_a2;}elseif($role =='approve-3'){echo $prn_a3;}elseif($role =='approve-4'){echo $prn_a4;}?></b></td>
                            <td><?= $user_pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td><?php if($role == 'verifier'){echo 'Requested';}elseif($role == 'approve-1'){echo 'Verified';}elseif($role == 'approve-2'){echo 'Approved 1';}elseif($role == 'approve-3'){echo 'Approved 2';}elseif($role == 'approve-4'){echo 'Approved 3';}?></td>
                            <td><a href="<?php echo $this->Url->build(['controller'=>'Prnf', 'action'=>'index']);?>"><?php if($role != 'requester'): ?><span class="btn btn-primary"><?php if($role == 'verifier'){ echo 'Verify';}else{echo 'Approve';} ?></span><?php endif; ?></a></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Store Credit Note</td>
                            <?php if($role == 'requester'): ?>
                                <td></td>
                            <?php else: ?>
                                <td><b><?php if($role == 'verifier'){echo $scn_v;}elseif($role == 'approve-1'){ echo $scn_a1;}elseif ($role == 'approve-2'){echo $scn_a2;}else{echo 0;} ?></b></td>
                            <?php endif; ?>
                            <td><?= $user_pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td><?php if($role == 'verifier'){ echo 'Requested';}elseif($role == 'approve-1'){echo 'Verified';}elseif($role == 'approve-2'){echo 'Approved';} ?></td>
                            <td><a href="<?php echo $this->Url->build(['controller'=>'Scn', 'action'=>'index']);?>"><?php if($role == 'verifier' || $role == 'approve-1' || $role == 'approve-2'): ?><span class="btn btn-primary"><?php if($role == 'verifier'){ echo 'Verify';}elseif($role == 'approve-1' || $role == 'approve-2'){echo 'Approve';} ?></span><?php endif;?></a></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Finish Good Transfer Note</td>
                            <?php if($role == 'requester'): ?>
                                <td></td>
                            <?php else: ?>
                                <td><b><?php if($role == 'verifier'){echo $fgtt_v;}elseif($role == 'approve-1'){ echo $fgtt_a1;}else{echo 0;} ?></b></td>
                            <?php endif; ?>
                            <td><?= $user_pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td><?php if($role == 'verifier'){ echo 'Requested';}elseif($role == 'approve-1'){echo 'Verified';} ?></td>
                            <td><a href="<?php echo $this->Url->build(['controller'=>'Fgtt', 'action'=>'index']);?>"><?php if($role == 'verifier' || $role == 'approve-1'): ?><span class="btn btn-primary"><?php if($role == 'verifier'){ echo 'Verify';}elseif($role == 'approve-1'){echo 'Approve';} ?></span><?php endif;?></a></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Non-Billing Delivery Order</td>
                            <?php if($role == 'requester'): ?>
                                <td></td>
                            <?php else: ?>
                                <td><b><?php if($role == 'verifier'){echo $nbdo_v;}elseif($role == 'approve-1'){ echo $nbdo_a1;}else{echo 0;} ?></b></td>
                            <?php endif; ?>
                            <td><?= $user_pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td><?php if($role == 'verifier'){ echo 'Requested';}elseif($role == 'approve-1'){echo 'Verified';} ?></td>
                            <td><a href="<?php echo $this->Url->build(['controller'=>'Nbdo', 'action'=>'index']);?>"><?php if($role == 'verifier' || $role == 'approve-1'): ?><span class="btn btn-primary"><?php if($role == 'verifier'){ echo 'Verify';}elseif($role == 'approve-1'){echo 'Approve';} ?></span><?php endif;?></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- Drawing page area -->