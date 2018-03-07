<!--=========
Create serial number form page
==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="part-title-planner text-uppercase text-center"><b>Work In Progress Section Report METAL CLAD</b></div>
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
                            <th>Next Section</th>
                            <th>Status</th>
                            <th>Remark</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $i=0;foreach ($wip as $w):
                            foreach ($w->wip_sec as $s):$i++?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $w->date ?></td>
                                    <td><?= $w->so_no?></td>
                                    <td><?= $w->serial_no?></td>
                                    <td><?= "WIP".$w->id ?></td>
                                    <td><?= $w->sn_details->model?></td>
                                    <td><?= $w->sn_details->version?></td>
                                    <td><?= $w->sn_details->type1?></td>
                                    <td><?= $w->sn_details->type2?></td>
                                    <td><a href="#">View</a></td>
                                    <td><?= $s->operator_name?></td>
                                    <?php if($s->status == 'acknowledged'){?>
                                        <td class="colored-csn">Ack</td>
                                    <?php }elseif($s->status == 'requested'){?>
                                        <td class="colored-red">Pending</td>
                                    <?php }else{?>
                                        <td class="colored-red">Reject</td>
                                    <?php }?>
                                    <td>Yazid</td>
                                    <td class="colored-csn">Ack</td>
                                    <td><?= $s->remark?></td>
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
