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
                            <td><?= $items->model?></td>
                            <td><?= $items->version?></td>
                            <td>INDoor</td>
                            <td>Motorized</td>
                            <td><input name="quantity<?= $count?>" id="quantity-id<?= $count?>" type="text" class="form-control quantity"></td>
                            <td></td>
                        </tr>
                            <div id="add-item-table">
                                <input type="hidden" name="so_no<?= $count?>" value="<?= $s->salesorder_no?>">
                                <input type="hidden" name="item_no<?= $count?>" value="<?= $items->id?>">
                                <input type="hidden" name="count" value="<?= $count?>">
                            </div>

                    <?php $count++;?><?php endforeach;endforeach;?>
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
                        <button id="add-part" type="submit" class="button btn btn-info">Update</button>
                    </div>
            </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        var date = "<?php echo $date;?>";
        $('.quantity').on('change',function(){
            var total = 0;
            $('.quantity').each(function(){
                total += parseInt($(this).val()) || 0;
                //alert($(this).val());
                $('#total').text(total);
                $('#to-id').val(total);

            });
        });
        $('#date-id').val(date);
    });
</script>