<!--=========
Production Planner page
==============-->
<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Work In Progress List</b></div>
                <div class="clearfix"></div>

                <!--============== Add drawing table area ===================-->

                <div class="planner-table table-responsive clearfix">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>NO.</th>
                                <th>SO No</th>
                                <th>Serial No</th>
                                <th>WIP No</th>
                                <th>Model</th>
                                <th>Version</th>
                                <th>Type 1</th>
                                <th>Type 2</th>
                                <th>Status</th>
                                <th>Remark</th>
                            </tr>
                            </thead>
                            <tbody class="csn-text-up">
                            <?php $i =0;foreach($wip as $w):$i++;?>
                                <tr>
                                    <td><?= $i?></td>
                                    <td><?= $w->so_no?></td>
                                    <td><?= $w->serial_no?></td>
                                    <td><?php echo "WIP" . $w->id;?></td>
                                    <td><?= $w->sn_details->model?></td>
                                    <td><?= $w->sn_details->version?></td>
                                    <td><?= $w->sn_details->type1?></td>
                                    <td><?= $w->sn_details->type2?></td>
                                    <td><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'view',$w->id])?>"><?= $w->status?></a></td>
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
</div>
