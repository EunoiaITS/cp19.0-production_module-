<!--=========
      Production Planner page
      ==============-->
<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Store Credit Note FORM</b></div>
            </div><!-- end mit title -->
            <form action="#">
                <div class="col-md-5 col-sm-6">
                    <div class="form-group left-from-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Date <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text"><?php $d = strtotime($scn->date);echo date ('m/d/Y',$d);?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">SCN No <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text">SCN <?= $scn->id?></p>
                        </div>
                    </div>

                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Create By <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text"><?= $scn->created_by?></p>
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
                            <p class="cn-text">Location <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text"><?= $scn->location?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Verify <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text"><?= $pic?></p>
                        </div>
                    </div>
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
                        <th>NO.</th>
                        <th>Part No</th>
                        <th>Part Name</th>
                        <th>Reason Code</th>
                        <th>Qty</th>
                        <th>Remark 1</th>
                        <th>Remark 2</th>
                    </tr>
                    </thead>
                    <tbody  class="csn-text-up">
                    <?php $i=0;foreach ($items as $itm):$i++?>
                        <tr>
                            <td><?= $i?></td>
                            <td><?= $itm->part_no?></td>
                            <td><?= $itm->part_desc?></td>
                            <td><?= $itm->reason?></td>
                            <td><?= $itm->quantity?></td>
                            <td><?= $itm->remark?></td>
                            <td></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="col-sm-offset-8 col-sm-4 col-xs-12">
            <div class="prepareted-by-csn">
                <form method="post" action="<?php echo $this->Url->build(['controller' => 'Scn', 'action' => 'edit', $scn->id]); ?>">
                    <input type="hidden" name="final_approved_by" value="<?= $pic ?>">
                    <input type="hidden" name="status" value="approved">
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal">Reject</button>
                    <button type="submit" class="button btn btn-info">Approve</button>
                </form>
            </div>
        </div>
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
            <form method="post" action="<?php echo $this->Url->build(['controller' => 'Scn', 'action' => 'edit', $scn->id]); ?>">
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
