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
                                    <td><?php if(isset($w->sn_details->model)){echo $w->sn_details->model;}?></td>
                                    <td><?php if(isset($w->sn_details->version)){echo $w->sn_details->version;} ?></td>
                                    <td><?php if(isset($w->sn_details->type1)){echo $w->sn_details->type1;}?></td>
                                    <td><?php if(isset($w->sn_details->type2)){echo $w->sn_details->type2;}?></td>
                                    <td><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'view',$w->id])?>"><?= $w->status?></a></td>
                                    <td></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
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
</div>
