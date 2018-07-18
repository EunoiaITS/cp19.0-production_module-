<!--=========
Create serial number form page
==============-->
<div class="planner-from">
    <form id="ps-form" action="<?php echo $this->Url->build(['controller'=>'ps','action'=>'dailyReport'])?>" method="post" class="planner-relative">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Production Planner Daily Report</b></div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Date<span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p id="date" class="cn-main-text"><?= $date ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Create By <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $pic?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Section <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $pic_section?></p>
                            </div>
                        </div>
                    </div>
                <div class="col-sm-4 col-sm-offset-2">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td colspan="3">DAILY TARGET</td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <th>Type</th>
                            <th>Mon - Fri</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <tr>
                            <td>RMU INS 24</td>
                            <td></td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>RMU INS 24</td>
                            <td>Motorized</td>
                            <td>12</td>
                        </tr>
                        <tr>
                            <td>CSU</td>
                            <td></td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>JMW / RMU CB 12K</td>
                            <td></td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>JMW - ARAB / RMU CB 17.5K</td>
                            <td></td>
                            <td>2</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix"></div>
            <!--============== Add drawing table area ===================-->
            <div class="planner-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tender No</th>
                            <th>SO No</th>
                            <th>Model</th>
                            <th>Version</th>
                            <th>Type 1</th>
                            <th>Type 2</th>
                            <th>Qty</th>
                            <th>Remark</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                    <?php $i=0;$count=0; foreach ($sales as $s):
                        foreach ($s->soi as $items):$i++;?>
                        <tr>
                            <td><?= $i?></td>
                            <td><?= $s->tenderNo?></td>
                            <td><?= $s->salesorder_no?></td>
                            <td><p class="model-<?= $count?>" rel="<?= $items->model?>"><?= $items->model?></p></td>
                            <td><?= $items->version?></td>
                            <td></td>
                            <td></td>
                            <td><input name="quantity<?= $count?>" id="quantity-id<?= $count?>" rel="<?= $count?>" type="number" min="0" class="form-control quantity" value=""></td>
                            <td></td>
                        </tr>
                            <div id="add-item-table">
                                <input type="hidden" name="so_no<?= $count?>" value="<?= $s->salesorder_no?>">
                                <input type="hidden" name="item_no<?= $count?>" value="<?= $items->id?>">
                                <input type="hidden" name="count" value="<?= $count?>">
                                <input type="hidden" name="dr_id<?= $count?>" value="<?php if(isset($items->dr_id)){echo $items->dr_id;}?>">
                            </div>

                    <?php $count++; endforeach;endforeach;?>
                    <input id="to-id" type="hidden" name="total" value="">
                    <input id="date-id" type="hidden" name="date" value="">
                        <tr>
                            <td colspan="7">Total Daily Target</td>
                            <td id="total"></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                    <div class="prepareted-by-csn">
                        <input type="hidden" name="ps_id" value="<?php foreach($ps_data as $ps){if(isset($ps->id)){echo $ps->id;}} ?>">
                        <input type="hidden" name="action" value="<?php echo $ps_data->action; ?>">
                        <button id="add-part" type="submit" class="button btn btn-info">Update</button>
                    </div>
            </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        var ri24 = 0;
        var ri24m = 0;
        var rc12 = 0;
        var rc17 = 0;
        var csu = 0;
        var acc = 0;
        var svc = 0;
        var fp = 0;
        var db = 0;
        var total = 0;

        var date = "<?php echo $date;?>";
        $('.quantity').on('change',function() {
            var count = $(this).attr('rel');
            //alert($('.model-'+count).text());
            if ($('.model-'+count).text() === 'RMU INS24') {
                if ($('#quantity-id' + count).val() <= 18) {
                    ri24 += parseInt($('#quantity-id' + count).val());
                    if(ri24 > 18){
                        alert('Value Exceed Daily limit of 18 !!');
                        ri24 = ri24 - parseInt($('#quantity-id' + count).val());
                        $('#quantity-id' + count).val(0);
                    }
                } else {
                    alert('Value Exceed Daily limit of 18 !!');
                    $('#quantity-id' + count).val(0);
                }
            }else if ($('.model-'+count).text() === 'RMU (Motorize)') {
                if ($('#quantity-id' + count).val() <= 12) {
                    ri24m += parseInt($('#quantity-id' + count).val());
                    if(ri24m > 12){
                        alert('Value Exceed Daily limit of 12 !!');
                        ri24m = ri24m - parseInt($('#quantity-id' + count).val());
                        $('#quantity-id' + count).val(0);
                    }
                } else {
                    alert('Value Exceed Daily limit of 12 !!');
                    $('#quantity-id' + count).val(0);
                }
            }else if ($('.model-'+ count).text() === 'RMU CB 12kV') {
                if ($('#quantity-id'+count).val() <= 4) {
                    rc12 += parseInt($('#quantity-id' + count).val());
                    if(rc12 > 4){
                        alert('Value Exceed Daily limit of 4 !!');
                        rc12 = rc12 - parseInt($('#quantity-id' + count).val());
                        $('#quantity-id' + count).val(0);
                    }
                } else {
                    alert('Value Exceed Daily limit of 4 !!');
                    $('#quantity-id' + count).val(0);
                }
            } else if ($('.model-'+ count).text() === 'CSU') {
                if ($('#quantity-id'+count).val() <= 2) {
                    csu += parseInt($('#quantity-id' + count).val());
                    if(csu > 2){
                        alert('Value Exceed Daily limit of 2 !!');
                        csu = csu - parseInt($('#quantity-id' + count).val());
                        $('#quantity-id' + count).val(0);
                    }
                } else {
                    alert('Value Exceed Daily limit of 2 !!');
                    $('#quantity-id' + count).val(0);
                }
            } else if ($('.model-'+ count).text() === 'RMU CB 17.5kV') {
                if ($('#quantity-id'+count).val() <= 2) {
                    rc17 += parseInt($('#quantity-id' + count).val());
                    if(rc17 > 2){
                        alert('Value Exceed Daily limit of 2 !!');
                        rc17 = rc17 - parseInt($('#quantity-id' + count).val());
                        $('#quantity-id' + count).val(0);
                    }
                } else {
                    alert('Value Exceed Daily limit of 2 !!');
                    $('#quantity-id' + count).val(0);
                }
            } else if ($('.model-'+count).text() === 'Accessories') {
                if ($('#quantity-id' + count).val() <= 1) {
                    acc += parseInt($('#quantity-id' + count).val());
                    if(acc > 1){
                        alert('Value Exceed Daily limit of 1 !!');
                        acc = 0;
                        $('#quantity-id' + count).val(0);
                    }
                } else {
                    alert('Value Exceed Daily limit of 1 !!');
                    acc = 0;
                    $('#quantity-id' + count).val(0);
                }
            }else if ($('.model-'+count).text() === 'Services') {
                if ($('#quantity-id' + count).val() <= 1) {
                    svc += parseInt($('#quantity-id' + count).val());
                    if(svc > 1){
                        alert('Value Exceed Daily limit of 1 !!');
                        svc = 0;
                        $('#quantity-id' + count).val(0);
                    }
                } else {
                    alert('Value Exceed Daily limit of 1 !!');
                    svc = 0;
                    $('#quantity-id' + count).val(0);
                }
            }else if ($('.model-'+count).text() === 'Feeder Pillar/Indoor LV Board') {
                if ($('#quantity-id' + count).val() <= 1) {
                    fp += parseInt($('#quantity-id' + count).val());
                    if(fp > 1){
                        alert('Value Exceed Daily limit of 1 !!');
                        fp = 0;
                        $('#quantity-id' + count).val(0);
                    }
                } else {
                    alert('Value Exceed Daily limit of 1 !!');
                    fp = 0;
                    $('#quantity-id' + count).val(0);
                }
            }else if ($('.model-'+count).text() === 'Distribution Board') {
                if ($('#quantity-id' + count).val() <= 1) {
                    db += parseInt($('#quantity-id' + count).val());
                    if(db > 1){
                        alert('Value Exceed Daily limit of 1 !!');
                        db = 0;
                        $('#quantity-id' + count).val(0);
                    }
                } else {
                    alert('Value Exceed Daily limit of 1 !!');
                    db = 0;
                    $('#quantity-id' + count).val(0);
                }
            }
            total = ri24 + ri24m +rc12 +rc17 + csu + acc + svc + fp + db;
            $('#total').text(total);
            $('#to-id').val(total);
        });
        $('#date-id').val(date);
    });
</script>