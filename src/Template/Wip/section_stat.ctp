<!--=========
Create serial number form page
==============-->
<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="part-title-planner text-uppercase text-center">Work In Progress Section Report <b><?php if(isset($s)){
                if ($s == "welding 1")
                {echo "Welding";}
                elseif ($s == "main link tank")
                {echo "Main link Tank";}
                elseif ($s == "drive mechanism")
                {echo "Drive Mechanism";}
                elseif ($s == "vacuum chamber")
                {echo "Vacuum Chamber";}
                elseif ($s == "welding 2")
                {echo "Welding 2";}
                elseif ($s == "bta")
                {echo "Bta";}
                elseif ($s == "metal clad")
                {echo "Metal Clad";}
                elseif ($s == "wiring")
                {echo "Wiring";}
                elseif ($s == "testing")
                {echo "Testing";}}?></b></div>
            <div class="clearfix"></div>
            <!--============== Add drawing table area ===================-->
            <div class="planner-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <td>Date</td>
                            <th>SO No</th>
                            <th>Serial No</th>
                            <th>WIP No</th>
                            <th>Model</th>
                            <th>Version</th>
                            <th>Type 1</th>
                            <th>Type 2</th>
                            <th>Document</th>
                            <th>Operator Name</th>
                            <th>Status</th>
                            <?php if($s != 'testing'){?>
                            <th>Next Section</th>
                            <th>Status</th>
                            <?php }?>
                            <th>Remark</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $i=0;foreach ($wip as $w):
                            foreach ($w->wip_sec as $se):$i++?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $w->date ?></td>
                                    <td><?= $w->so_no?></td>
                                    <td><?= $w->serial_no?></td>
                                    <td><?= "WIP".$w->id ?></td>
                                    <td><?php if(isset($w->sn_details->model)){echo $w->sn_details->model;}?></td>
                                    <td><?php if(isset($w->sn_details->version)){echo $w->sn_details->version;} ?></td>
                                    <td><?php if(isset($w->sn_details->type1)){echo $w->sn_details->type1;} ?></td>
                                    <td><?php if(isset($w->sn_details->type2)){echo $w->sn_details->type2;} ?></td>
                                    <td><a href="#">View</a></td>
                                    <td><?= $se->operator_name?></td>
                                    <?php if($se->status == 'acknowledged'){?>
                                        <td class="colored-csn">Ack</td>
                                    <?php }elseif($se->status == 'requested'){?>
                                        <td class="colored-red">Pending</td>
                                    <?php }else{?>
                                        <td class="colored-red">Reject</td>
                                    <?php }?>
                                    <?php if($s != 'testing'){?>
                                    <td><?php if(isset($w->nxt_sec->operator_name)){echo $w->nxt_sec->operator_name;}?></td>
                                    <td class="<?php if (isset($w->nxt_sec->status)){if($w->nxt_sec->status == "acknowledged"){echo "colored-csn";}elseif($w->nxt_sec->status == "requested"){echo "colored-red";}if($w->nxt_sec->status == "rejected"){echo "colored-red";}}?>"><?php if (isset($w->nxt_sec->status)){if($w->nxt_sec->status == "acknowledged"){echo "Ack";}elseif($w->nxt_sec->status == "requested"){echo "Pending";}if($w->nxt_sec->status == "rejected"){echo "Reject";}}?></td>
                                    <?php }?>
                                    <td><?= $se->remark?></td>
                                </tr>
                            <?php endforeach;endforeach;?>
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
