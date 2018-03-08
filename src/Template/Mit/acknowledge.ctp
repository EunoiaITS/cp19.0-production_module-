<!--=========
MiT form page
==============-->

<div class="planner-from">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-sm-12">
                    <div class="part-title-planner text-uppercase text-center"><b>Material Issue Ticket Form</b></div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Date <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?php $d = strtotime($sales->so->date);echo date('m/d/Y',$d)?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">SO NO <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $sales->so->salesorder_no?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Customer Name <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase"><?= $sales->cus->name?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Model <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase"><?= $sales->model?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Version <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase"><?= $sales->version?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Type 1 <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">Indoor</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Type 2 <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">Motorized</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Quantity <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $sales->quantity?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text text-uppercase">MIT NO <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase">MIT <?php foreach($mit as $m){echo $m->id;}?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Create By <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?php foreach($mit as $m){echo $m->created_by;}?></p>
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
                                <p class="cn-main-text">Welding</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label class="cn-text" for="mit-form">Location <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">MIT <?php foreach($mit as $m){echo $m->location;}?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Verify <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?php foreach($mit as $m){echo $m->verified_by;}?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Approve <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?php foreach($mit as $m){echo $m->approved_by;}?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <!--============== Add drawing table area ===================-->
                <div class="planner-table table-responsive clearfix">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Part No</th>
                                <th>Description</th>
                                <th>Used QTY</th>
                                <th>Request QTY</th>
                                <th>Section Stock Availability</th>
                                <th>Net QTY</th>
                                <th>Delivery Date</th>
                                <th>Delivery QTY</th>
                                <th>O/S</th>
                                <th>Status</th>
                                <th>Remark</th>
                            </tr>
                            </thead>
                            <tbody class="csn-text-up">
                            <?php $i=0;foreach($eng as $en):?>
                                <?php $i++;?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?= $en->partNo?></td>
                                    <td><?= $en->partName?></td>
                                    <td><?= $en->quality?></td>
                                    <td><?= ($sales->quantity * $en->quality)?></td>
                                    <td><?php if(isset($en->inv->current_quantity)){
                            echo $en->inv->current_quantity; } ?></td>
                            <td><?php if(isset($en->inv->current_quantity)){
                            echo (($sales->quantity * $en->quality)-$en->inv->current_quantity);}?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <form action="<?php echo $this->Url->build(['controller'=>'mit','action'=>'acknowledge',$sales->id])?>" method="post" class="planner-relative">
                    <input type="hidden" name="status" value="acknowledged">
                    <input type="hidden" name="acknowledged_by" value="<?= $pic?>">
                    <input type="hidden" name="so_item_id" value="<?= $sales->id ?>">
                <div class="clearfix"></div>
                <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                    <div class="prepareted-by-csn">
                        <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal">Reject</button>
                        <button type="submit" class="button btn btn-info">Acknowledge</button>
                    </div>
                </div>
                </form>
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
                <form method="post" action="<?php echo $this->url->build(['controller' => 'Mit', 'action' => 'edit', $sales->id]); ?>">
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


