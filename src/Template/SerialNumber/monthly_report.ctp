<!--=========
      Create serial number form page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="part-title-planner text-uppercase text-center"><b>Serial Number Monthly Report</b></div>
            <div class="clearfix"></div>
            <!--============== Add drawing table area ===================-->
            <div class="planner-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Model</th>
                            <th>Version</th>
                            <th><?php echo date("M-y", strtotime("-3 month")); ?></th>
                            <th><?php echo date("M-y", strtotime("-2 month")); ?></th>
                            <th><?php echo date("M-y", strtotime("-1 month")); ?></th>
                            <th><?php echo date("M-y", strtotime("0 month")); ?></th>
                            <th><?php echo date("M-y", strtotime("1 month")); ?></th>
                            <th><?php echo date("M-y", strtotime("2 month")); ?></th>
                            <th><?php echo date("M-y", strtotime("3 month")); ?></th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $count = 0; foreach($mv as $k => $s): ?>
                            <?php $count++; ?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= $mvCalc->$k->model ?></td>
                                <td><?= $mvCalc->$k->version ?></td>
                                <td><?= $mvCalc->$k->m1 ?></td>
                                <td><?= $mvCalc->$k->m2 ?></td>
                                <td><?= $mvCalc->$k->m3 ?></td>
                                <td><?= $mvCalc->$k->m4 ?></td>
                                <td><?= $mvCalc->$k->m5 ?></td>
                                <td><?= $mvCalc->$k->m6 ?></td>
                                <td><?= $mvCalc->$k->m7 ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>