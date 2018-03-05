<!--=========
      Create serial number form page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="part-title-planner text-uppercase text-center"><b>Serial Number Report</b></div>
            <div class="clearfix"></div>
            <!--============== Add drawing table area ===================-->
            <div class="planner-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>SO No</th>
                            <th>Model</th>
                            <th>Version</th>
                            <th>Type 1</th>
                            <th>Type 2</th>
                            <th>SN</th>
                            <th>Create By</th>
                            <th>Department</th>
                            <th>Current Section</th>
                            <th>Operator Name</th>
                            <th>Status</th>
                            <th>Remark</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $count = 0; foreach($sn as $s): ?>
                            <?php foreach($s->items as $item): ?>
                                <?php $count++; ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $s->date ?></td>
                                    <td><?= $s->so_no ?></td>
                                    <td><?= $s->model ?></td>
                                    <td><?= $s->version ?></td>
                                    <td><?= $s->type1 ?></td>
                                    <td><?= $s->type2 ?></td>
                                    <td><?= date('ymd', strtotime($s->date)).$item->id ?></td>
                                    <td><?= $s->created_by ?></td>
                                    <td>Production</td>
                                    <td><?php if(isset($s->wips->section)){echo $s->wips->section;}?></td>
                                    <td><?php if(isset($s->wips->operator_name)){echo $s->wips->operator_name;}?></td>
                                    <td class="<?php if(isset($s->wips->status)){
                                        if($s->wips->status== 'requested'){
                                            echo "colored-red";
                                        }elseif ($s->wips->status == 'rejected'){
                                            echo "colored-red";
                                        }else{
                                            echo "colored-csn";
                                        }
                                    }?>"><?php if(isset($s->wips->status)){
                                        if($s->wips->status== 'requested'){
                                            echo "Pending";
                                        }elseif ($s->wips->status== 'rejected'){
                                            echo "Reject";
                                        }else{
                                            echo "Ack";
                                        }
                                        }?></td>
                                    <td><?= $s->remark ?></td>
                                </tr>
                            <?php endforeach; endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>