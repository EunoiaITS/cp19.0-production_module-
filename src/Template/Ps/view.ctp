<!--=========
      Create serial number form page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Production Monthly Schedule Form</b></div>
                <form action="#" class="planner-relative">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Date <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $ps->date ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Month <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= date('F', mktime(0, 0, 0, $ps->month, 10)) ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Year <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $ps->year ?></p>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Pms No <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase">Pm<?= $ps->id ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Location <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $ps->location ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Create By <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $ps->created_by ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Department <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">Production</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Section <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">Planner</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Verify <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?php if(isset($ps->verified_by)){echo $ps->verified_by;}else{echo $pic;}  ?></p>
                            </div>
                        </div>
                        <?php if(isset($ps->verified_by)){?>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Approval 1 <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?php if(isset($ps->approval1_by)){echo $ps->approval1_by;}else{echo $pic;}  ?></p>
                            </div>
                        </div>
                        <?php }?>
                        <?php if(isset($ps->approval1_by)){?>
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-6">
                                    <p class="cn-text">Approval 2 <span class="planner-fright">:</span></p>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <p class="cn-main-text"><?php if(isset($ps->approval2_by)){echo $ps->approval2_by;}else{echo $pic;}  ?></p>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </form>
            </div>

            <div class="clearfix"></div>
            <!--============== Add drawing table area ===================-->
            <div class="planner-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Tender No</th>
                            <th rowspan="2">So No</th>
                            <th rowspan="2">Customer Code</th>
                            <th rowspan="2">Customer Name</th>
                            <th rowspan="2">Date Completion</th>
                            <th rowspan="2">Delivery Date</th>
                            <th rowspan="2">Model</th>
                            <th rowspan="2">Version</th>
                            <th rowspan="2">Type 1</th>
                            <th rowspan="2">Type 2</th>
                            <th rowspan="2">Qty</th>
                            <th colspan="4">Period</th>
                        </tr>
                        <tr class="table-cells">
                            <td>w1</td>
                            <td>w2</td>
                            <td>w3</td>
                            <td>w4</td>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $count = 0; ?>
                        <?php foreach($sales as $s): ?>
                            <?php if(date('m-Y', strtotime($s->date)) == $ps->month.'-'.$ps->year ): ?>
                                <?php foreach($s->soi as $item): ?>
                                    <?php $count++; ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?= $s->tenderNo ?></td>
                                        <td><?= $s->salesorder_no ?></td>
                                        <td><?php foreach($s->cus as $cus){echo $cus->customerID;} ?></td>
                                        <td><?php foreach($s->cus as $cus){echo $cus->name;} ?></td>
                                        <td><?= $s->delivery_date ?></td>
                                        <td><?= (isset($s->fgtt->date) ? $s->fgtt->date : '') ?></td>
                                        <td><?= $item->model ?></td>
                                        <td><?= $item->version ?></td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td><?= $item->quantity ?></td>
                                        <td><?= $item->quantity/4 ?></td>
                                        <td><?= $item->quantity/4 ?></td>
                                        <td><?= $item->quantity/4 ?></td>
                                        <td><?= $item->quantity/4 ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php if($role != 'requester'): ?>
            <div class="clearfix"></div>
            <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                <div class="prepareted-by-csn">
                    <form method="post" action="<?php echo $this->url->build(['controller' => 'Ps', 'action' => 'edit', $ps->id]); ?>">
                        <input type="hidden" name="status" value="<?php if($role == 'verifier'){echo 'verified';}elseif($role == 'approve-1'){echo 'approval-1';}elseif($role == 'approve-2'){echo 'approval-2';}else{echo '';}?>">
                        <input type="hidden" name="<?php if($role == 'verifier'){echo 'verified_by';}elseif($role == 'approve-1'){echo 'approval1_by';}elseif($role == 'approve-2'){echo 'approval2_by';}else{echo 'created_by';}?>" value="<?= $pic ?>">
                        <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal">Reject</button>
                        <button type="submit" class="button btn btn-info"><?php if($role == 'verifier'){echo 'Verify';}elseif($role == 'approve-1'){echo 'Approve';}elseif($role == 'approve-2'){echo 'Approve';}else{echo 'Edit';} ?></button>
                    </form>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!--========================
    Remark popup module
    ======================-->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Please Key In Remarks Here </h4>
                </div>
                <form method="post" action="<?php echo $this->url->build(['controller' => 'Ps', 'action' => 'edit', $ps->id]); ?>">
                <div class="modal-body">
                    <textarea name="remark" id="" class="popup-textarea" cols="20" rows="8"></textarea>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="status" value="rejected">
                    <button type="submit" class="btn btn-primary">Okay</button>
                </div>
                </form>
            </div>
        </div>
    </div>