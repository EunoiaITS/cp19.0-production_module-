<!--=========
prn page
==============-->

<div class="planner-from">
    <form action="<?php echo $this->Url->build(['controller'=>'prnf','action'=>'approval3',$prnf->id]);?>" method="post" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Production Reject Note Form</b></div>
            </div><!-- end mit title -->
                <div class="col-md-5 col-sm-6">
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Date <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text text-uppercase"><?php $d = strtotime($prnf->date);echo date('m/d/Y',$d);?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Prn No <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text text-uppercase">PRN <?= $prnf->id?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Part No <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text text-uppercase"><?= $prnf->part_no?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Part Name <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text text-uppercase">Spring shaft Assy</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Qty <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text text-uppercase"><?= $prnf->quantity?></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Create By <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text"><?= $prnf->created_by?></p>
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
                            <p class="cn-main-text text-uppercase"><?= $prnf->location?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Verify <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text text-uppercase"><?= $prnf->verified_by?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Approve 1 <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text text-uppercase"><?= $prnf->approved1_by?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Approve 2<span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text text-uppercase"><?= $prnf->approved2_by?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Approve 3<span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text text-uppercase"><?= $pic?></p>
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
                        <th>Description</th>
                        <th>Reason</th>
                        <th>Document</th>
                        <th>Remark</th>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <tr>
                        <td><?= $prnf->description?></td>
                        <td><?= $prnf->reason?></td>
                        <td><a href="<?= $prnf->document?>">View</a></td>
                        <td><?= $prnf->remark?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12" style="margin-top: 30px">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Investigation/Finding</th>
                        <th>Reason</th>
                        <th>Document</th>
                        <th>Remark</th>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <tr>
                        <td><?= $prnf->approved2_investigation?></td>
                        <td><?= $prnf->approved2_reason?></td>
                        <td><a href="<?= $prnf->approved2_document?>">View</a></td>
                        <td><?= $prnf->approved2_remark?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12" style="margin-top: 30px">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Correction/Action</th>
                        <th>Reason</th>
                        <th>Document</th>
                        <th>Remark</th>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <tr>
                        <td><input name="approved3_correction" type="text" class="form-control"></td>
                        <td><input name="approved3_reason" type="text" class="form-control"></td>
                        <td><label class="btn btn-info">
                                Upload <input type="file" name="approved3_doc" hidden style="display: none !important;">
                            </label></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="col-sm-offset-8 col-sm-4 col-xs-12">
            <div class="prepareted-by-csn">
                    <input type="hidden" name="approved3_by" value="<?= $pic?>">
                    <input type="hidden" name="status" value="approved2">
                    <button class="btn btn-info"  data-toggle="modal" data-target="#myModal">Reject</button>
                    <button type="submit" class="button btn btn-info">Approve</button>
            </div>
        </div>
    </div>
</form>
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
            <div class="modal-body">
                <form action="#">
                    <textarea name="" id="" class="popup-textarea" cols="20" rows="8"></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Okay</button>
            </div>
        </div>
    </div>
</div>
