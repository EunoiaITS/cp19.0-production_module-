<!--=========
      Create serial number form page
      ==============-->

<div class="planner-from">
    <form method="post" action="<?php echo $this->url->build(['controller' => 'SerialNumber', 'action' => 'add']); ?>" class="planner-relative">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Create Serial Number Form</b></div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="cn-type-date" class="planner-year">Date <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="date" type="text" class="form-control datepicker" value="<?php echo date('m/d/Y')?>" id="cn-type-date" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="cn-type-so" class="planner-year">SO No <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="so_no" type="text" class="form-control" id="cn-type-so" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="model-planer" class="planner-year">Model <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <select name="model" class="form-control" id="model-planer" required="">
                                    <option value="RMU INS 24">RMU INS 24</option>
                                    <option value="RMU INS 24(VIOTORZEI)">RMU INS 24(VIOTORZEI)</option>
                                    <option value="CSU">CSU</option>
                                    <option value="JMW">JMW</option>
                                    <option value="JMW - ARAB	">JMW - ARAB	</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="cn-version" class="planner-year">Version <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <select name="version" class="form-control" id="cn-version" required="">
                                    <option value="ZZT">ZZT</option>
                                    <option value="ZZTT">ZZTT</option>
                                    <option value="ZZZ">ZZZ</option>
                                    <option value="ZZZT">ZZZT</option>
                                    <option value="ZZZTT">ZZZTT</option>
                                    <option value="ZTTZ">ZTTZ</option>
                                    <option value="ZTZ">ZTZ</option>
                                    <option value="ZZTZ">ZZTZ</option>
                                    <option value="ZTT">ZTT</option>
                                    <option value="ZTTT">ZTTT</option>
                                    <option value="ZTTTT">ZTTTT</option>
                                    <option value="ZT">ZT</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="cn-type-1" class="planner-year">Type 1 <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="type1" type="text" class="form-control" id="cn-type-1">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="cn-type-2" class="planner-year">Type 2 <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="type2" type="text" class="form-control" id="cn-type-2">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="cn-type-qty" class="planner-year">Qty <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="quantity" type="text" class="form-control" id="cn-type-qty" required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Create By <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $pic ?></p>
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
                        <button type="button" id="create-table" class="btn btn-info btn-csn">Create</button>
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
                            <th>Model</th>
                            <th>Version</th>
                            <th>Type 1</th>
                            <th>Type 2</th>
                            <th>Year</th>
                            <th>Month</th>
                            <th>Model</th>
                            <th>Sequence</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up" id="data-table">
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                <div class="prepareted-by-submit">
                    <input type="hidden" name="status" value="requested">
                    <input type="hidden" name="created_by" value="<?= $pic ?>">
                    <button type="submit" class="button btn btn-info btn-submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
    <script>
        $(document).ready(function(){
            var so_no = 'input#cn-type-so';
            var data = [<?php echo $so_no; ?>];
            var options = {
                source: data,
                minLength: 0
            };
            $(document).on('keydown.autocomplete', so_no, function() {
                $(this).autocomplete(options);
            });
            var sequence = <?php echo $sequence; ?>;
            var seq = parseInt(sequence);
            $('#create-table').on('click', function(e){
                e.preventDefault();
                var version = $('#cn-version').val();
                var model_no = '';
                if(version === 'ZZT'){
                    model_no = '21';
                }else if(version === 'ZZTT'){
                    model_no = '22';
                }else if(version === 'ZZZ'){
                    model_no = '30';
                }else if(version === 'ZZZT'){
                    model_no = '31';
                }else if(version === 'ZZZTT'){
                    model_no = '32';
                }else if(version === 'ZTTZ'){
                    model_no = 'S22';
                }else if(version === 'ZTZ'){
                    model_no = 'S21';
                }else if(version === 'ZZTZ'){
                    model_no = 'S31';
                }else if(version === 'ZTT'){
                    model_no = 'W11';
                }else if(version === 'ZTTT'){
                    model_no = 'W12';
                }else if(version === 'ZTTTT'){
                    model_no = 'W22';
                }else if(version === 'ZT'){
                    model_no = 'W01';
                }else{
                    model_no = '';
                }
                var formDate = $('#cn-type-date').val();
                var formModel = $('#model-planer').val();
                var formVersion = $('#cn-version').val();
                var formType1 = $('#cn-type-1').val();
                var formType2 = $('#cn-type-2').val();
                var formQuantity = $('#cn-type-qty').val();
                var qty = parseInt(formQuantity);
                var html_table = '';
                for(i = 0; i < qty; i++){
                    seq++;
                    html_table += '<tr>'+
                    '<td>'+(i+1)+'</td>'+
                    '<td>'+formModel+'</td>'+
                    '<td>'+formVersion+'</td>'+
                    '<td>'+formType1+'</td>'+
                    '<td>'+formType2+'</td>'+
                    '<td><input name="year'+i+'" type="text" class="form-control" value="<?php echo date('Y');?>" required=""></td>'+
                    '<td><input name="month'+i+'" type="text" class="form-control" value="<?php echo date('m');?>" required=""></td>'+
                    '<td>'+model_no+'</td>'+
                    '<td>'+seq+'</td>'+
                    '</tr>';
                }
                $('#data-table').html(html_table);
            });
        });
    </script>