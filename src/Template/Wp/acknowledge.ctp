<!--=========
MiT form page
==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>WORK IN PROGRESS FORM ACKNOWLEDGE</b></div>
                <form action="#" class="planner-relative">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Date <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">01/01/2018</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">SO NO <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="text-uppercase"><?= $wp->so_no?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Serial No <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="text-uppercase"><?= $wp->serial_no?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">WIP No <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase"><?= $wp->wp_no?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text text-uppercase">Model <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase"><?= $wp->model?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Version<span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $wp->version?></p>
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
                                <p class="cn-text">Login ID <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">YAZID</p>
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
                            <th>No</th>
                            <th>Section</th>
                            <th>Operator Name</th>
                            <th>Supervisor Name</th>
                            <th>Status</th>
                            <th>Document</th>
                            <th>Remark</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <tr>
                            <td>1</td>
                            <td>WELDING</td>
                            <td><?= $wp->wld1_on?></td>
                            <td><?= $wp->wld1_sn?></td>
                            <td><?= $wp->status?></td>
                            <td><a href="#">View</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>MAIN LINK TANK</td>
                            <td><?= $wp->mlt_on?></td>
                            <td><?= $wp->mlt_sn?></td>
                            <td><?= $wp->status?></td>
                            <td><a href="#">View</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>DRIVE MECHANISM</td>
                            <td><?= $wp->dm_on?></td>
                            <td><?= $wp->dm_sn?></td>
                            <td><?= $wp->status?></td>
                            <td><a href="#">View</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>VACUUM CHAMBER</td>
                            <td><?= $wp->vc_on?></td>
                            <td><?= $wp->vc_sn?></td>
                            <td><?= $wp->status?></td>
                            <td><a href="#">View</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>WELDING</td>
                            <td><?= $wp->wld2_on?></td>
                            <td><?= $wp->wld2_sn?></td>
                            <td><?= $wp->status?></td>
                            <td><a href="#">View</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>BTA</td>
                            <td><?= $wp->bta_on?></td>
                            <td><?= $wp->bta_sn?></td>
                            <td><?= $wp->status?></td>
                            <td><a href="#">View</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>METAL CLAD</td>
                            <td><?= $wp->mc_on?></td>
                            <td><?= $wp->mc_sn?></td>
                            <td><?= $wp->status?></td>
                            <td><a href="#">View</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>WIRING</td>
                            <td><?= $wp->wir_on?></td>
                            <td><?= $wp->wir_sn?></td>
                            <td><?= $wp->status?></td>
                            <td><a href="#">View</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>TESTING</td>
                            <td><?= $wp->test_on?></td>
                            <td><?= $wp->test_sn?></td>
                            <td><?= $wp->status?></td>
                            <td><a href="#">View</a></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                <div class="prepareted-by-csn">
                    <form action="<?php echo $this->Url->build(['controller'=>'wp','action'=>'edit',$wp->id])?>" method="post">
                        <input type="hidden" name="status" value="acknowledged">
                        <input type="hidden" name="acknowledged_by" value="requester">
                        <button class="btn btn-info"  data-toggle="modal" data-target="#myModal">Reject</button>
                        <button type="submit" class="button btn btn-info">Acknowladge</button>
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
