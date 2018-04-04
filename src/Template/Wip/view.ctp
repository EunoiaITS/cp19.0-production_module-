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
                                <p class="cn-main-text"><?php foreach ($wip as $w) {echo $w->date;}?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">SO NO <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="text-uppercase"><?php foreach ($wip as $w) {echo $w->so_no;}?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Serial No <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="text-uppercase"><?php foreach ($wip as $w) {echo $w->serial_no;}?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">WIP No <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase"><?php foreach ($wip as $w) {echo "WIP".$w->id;}?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text text-uppercase">Model <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase"><?php foreach ($wip as $w) {if(isset($w->sn_details->model)){echo $w->sn_details->model;}}?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Version<span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?php foreach ($wip as $w) {if(isset($w->sn_details->version)){echo $w->sn_details->version;}}?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Type 1 <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?php foreach ($wip as $w) {if(isset($w->sn_details->type1)){echo $w->sn_details->type1;}}?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Type 2 <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?php foreach ($wip as $w) {if(isset($w->sn_details->type2)){echo $w->sn_details->type2;}}?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Login ID <span class="planner-fright">:</span></p>
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
                            <th>No</th>
                            <th>Section</th>
                            <th>Operator Name</th>
                            <th>Supervisor Name</th>
                            <th>Status</th>
                            <th>Document</th>
                            <th>Remark</th>
                            <?php if($role == 'verifier'){?>
                                <th>Action</th>
                            <?php }?>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $i=0;foreach ($wip as $wi):
                            foreach ($wi->wip_sec as $sec):$i++?>
                            <td><?= $i?></td>
                            <td><?= $sec->section?></td>
                            <td><?= $sec->operator_name?></td>
                            <td><?= $sec->supervisor_name?></td>
                            <td>ack</td>
                            <td><a href="#">View</a></td>
                            <td></td>
                            <?php if($sec->status == 'requested' && $role == 'verifier'){?>
                            <td>
                                <form action="<?php echo $this->Url->build(['controller'=>'wip','action'=>'edit',$sec->id])?>" method="post">
                                    <button type="button" class="btn btn-info btn-reject" id="reject" rel="<?=$sec->id?>"  data-toggle="modal" data-target="#myModal">Reject</button>
                                    <button type="submit" class="button btn btn-info">Acknowledge</button>
                                    <input type="hidden" name="status" value="acknowledged">
                                    <input type="hidden" name="acknowledged_by" value="<?= $pic?>">
                                </form>
                            </td>
                            <?php }?>
                        </tr>
                        <?php endforeach;endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix"></div>
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
                <form id="reject-form" action="" method="post">
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
<script>
    $(document).ready(function () {
        var id = '';
        var act = '';
       $('#reject').on('click',function () {
           id = $(this).attr('rel');
           act = "<?php echo $this->Url->build(['controller'=>'wip','action'=>'edit'])?>/";
           var realLink = act+id;
           $('#reject-form').prop('action',realLink);
       });
    });
</script>