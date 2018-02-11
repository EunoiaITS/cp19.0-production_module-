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
                            <th>Model</th>
                            <th>Version</th>
                            <th>Type 1</th>
                            <th>Type 2</th>
                            <th>SN</th>
                            <th>Create By</th>
                            <th>Department</th>
                            <th>Section</th>
                            <th>Current Section</th>
                            <th>Operator Name</th>
                            <th>Status</th>
                            <th>Remark</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php foreach($sn as $s): ?>
                            <tr>
                                <td><?= $s->id ?></td>
                                <td><?= $s->date ?></td>
                                <td><?= $s->model ?></td>
                                <td><?= $s->version ?></td>
                                <td><?= $s->type1 ?></td>
                                <td><?= $s->type2 ?></td>
                                <td><?= $s->quantity ?></td>
                                <td><?= $s->created_by ?></td>
                                <td>Production</td>
                                <td>Planner</td>
                                <td>Store</td>
                                <td>Meget</td>
                                <td><?= $s->status ?></td>
                                <td><?= $s->remark ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>