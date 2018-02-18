<!--=========
Production Planner page
==============-->
<?php
//echo "<pre>";
//print_r($sales);
//echo "</pre>"?>
<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Material Issue Ticket Request List</b></div>
                <div class="clearfix"></div>

                <!--============== Add drawing table area ===================-->

                <div class="planner-table table-responsive clearfix">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>NO.</th>
                                <th>Po No</th>
                                <th>So No</th>
                                <th>Customer Code</th>
                                <th>Customer Name</th>
                                <th>Date Completion</th>
                                <th>Delivery Date</th>
                                <th>Model</th>
                                <th>Version</th>
                                <th>Type 1</th>
                                <th>Type 2</th>
                                <th>Qty</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="csn-text-up">
                            <?php $i=0;foreach ($sales as $s){?>
                                <?php foreach ($s->soi as $item){?>
                                <?php $i ++;?>
                                <tr>
                                <td><?php echo $i;?></td>
                                <td><?= $s->poNo;?></td>
                                <td><?= $s->salesorder_no;?></td>
                                <td><?php foreach ($s->cus as $c){echo $c->name;} ?></td>
                                <td><?php foreach ($s->cus as $c){echo $c->customerID;} ?></td>
                                <td><?= $s->date;?></td>
                                <td><?= $s->delivery_date;?></td>
                                <td><?= $item->model;?></td>
                                <td><?= $item->version;?></td>
                                <td>Type 1</td>
                                <td>Motorized</td>
                                <td><?= $item->quantity;?></td>
                                <td><a href="<?php echo $this->Url->build(['controller'=>'mit','action'=>'add',$item->id])?>">Select</a></td>
                            </tr>
                            <?php }}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
