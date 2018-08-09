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
                            <th>Drive Mechanism</th>
                            <th>status</th>
                            <th>Vacuum Chamber</th>
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
                            <td class="<?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Welding 1'){
                                    if($sec->status == 'acknowledged'){echo "colored-csn";}
                                    elseif($sec->status == 'requested'){echo "colored-red";}
                                    elseif($sec->status == 'rejected'){echo "colored-red";}
                                    else{echo "";}
                            }}?>"><?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Welding 1'){
                                    if($sec->status == 'acknowledged'){echo "Ack";}
                                    elseif($sec->status == 'requested'){echo "Pending";}
                                    elseif($sec->status == 'rejected'){echo "Reject";}
                                    else{echo "";}
                            }}?></td>
                            <td><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Main link Tank'){
                                        echo $sec->operator_name;
                                    }
                                } ?>
                            </td>
                            <td class="<?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Main link Tank'){
                                    if($sec->status == 'acknowledged'){echo "colored-csn";}
                                    elseif($sec->status == 'requested'){echo "colored-red";}
                                    elseif($sec->status == 'rejected'){echo "colored-red";}
                                    else{echo "";}
                                }}?>"><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Main link Tank'){
                                        if($sec->status == 'acknowledged'){echo "Ack";}
                                        elseif($sec->status == 'requested'){echo "Pending";}
                                        elseif($sec->status == 'rejected'){echo "Reject";}
                                        else{echo "";}
                                    }}?></td>
                            <td><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Drive Mechanism'){
                                        echo $sec->operator_name;
                                    }
                                } ?>
                            </td>
                            <td class="<?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Drive Mechanism'){
                                    if($sec->status == 'acknowledged'){echo "colored-csn";}
                                    elseif($sec->status == 'requested'){echo "colored-red";}
                                    elseif($sec->status == 'rejected'){echo "colored-red";}
                                    else{echo "";}
                                }}?>"><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Drive Mechanism'){
                                        if($sec->status == 'acknowledged'){echo "Ack";}
                                        elseif($sec->status == 'requested'){echo "Pending";}
                                        elseif($sec->status == 'rejected'){echo "Reject";}
                                        else{echo "";}
                                    }}?></td>
                            <td><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Vacuum Chamber'){
                                        echo $sec->operator_name;
                                    }
                                } ?>
                            </td>
                            <td class="<?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Vacuum Chamber'){
                                    if($sec->status == 'acknowledged'){echo "colored-csn";}
                                    elseif($sec->status == 'requested'){echo "colored-red";}
                                    elseif($sec->status == 'rejected'){echo "colored-red";}
                                    else{echo "";}
                                }}?>"><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Vacuum Chamber'){
                                        if($sec->status == 'acknowledged'){echo "Ack";}
                                        elseif($sec->status == 'requested'){echo "Pending";}
                                        elseif($sec->status == 'rejected'){echo "Reject";}
                                        else{echo "";}
                                    }}?></td>
                            <td><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Welding 2'){
                                        echo $sec->operator_name;
                                    }
                                } ?>
                            </td>
                            <td class="<?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Welding 2'){
                                    if($sec->status == 'acknowledged'){echo "colored-csn";}
                                    elseif($sec->status == 'requested'){echo "colored-red";}
                                    elseif($sec->status == 'rejected'){echo "colored-red";}
                                    else{echo "";}
                                }}?>"><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Welding 2'){
                                        if($sec->status == 'acknowledged'){echo "Ack";}
                                        elseif($sec->status == 'requested'){echo "Pending";}
                                        elseif($sec->status == 'rejected'){echo "Reject";}
                                        else{echo "";}
                                    }}?></td>
                            <td><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Bta'){
                                        echo $sec->operator_name;
                                    }
                                } ?>
                            </td>
                            <td class="<?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Bta'){
                                    if($sec->status == 'acknowledged'){echo "colored-csn";}
                                    elseif($sec->status == 'requested'){echo "colored-red";}
                                    elseif($sec->status == 'rejected'){echo "colored-red";}
                                    else{echo "";}
                                }}?>"><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Bta'){
                                        if($sec->status == 'acknowledged'){echo "Ack";}
                                        elseif($sec->status == 'requested'){echo "Pending";}
                                        elseif($sec->status == 'rejected'){echo "Reject";}
                                        else{echo "";}
                                    }}?></td>
                            <td><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Metal Clad'){
                                        echo $sec->operator_name;
                                    }
                                } ?>
                            </td>
                            <td class="<?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Metal Clad'){
                                    if($sec->status == 'acknowledged'){echo "colored-csn";}
                                    elseif($sec->status == 'requested'){echo "colored-red";}
                                    elseif($sec->status == 'rejected'){echo "colored-red";}
                                    else{echo "";}
                                }}?>"><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Metal Clad'){
                                        if($sec->status == 'acknowledged'){echo "Ack";}
                                        elseif($sec->status == 'requested'){echo "Pending";}
                                        elseif($sec->status == 'rejected'){echo "Reject";}
                                        else{echo "";}
                                    }}?></td>
                            <td><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Wiring'){
                                        echo $sec->operator_name;
                                    }
                                } ?>
                            </td>
                            <td class="<?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Wiring'){
                                    if($sec->status == 'acknowledged'){echo "colored-csn";}
                                    elseif($sec->status == 'requested'){echo "colored-red";}
                                    elseif($sec->status == 'rejected'){echo "colored-red";}
                                    else{echo "";}
                                }}?>"><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Wiring'){
                                        if($sec->status == 'acknowledged'){echo "Ack";}
                                        elseif($sec->status == 'requested'){echo "Pending";}
                                        elseif($sec->status == 'rejected'){echo "Reject";}
                                        else{echo "";}
                                    }}?></td>
                            <td><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Testing'){
                                        echo $sec->operator_name;
                                    }
                                } ?>
                            </td>
                            <td class="<?php foreach ($w->wip_sec as $sec){
                                if($sec->section == 'Testing'){
                                    if($sec->status == 'acknowledged'){echo "colored-csn";}
                                    elseif($sec->status == 'requested'){echo "colored-red";}
                                    elseif($sec->status == 'rejected'){echo "colored-red";}
                                    else{echo "";}
                                }}?>"><?php foreach ($w->wip_sec as $sec){
                                    if($sec->section == 'Testing'){
                                        if($sec->status == 'acknowledged'){echo "Ack";}
                                        elseif($sec->status == 'requested'){echo "Pending";}
                                        elseif($sec->status == 'rejected'){echo "Reject";}
                                        else{echo "";}
                                    }}?></td>
                            <td><?php foreach ($w->wip_sec as $sec){echo $sec->remark;}?></td>

                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-12">
                <!-- pagination bar -->
                <div class="pagination-bar pull-right">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                            echo $this->Paginator->prev(__('Previous'), array('tag' => 'li', 'class' => 'page-item'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                            echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'page-link active','tag' => 'li','first' => 1));
                            echo $this->Paginator->next(__('Next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                            ?>
                        </ul>
                    </nav>
                </div><!-- end pagination bar -->
            </div>
        </div>
    </div>
<script>
</script>