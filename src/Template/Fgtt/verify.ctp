<!--=========
      MiT form page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Finish Good Transfer ticket Create Form</b></div>
                <form action="#" class="planner-relative">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Date <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $fgtt->date ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Fgtt No <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">FGTT<?= $fgtt->id ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">So No <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $fgtt->so_no ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Qty <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $fgtt->quantity ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Create By <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase">Fauzi</p>
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
                                <p class="cn-main-text">Indkom 16</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Verify <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">Rusli</p>
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
                            <th>Tender No</th>
                            <th>So No</th>
                            <th>Serial No</th>
                            <th>Model</th>
                            <th>Version</th>
                            <th>Type 1</th>
                            <th>Type 2</th>
                            <th>Remark</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $count = 0; foreach($items as $item): $count++;?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td>TNB 380/2016</td>
                            <td><?= $fgtt->so_no ?></td>
                            <td><?= $item->id ?></td>
                            <td><?= $fgtt->model ?></td>
                            <td><?= $fgtt->version ?></td>
                            <td><?= $fgtt->type1 ?></td>
                            <td><?= $fgtt->type2 ?></td>
                            <th></th>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                <div class="prepareted-by-csn">
                    <form method="post" action="<?php echo $this->url->build(['controller' => 'Fgtt', 'action' => 'edit', $fgtt->id]); ?>">
                        <input type="hidden" name="verified_by" value="<?= $pic ?>">
                        <input type="hidden" name="status" value="verified">
                        <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal">Reject</button>
                        <button type="submit" class="button btn btn-info">Verify</button>
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
                <form method="post" action="<?php echo $this->url->build(['controller' => 'Fgtt', 'action' => 'edit', $fgtt->id]); ?>">
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