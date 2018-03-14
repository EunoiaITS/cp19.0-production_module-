<!--=========
      Create serial number form page
      ==============-->

<div class="planner-from" xmlns="http://www.w3.org/1999/html">
    <form method="post" action="<?php echo $this->url->build(['controller' => 'Ps', 'action' => 'monthlyScheduler']); ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Production Monthly Schedule Form</b></div>
                <form action="#" class="planner-relative">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Date <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="date" type="text" class="form-control datepicker" id="ps-date" value="<?php echo date('m/d/Y'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">PMS No <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $sn_no ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Location <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <select class="form-control" name="location" id="mit-form">
                                    <option value="INDKOM 16">INDKOM 16</option>
                                    <option value="INDKOM 24">INDKOM 24</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="model-planer" class="ps-month">Month <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="col-sm-6 col-md-5 col-xs-6 padding-left-0">
                                    <select class="form-control" name="month" id="ps-month">
                                        <option value="01" <?php if($month == '01'){echo 'selected';} ?>>January</option>
                                        <option value="02" <?php if($month == '02'){echo 'selected';} ?>>February</option>
                                        <option value="03" <?php if($month == '03'){echo 'selected';} ?>>March</option>
                                        <option value="04" <?php if($month == '04'){echo 'selected';} ?>>April</option>
                                        <option value="05" <?php if($month == '05'){echo 'selected';} ?>>May</option>
                                        <option value="06" <?php if($month == '06'){echo 'selected';} ?>>June</option>
                                        <option value="07" <?php if($month == '07'){echo 'selected';} ?>>July</option>
                                        <option value="08" <?php if($month == '08'){echo 'selected';} ?>>August</option>
                                        <option value="09" <?php if($month == '09'){echo 'selected';} ?>>September</option>
                                        <option value="10" <?php if($month == '10'){echo 'selected';} ?>>October</option>
                                        <option value="11" <?php if($month == '11'){echo 'selected';} ?>>November</option>
                                        <option value="12" <?php if($month == '12'){echo 'selected';} ?>>December</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-md-5 col-xs-6">
                                    <select class="form-control" name="year" id="ps-year">
                                        <?php for($i = 1990; $i <= date('Y'); $i++){ ?>
                                        <option value="<?php echo $i ?>" <?php if($year == $i){echo 'selected';} ?>><?php echo $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <a href="<?php echo $this->url->build(['controller' => 'Ps', 'action' => 'monthlyScheduler']).'?month='.$month.'&year='.$year; ?>" class="button btn btn-info btn-generate" id="btn-generate">Generate</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Created By <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $pic_name ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Department <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $pic_dept ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Section <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $pic_section ?></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="clearfix"></div>
            <!--============== Add drawing table area ===================-->
            <div class="planner-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Tender No</th>
                            <th rowspan="2">SO No</th>
                            <th rowspan="2">Customer Code</th>
                            <th rowspan="2">Customer Name</th>
                            <th rowspan="2">Date Completion</th>
                            <th rowspan="2">Delivery Date</th>
                            <th rowspan="2">Model</th>
                            <th rowspan="2">Version</th>
                            <th rowspan="2">Type 1</th>
                            <th rowspan="2">Type 2</th>
                            <th rowspan="2">Qty</th>
                            <th colspan="4">Period</th>
                        </tr>
                        <tr class="table-cells">
                            <td>w1</td>
                            <td>w2</td>
                            <td>w3</td>
                            <td>w4</td>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $count = 0; ?>
                        <?php foreach($sales as $s): ?>
                                <?php foreach($s->soi as $item): ?>
                                <?php if(isset($item->exist) && $item->exist == 'yes'): $count++; ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?= $s->tenderNo ?></td>
                                        <td><?= $s->salesorder_no ?></td>
                                        <td><?php foreach($s->cus as $cus){echo $cus->customerID;} ?></td>
                                        <td><?php foreach($s->cus as $cus){echo $cus->name;} ?></td>
                                        <td><?= date('m/d/Y', strtotime($s->delivery_date)) ?></td>
                                        <td><?= (isset($s->fgtt->date) ? $s->fgtt->date : '') ?></td>
                                        <td><?= $item->model ?></td>
                                        <td><?= $item->version ?></td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td><?= $item->quantity ?></td>
                                        <td><?= $item->quantity/4 ?></td>
                                        <td><?= $item->quantity/4 ?></td>
                                        <td><?= $item->quantity/4 ?></td>
                                        <td><?= $item->quantity/4 ?></td>
                                    </tr>
                                <?php endif; endforeach; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                <div class="prepareted-by-csn">
                    <input type="hidden" name="total_items" value="<?php echo $count; ?>">
                    <input type="hidden" name="created_by" value="<?= $pic ?>">
                    <input type="hidden" name="status" value="requested">
                    <button type="submit" class="button btn btn-info">Create</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <script>
        $( document ).ready(function() {
            $('#btn-generate').on('click', function(){
                var month = $('#ps-month').val();
                var year = $('#ps-year').val();
                var url = "<?php echo $this->Url->build(['controller'=>'Ps','action'=>'monthlyScheduler'])?>";
                $(this).attr("href",url+"?month="+month+'&year='+year);

            });
        });
    </script>
