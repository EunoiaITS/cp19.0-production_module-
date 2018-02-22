<!--=========
      Production Planner page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="part-title-planner text-uppercase text-center"><b>Production Planner Scheduler</b></div>
            <div class="clearfix"></div>
            <!--============== Add drawing table area ===================-->
            <div class="planner-table table-responsive clearfix">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>NO.</th>
                            <th>PO No</th>
                            <th>Tender No</th>
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
                            <th>Delivery Complete</th>
                            <th>Remaining Balance</th>
                            <th>Scheduler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 0; ?>
                        <?php foreach($sales as $s): ?>
                            <?php foreach($s->soi as $item): ?>
                                <?php $count++; ?>
                                <tr>
                                    <td id="row-<?php echo $count; ?>"><?php echo $count; ?></td>
                                    <td><?= $s->poNo ?></td>
                                    <td><?= $s->tenderNo ?></td>
                                    <td><?= $s->salesorder_no ?></td>
                                    <td><?php foreach($s->cus as $cus){echo $cus->customerID;} ?></td>
                                    <td><?php foreach($s->cus as $cus){echo $cus->name;} ?></td>
                                    <td><?= $s->delivery_date ?></td>
                                    <td><?= (isset($s->fgtt->date) ? $s->fgtt->date : '') ?></td>
                                    <td><?= $item->model ?></td>
                                    <td><?= $item->version ?></td>
                                    <td>N/A</td>
                                    <td>N/A</td>
                                    <td id="qty-<?php echo $count; ?>"><?= $item->quantity ?></td>
                                    <td><?= (isset($s->production_sn->quantity) ? $s->production_sn->quantity : 0) ?></td>
                                    <td><?= (($item->quantity) - (isset($s->production_sn->quantity) ? $s->production_sn->quantity : 0)) ?></td>
                                    <td><button rel="<?php echo $count; ?>" class="btn btn-info btn-submit btn-popup"  data-toggle="modal" data-target="#myModal">Create</button></td>
                                </tr>
                                <span id="total-month-<?php echo $count; ?>" class="hidden"><?php echo count($s->months); ?></span>
                                <?php foreach($s->months as $key => $month): ?>
                                    <span id="month-no-<?php echo $count.$key; ?>" class="hidden month-names"><?php echo $month; ?></span>
                                    <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                <div id="btn-total" class="button btn btn-info btn-submit" data-toggle="modal" data-target="#totalModal">Total</div>
            </div>
        </div>
    </div>
</div>



<!--========================
Sceduler popup module
======================-->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center text-uppercase" id="myModalLabel">CREATE SERIAL NUMBER Scheduler  </h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Month</th>
                        <th>Scheduler Plan</th>
                        <th>Sceduler Input</th>
                    </tr>
                    </thead>
                    <tbody id="table-data">
                    <!-- September -->
                    <tr>
                        <td rowspan="2">Sep-17</td>
                        <th>Plan</th>
                        <td>200</td>
                    </tr>
                    <tr>
                        <th>Actual</th>
                        <td><input type="text" class="form-control"></td>
                    </tr>
                    <!-- Octobar -->
                    <tr>
                        <td rowspan="2">Oct-17</td>
                        <th>Plan</th>
                        <td>200</td>
                    </tr>
                    <tr>
                        <th>Actual</th>
                        <td><input type="text" class="form-control"></td>
                    </tr>
                    <!-- November -->
                    <tr>
                        <td rowspan="2">Nov-17</td>
                        <th>Plan</th>
                        <td>200</td>
                    </tr>
                    <tr>
                        <th>Actual</th>
                        <td><input type="text" class="form-control"></td>
                    </tr>
                    <!-- december -->
                    <tr>
                        <td rowspan="2">Dec-17</td>
                        <th>Plan</th>
                        <td>200</td>
                    </tr>
                    <tr>
                        <th>Actual</th>
                        <td><input type="text" class="form-control"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-confirm">Confirm</button>
            </div>
        </div>
    </div>
</div>

<!--========================
Sceduler popup module
======================-->

<div class="modal fade" id="totalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center text-uppercase" id="myModalLabel">CREATE SERIAL NUMBER Scheduler  </h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Month</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody id="table-data-total">
                    <!-- September -->
                    <tr>
                        <td rowspan="2">Sep-17</td>
                        <th>Plan</th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.btn-popup').on('click', function(e){
            e.preventDefault();
            var id = $(this).attr('rel');
            var months = parseInt($('#total-month-'+id).text());
            var qty = parseInt($('#qty-'+id).text());
            var html_table = '';
            for(i = 0; i < months; i++){
                html_table += '<tr>'+
                '<td rowspan="2">'+$('#month-no-'+id+i).text()+'</td>'+
                '<th>Plan</th>'+
                '<td>'+(qty/months)+'</td>'+
                '</tr>'+
                '<tr>'+
                '<th>Actual</th>'+
                '<td><input type="text" class="form-control '+$('#month-no-'+id+i).text()+'"></td>'+
                '</tr>';
            }
            $('#table-data').html(html_table);
        });
        $('#btn-total').on('click', function(e){
            e.preventDefault();
            var all_month_names = [];
            $('span.month-names').each(function(){
                all_month_names.push($(this).text());
            });
            var month_names = [];
            $.each(all_month_names, function(i, e){
                if($.inArray(e, month_names) == -1) month_names.push(e);
            });
            var total_table = '';
            for(j = 0; j < month_names.length; j++){
                var total_qty = 0;
                $('.'+month_names[j]).each(function(){
                    total_qty += $(this).val();
                });
                total_table += '<tr>'+
                '<td>'+month_names[j]+'</td>'+
                '<th>'+total_qty+'</th>'+
                '</tr>';
            }
            $('#table-data-total').html(total_table);
        });
    });
</script>