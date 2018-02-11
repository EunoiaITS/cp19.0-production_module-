<!--=========
      Production Planner page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Material Request Form</b></div>
            </div><!-- end mit title -->
            <form action="#">
                <div class="col-md-5 col-sm-6">
                    <div class="form-group left-from-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Date <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text"><?= $mr->date ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Mr No <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text">MR<?= $mr->id ?></p>
                        </div>
                    </div>

                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Create By <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text"><?= $mr->created_by ?></p>
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
                            <p class="cn-main-text"><?= $mr->location ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Verify <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text"><?= $mr->verified_by ?></p>
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
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Remark</th>
                    </tr>
                    </thead>
                    <tbody  class="csn-text-up">
                    <?php foreach($items as $item): ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><?= $item->part_no ?></td>
                        <td><?= $item->part_desc ?></td>
                        <td><?= $item->quantity ?></td>
                        <td></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="col-sm-offset-8 col-sm-4 col-xs-12">
            <div class="prepareted-by-csn">
                <form method="post" action="<?php echo $this->url->build(['controller' => 'MaterialRequest', 'action' => 'edit', $mr->id]); ?>">
                    <input type="hidden" name="verified_by" value="manager">
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
            <form method="post" action="<?php echo $this->url->build(['controller' => 'MaterialRequest', 'action' => 'edit', $mr->id]); ?>">
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