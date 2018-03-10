<!--=========
Create serial number form page
==============-->
<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Work In Progress Staff Progress Monthly</b></div>
                <form action="#" class="planner-relative">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Operator Name<span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <select name="operator" class="form-control" id="op-name">
                                    <?php foreach ($operators as $op){?>
                                        <option value="<?= $op ?>" <?php if($op==$n){echo "selected";}?>><?= $op;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Employee No<span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">EN0150</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Section<span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <select name="section" class="form-control" id="wip-section">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Month<span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <div class="col-sm-6 col-xs-6">
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
                                <div class="col-sm-6 col-xs-6">
                                    <select class="form-control" name="year" id="wip-year">
                                        <?php for($i = 1990; $i <= date('Y'); $i++){ ?>
                                            <option value="<?php echo $i ?>" <?php if($year == $i){echo 'selected';} ?>><?php echo $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                            <div class="pre col-sm-8">
                                <a style="float: right; margin-top: 50px" href="<?php echo $this->url->build(['controller' => 'Wip', 'action' => 'monthlyProgress2']).'?month='.$month.'&year='.$year; ?>" class="button btn btn-info btn-generate" id="btn-generate">Generate</a>
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
                            <th>No</th>
                            <th>Date</th>
                            <th>So No</th>
                            <th>Serial No</th>
                            <th>WIP No</th>
                            <th>Model</th>
                            <th>Version</th>
                            <th>Type 1</th>
                            <th>Type 2</th>
                            <th>Document</th>
                            <th>Status</th>
                            <th>Remark</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $i=0;foreach ($final as $f):$i++?>
                        <tr>
                            <td><?= $i?></td>
                            <td><?= $f->sec_wip->date?></td>
                            <td><?= $f->sec_wip->so_no?></td>
                            <td><?= $f->sec_wip->serial_no?></td>
                            <td><?= "WIP" .$f->sec_wip->id?></td>
                            <td><?= $f->sec_sn->model?></td>
                            <td><?= $f->sec_sn->version?></td>
                            <td><?= $f->sec_sn->type1?></td>
                            <td><?= $f->sec_sn->type2?></td>
                            <td><a href="#">View</a> </td>
                            <td class="<?php if($f->status == 'acknowledged'){ echo "colored-csn";} elseif($f->status == 'requested' || $f->status == 'rejected'){echo "colored-red";}else{ echo "";}?>"><?php if($f->status == 'acknowledged'){ echo "Ack";} elseif($f->status == 'requested'){echo "Pending";}elseif( $f->status == 'rejected'){echo "Rejected";}else{ echo "";}?></td>
                            <td></td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $( document ).ready(function() {
            var allOp = [<?php echo $all_op;?>];
            var defOp = '';
            var currentOp = '<?php echo $n;?>';
            var currentSec = '<?php echo $s;?>';
            var key = 0;
            for(i=0; i < allOp.length; i++){
                if(allOp[i].label === currentOp){
                    key = i;
                }
            }
            var defSec = allOp[key].section;
            for(j = 0; j < defSec.length; j++){
                var selectedOp = '';
                if(defSec[j] === currentSec){
                    selectedOp = 'selected';
                }
                defOp += '<option value="'+defSec[j]+'" '+selectedOp+'>'+defSec[j]+'</option>';
            }
            $('#wip-section').html(defOp);
            $('#op-name').on('change',function (e) {
                e.preventDefault();
                var html = '';
                var sel = $(this).val();
                $.each(allOp,function (i,c) {
                    if(c.label === sel){
                        var sections = c.section;
                        for( i = 0; i < sections.length; i++ ){
                            html += '<option value="'+sections[i]+'">'+sections[i]+'</option>';
                        }
                    }
                });
                $('#wip-section').html(html);
            });
            $('#btn-generate').on('click', function(){
                var month = $('#wip-month').val();
                var year = $('#wip-year').val();
                var name = $('#op-name').val();
                var section = $('#wip-section').val();
                var url = "<?php echo $this->Url->build(['controller'=>'Wip','action'=>'monthlyProgress2'])?>";
                $(this).attr("href",url+"?month="+month+'&year='+year+'&op_name='+name+'&section='+section);
            });
        });
    </script>