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
                            <th>Type 1</th>
                            <th>Type 2</th>
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
                        <?php foreach($sn as $s): ?>
                            <tr>
                                <td><?= $s->id ?></td>
                                <td><?= $s->model ?></td>
                                <td><?= $s->version ?></td>
                                <td><?= $s->type1 ?></td>
                                <td><?= $s->type2 ?></td>
                                <td><?php if(date("M-y", strtotime("-3 month")) == date('M-y', strtotime($s->modified))){ echo $s->quantity; } ?></td>
                                <td><?php if(date("M-y", strtotime("-2 month")) == date('M-y', strtotime($s->modified))){ echo $s->quantity; } ?></td>
                                <td><?php if(date("M-y", strtotime("-1 month")) == date('M-y', strtotime($s->modified))){ echo $s->quantity; } ?></td>
                                <td><?php if(date("M-y", strtotime("0 month")) == date('M-y', strtotime($s->modified))){ echo $s->quantity; } ?></td>
                                <td><?php if(date("M-y", strtotime("1 month")) == date('M-y', strtotime($s->modified))){ echo $s->quantity; } ?></td>
                                <td><?php if(date("M-y", strtotime("2 month")) == date('M-y', strtotime($s->modified))){ echo $s->quantity; } ?></td>
                                <td><?php if(date("M-y", strtotime("3 month")) == date('M-y', strtotime($s->modified))){ echo $s->quantity; } ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>