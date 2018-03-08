<!--=========
Production Planner page
==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Material Issue Ticket Acknowlegement List</b></div>
                <div class="clearfix"></div>

                <!--============== Add drawing table area ===================-->

                <div class="planner-table table-responsive clearfix">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>NO.</th>
                                <th>PO No</th>
                                <th>SO No</th>
                                <th>Customer Code</th>
                                <th>Customer Name</th>
                                <th>Date Completion</th>
                                <th>Delivery Date</th>
                                <th>Model</th>
                                <th>Version</th>
                                <th>Type 1</th>
                                <th>Type 2</th>
                                <th>Qty</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody class="csn-text-up">
                            <?php $i=0;foreach ($mit as $m): $i++;?>
                                <tr>
                                    <td><?= $i?></td>
                                    <td><?= $m->sales->poNo?></td>
                                    <td><?= $m->sales->salesorder_no?></td>
                                    <td><?= $m->cus->customerID?></td>
                                    <td><?= $m->cus->name?></td>
                                    <td><?= date('m/d/Y',strtotime($m->sales->date)) ?></td>
                                    <td><?= date('m/d/Y',strtotime($m->sales->delivery_date)) ?></td>
                                    <td><?= $m->items->model?></td>
                                    <td><?= $m->items->version?></td>
                                    <td>INDOOR</td>
                                    <td>Motorized</td>
                                    <td><?= $m->items->quantity?></td>
                                    <td class="colored-red"><a href="<?php echo $this->Url->build(['controller' => 'Mit', 'action' => 'acknowledge', $m->id]); ?>"><?php if($role == 'requester'){echo 'Pending';}?></a></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
