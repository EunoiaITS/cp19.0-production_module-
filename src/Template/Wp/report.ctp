<!--=========
Create serial number form page
==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="part-title-planner text-uppercase text-center"><b>Work In Progress Report</b></div>
            <div class="clearfix"></div>
            <!--============== Add drawing table area ===================-->
            <div class="planner-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>SO No</th>
                            <th>Serial No</th>
                            <th>WIP No</th>
                            <th>Model</th>
                            <th>Version</th>
                            <th>Type 1</th>
                            <th>Type 2</th>
                            <th>Document</th>
                            <th>Welding</th>
                            <th>Status</th>
                            <th>MLT</th>
                            <th>Status</th>
                            <th>Drive Mechism</th>
                            <th>status</th>
                            <th>Vaccum Camber</th>
                            <th>Status</th>
                            <th>Welding</th>
                            <th>Status</th>
                            <th>BTA</th>
                            <th>Status</th>
                            <th>Metal Clad</th>
                            <th>Status</th>
                            <th>Testing</th>
                            <th>Status</th>
                            <th>Remark</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $i=0; foreach ($wp as $w):$i++?>
                        <tr>
                            <td><?= $i?></td>
                            <td><?= $w->so_no?></td>
                            <td><?= $w->serial_no?></td>
                            <td><?= $w->wp_no?></td>
                            <td><?= $w->model?></td>
                            <td><?= $w->version?></td>
                            <td>Indoor</td>
                            <td>Motorized</td>
                            <td><a href="#">View</a></td>
                            <td><?= $w->wld1_on?></td>
                            <?php if($w->status == 'acknowledged'){?>
                            <td  class="colored-csn">Ack</td><?php }else{?>
                                <td  class="colored-red">Pending</td>
                            <?php }?>
                            <td><?= $w->mlt_on?></td>
                            <?php if($w->status == 'acknowledged'){?>
                                <td  class="colored-csn">Ack</td><?php }else{?>
                                <td  class="colored-red">Pending</td>
                            <?php }?>
                            <td><?= $w->dm_on?></td>
                            <?php if($w->status == 'acknowledged'){?>
                                <td  class="colored-csn">Ack</td><?php }else{?>
                                <td  class="colored-red">Pending</td>
                            <?php }?>
                            <td><?= $w->vc_on?></td>
                            <?php if($w->status == 'acknowledged'){?>
                                <td  class="colored-csn">Ack</td><?php }else{?>
                                <td  class="colored-red">Pending</td>
                            <?php }?>
                            <td><?= $w->wld2_on?></td>
                            <?php if($w->status == 'acknowledged'){?>
                                <td  class="colored-csn">Ack</td><?php }else{?>
                                <td  class="colored-red">Pending</td>
                            <?php }?>
                            <td><?= $w->bta_on?></td>
                            <?php if($w->status == 'acknowledged'){?>
                                <td  class="colored-csn">Ack</td><?php }else{?>
                                <td  class="colored-red">Pending</td>
                            <?php }?>
                            <td><?= $w->mc_on?></td>
                            <?php if($w->status == 'acknowledged'){?>
                                <td  class="colored-csn">Ack</td><?php }else{?>
                                <td  class="colored-red">Pending</td>
                            <?php }?>
                            <td><?= $w->test_on?></td>
                            <?php if($w->status == 'acknowledged'){?>
                                <td  class="colored-csn">Ack</td><?php }else{?>
                                <td  class="colored-red">Pending</td>
                            <?php }?>
                            <td></td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
