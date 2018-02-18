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
                            <?php $i =0;foreach($wp as $w):?>
                            <?php $i++;?>
                            <tr>
                                <td><?= $i?></td>
                                <td><?= $w->so_no?></td>
                                <td><?= $w->serial_no?></td>
                                <td><?= $w->wp_no?></td>
                                <td><?= $w->model?></td>
                                <td><?= $w->version?></td>
                                <td>Indoor</td>
                                <td>Motorized</td>
                                <td><a href="<?php echo $this->Url->build(['controller'=>'wp','action'=>'acknowledge',$w->id])?>"><?= $w->status?></a></td>
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
