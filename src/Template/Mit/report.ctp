<!--=========
<!--=========
Production Planner page
==============-->
<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Material Issue Ticket Report</b></div>
                <div class="clearfix"></div>

                <!--============== Add drawing table area ===================-->

                <div class="planner-table table-responsive clearfix">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th rowspan="2">NO.</th>
                                <th rowspan="2">So No</th>
                                <th rowspan="2">Customer Name</th>
                                <th rowspan="2">MIT Date</th>
                                <th rowspan="2">MIT No</th>
                                <th rowspan="2">Model</th>
                                <th rowspan="2">Version</th>
                                <th rowspan="2">Type 1</th>
                                <th rowspan="2">Type 2</th>
                                <th rowspan="2">Qty</th>
                                <th rowspan="2">Create By</th>
                                <th rowspan="2">Department</th>
                                <th rowspan="2">Section</th>
                                <th rowspan="2">Location</th>
                                <th colspan="4">Store</th>
                                <th rowspan="2">Ack Status</th>
                                <th rowspan="2">Ack By</th>
                                <th rowspan="2">Document</th>
                                <th rowspan="2">Remark</th>
                            </tr>
                            <tr class="table-cell">
                                <th>Ack Status</th>
                                <th>Recive By</th>
                                <th>Delivery Date</th>
                                <th>Delivery Status</th>
                            </tr>
                            </thead>
                            <tbody class="csn-text-up">
                            <?php $i=0;foreach ($mit as $m):?>
                                <?php $i++;?>
                                <tr>
                                <td><?php echo $i;?></td>
                                <td><?= $m->sales->salesorder_no?></td>
                                <td><?= $m->cus->name?></td>
                                <td><?= $m->date?></td>
                                <td>MIT <?= $m->id?></td>
                                <td><?= $m->items->model?></td>
                                <td><?= $m->items->version?></td>
                                <td>INDOOR</td>
                                <td>Motorized</td>
                                <td><?= $m->items->quantity;?></td>
                                <td><?= $m->created_by?></td>
                                <td>Production</td>
                                <td>Welding</td>
                                <td><?= $m->location?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="<?php if(isset($m->status)){if($m->status == 'acknowledged'){echo "colored-csn";}else{echo "colored-red";}}?>"><?php if(isset($m->status)){if($m->status == 'acknowledged'){echo "Ack";}else{echo "Pending";}}?></td>
                                <td><?php if(isset($m->acknowledged_by)){echo $m->acknowledged_by;}?></td>
                                <td></td>
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
