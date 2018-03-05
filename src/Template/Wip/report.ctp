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
                            <th>Wiring</th>
                            <th>Status</th>
                            <th>Testing</th>
                            <th>Status</th>
                            <th>Remark</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $i=0; foreach ($wip as $w):$i++?>
                        <tr>
                            <td><?= $i?></td>
                            <td><?= $w->so_no?></td>
                            <td><?= $w->serial_no?></td>
                            <td><?= $w->id?></td>
                            <td><?php if(isset($w->sn_details->model)){echo $w->sn_details->model;}?></td>
                            <td><?php if(isset($w->sn_details->version)){
                            echo $w->sn_details->version;}?></td>
                            <td><?php if(isset($w->sn_details->type1)){
                            echo $w->sn_details->type1;}?></td>
                            <td><?php if(isset($w->sn_details->type2)){
                            echo $w->sn_details->type2;} ?></td>
                            <td><a href="#">View</a></td>
                            <td><?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Welding 1'){
                                    echo $sec->operator_name;
                                }
                                } ?>
                            </td>
                            <?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Welding 1'){
                                        if($sec->status == 'acknowledged'){
                                            echo '<td class="colored-csn">Ack</td>';
                                        }elseif($sec->status == 'requested'){
                                            echo '<td class="colored-red">Pending</td>';
                                        }elseif($sec->status == 'rejected'){
                                            echo '<td class="colored-red">Reject</td>';
                                        }else{
                                            echo '<td></td>';
                                        }
                                    }
                                } ?>
                            <td><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Main link Tank'){
                                        echo $sec->operator_name;
                                    }
                                } ?>
                            </td>
                            <?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Main link Tank'){
                                    if($sec->status == 'acknowledged'){
                                        echo '<td class="colored-csn">Ack</td>';
                                    }elseif($sec->status == 'requested'){
                                        echo '<td class="colored-red">Pending</td>';
                                    }elseif($sec->status == 'rejected'){
                                        echo '<td class="colored-red">Reject</td>';
                                    }else{
                                        echo '<td></td>';
                                    }
                                }
                            } ?>
                            <td><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Drive Mechanism'){
                                        echo $sec->operator_name;
                                    }
                                } ?>
                            </td>
                            <?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Drive Mechanism'){
                                    if($sec->status == 'acknowledged'){
                                        echo '<td class="colored-csn">Ack</td>';
                                    }elseif($sec->status == 'requested'){
                                        echo '<td class="colored-red">Pending</td>';
                                    }elseif($sec->status == 'rejected'){
                                        echo '<td class="colored-red">Reject</td>';
                                    }else{
                                        echo '<td></td>';
                                    }
                                }
                            } ?>
                            <td><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Vacuum Chamber'){
                                        echo $sec->operator_name;
                                    }
                                } ?>
                            </td>
                            <?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Vacuum Chamber'){
                                    if($sec->status == 'acknowledged'){
                                        echo '<td class="colored-csn">Ack</td>';
                                    }elseif($sec->status == 'requested'){
                                        echo '<td class="colored-red">Pending</td>';
                                    }elseif($sec->status == 'rejected'){
                                        echo '<td class="colored-red">Reject</td>';
                                    }else{
                                        echo '<td></td>';
                                    }
                                }
                            } ?>
                            <td><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Welding 2'){
                                        echo $sec->operator_name;
                                    }
                                } ?>
                            </td>
                            <?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Welding 2'){
                                    if($sec->status == 'acknowledged'){
                                        echo '<td class="colored-csn">Ack</td>';
                                    }elseif($sec->status == 'requested'){
                                        echo '<td class="colored-red">Pending</td>';
                                    }elseif($sec->status == 'rejected'){
                                        echo '<td class="colored-red">Reject</td>';
                                    }else{
                                        echo '<td></td>';
                                    }
                                }
                            } ?>
                            <td><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Bta'){
                                        echo $sec->operator_name;
                                    }
                                } ?>
                            </td>
                            <?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Bta'){
                                    if($sec->status == 'acknowledged'){
                                        echo '<td class="colored-csn">Ack</td>';
                                    }elseif($sec->status == 'requested'){
                                        echo '<td class="colored-red">Pending</td>';
                                    }elseif($sec->status == 'rejected'){
                                        echo '<td class="colored-red">Reject</td>';
                                    }else{
                                        echo '<td></td>';
                                    }
                                }
                            } ?>
                            <td><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Metal Clad'){
                                        echo $sec->operator_name;
                                    }
                                } ?>
                            </td>
                            <?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Metal Clad'){
                                    if($sec->status == 'acknowledged'){
                                        echo '<td class="colored-csn">Ack</td>';
                                    }elseif($sec->status == 'requested'){
                                        echo '<td class="colored-red">Pending</td>';
                                    }elseif($sec->status == 'rejected'){
                                        echo '<td class="colored-red">Reject</td>';
                                    }else{
                                        echo '<td></td>';
                                    }
                                }
                            } ?>
                            <td><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Wiring'){
                                        echo $sec->operator_name;
                                    }
                                } ?>
                            </td>
                            <?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Wiring'){
                                    if($sec->status == 'acknowledged'){
                                        echo '<td class="colored-csn">Ack</td>';
                                    }elseif($sec->status == 'requested'){
                                        echo '<td class="colored-red">Pending</td>';
                                    }elseif($sec->status == 'rejected'){
                                        echo '<td class="colored-red">Reject</td>';
                                    }else{
                                        echo '<td></td>';
                                    }
                                }
                            } ?>
                            <td><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Testing'){
                                        echo $sec->operator_name;
                                    }
                                } ?>
                            </td>
                            <td id="testing-id">
                            <?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Testing'){
                                    if($sec->status == 'acknowledged'){
                                        echo '<td class="colored-csn">Ack</td>';
                                    }elseif($sec->status == 'requested'){
                                        echo '<td class="colored-red">Pending</td>';
                                    }elseif($sec->status == 'rejected'){
                                        echo '<td class="colored-red">Reject</td>';
                                    }else{
                                        echo '<td></td>';
                                    }
                                }
                            } ?>
                            </td>

                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function () {
        $('.class').
    });
</script>