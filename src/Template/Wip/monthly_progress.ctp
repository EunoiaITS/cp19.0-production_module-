<!--=========
Create serial number form page
==============-->
<?php
//echo "<pre>";
//print_r($op_count);
//echo "</pre>"?>
<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Work In Progress Staff Progress Monthly</b></div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="wip-model-section" class="ps-month">Section <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <select class="form-control" name="section" id="wip-section">
                                    <option value="Welding 1">Welding</option>
                                    <option value="Main Line Tank">Main Line Tank</option>
                                    <option value="Drive Mechanism">Drive Mechanism</option>
                                    <option value="Vacuum Chamber">Vacuum Chamber</option>
                                    <option value="Welding 2">Welding</option>
                                    <option value="Bta">BTA</option>
                                    <option value="Metal Clad">Metal Clad</option>
                                    <option value="Wiring">Wiring</option>
                                    <option value="Testing">Testing</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">QTY Produce <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">60</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="model-planer" class="ps-month">Month <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                    <select class="form-control" name="month" id="wip-month">
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
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="model-planer" class="ps-month">Year <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <select class="form-control" name="year" id="wip-year">
                                    <?php for($i = 1990; $i <= date('Y'); $i++){ ?>
                                        <option value="<?php echo $i ?>" <?php if($year == $i){echo 'selected';} ?>><?php echo $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="pre col-sm-8">
                            <a href="<?php echo $this->url->build(['controller' => 'Wip', 'action' => 'monthlyProgress']).'?month='.$month.'&year='.$year; ?>" class="button btn btn-info btn-generate" id="btn-generate">Generate</a>
                        </div>
                    </div>
            </div>

            <div class="clearfix"></div>
            <!--============== Add drawing table area ===================-->
            <div class="planner-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Operator Name</th>
                            <th colspan="2">RMU INS 24</th>
                            <th colspan="2">RMU INS 24(VIOTORZEI)</th>
                            <th colspan="2">CSU</th>
                            <th colspan="2">JMW</th>
                            <th colspan="2">JMW - ARAB</th>
                            <th rowspan="2">Remark</th>
                        </tr>
                        <tr class="table-cells">
                            <td>Act</td>
                            <td>Reject</td>
                            <td>Act</td>
                            <td>Reject</td>
                            <td>Act</td>
                            <td>Reject</td>
                            <td>Act</td>
                            <td>Reject</td>
                            <td>Act</td>
                            <td>Reject</td>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php for($i=0;$i<sizeof($operators);$i++){?>
                        <tr>
                            <td><?= $i+1 ?></td>
                            <td><?= $operators[$i]?></td>
                            <td><?php $ack1 = 'ack1'.$i; echo $op_count->$ack1;?></td>
                            <td><?php $rej1 = 'rej1'.$i; echo $op_count->$rej1;?></td>
                            <td><?php $ack2 = 'ack2'.$i; echo $op_count->$ack2;?></td>
                            <td><?php $rej2 = 'rej2'.$i; echo $op_count->$rej2;?></td>
                            <td><?php $ack3 = 'ack3'.$i; echo $op_count->$ack3;?></td>
                            <td><?php $rej3 = 'rej3'.$i; echo $op_count->$rej3;?></td>
                            <td><?php $ack4 = 'ack4'.$i; echo $op_count->$ack4;?></td>
                            <td><?php $rej4 = 'rej4'.$i; echo $op_count->$rej4;?></td>
                            <td><?php $ack5 = 'ack5'.$i; echo $op_count->$ack5;?></td>
                            <td><?php $rej5 = 'rej5'.$i; echo $op_count->$rej5;?></td>
                            <td></td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                <div class="prepareted-by-csn">
                    <div class="button btn btn-info">Create</div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $( document ).ready(function() {
            $('#btn-generate').on('click', function(){
                var month = $('#wip-month').val();
                var year = $('#wip-year').val();
                var section = $('#wip-section').val();
                var url = "<?php echo $this->Url->build(['controller'=>'Wip','action'=>'monthlyProgress'])?>";
                $(this).attr("href",url+"?month="+month+'&year='+year+'&section='+section);
            });
        });
    </script>