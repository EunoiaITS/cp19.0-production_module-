<!--=========
      Production Planner page
      ==============-->

<div class="planner-from">
    <form method="post" action="<?php echo $this->Url->build(['controller' => 'MaterialRequest', 'action' => 'add']); ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Material Request Form</b></div>
            </div><!-- end mit title -->
                <div class="col-md-5 col-sm-6">
                    <div class="form-group left-from-group">
                        <div class="col-sm-3 col-xs-6">
                            <label for="mr-date" class="planner-year mit-label-item">Date <span class="planner-fright">:</span></label>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <input name="date" type="text" class="form-control datepicker" id="mr-date" value="<?php echo date('m/d/Y'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Mr No <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text">MR<?= $sn_no ?></p>
                        </div>
                    </div>
                    <div class="form-group left-from-group">
                        <div class="col-sm-3 col-xs-6">
                            <label for="mr-date" class="planner-year mit-label-item">So No<span class="planner-fright">:</span></label>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <input name="so_no" type="text" class="form-control" id="so-no" value="">
                            <span id="hidden-so"></span>
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
                            <select class="form-control" name="section" id="mr-form">
                                <option value="Welding">Welding</option>
                                <option value="Main Line Tank">Main Line Tank</option>
                                <option value="Drive Mechanism">Drive Mechanism</option>
                                <option value="Vacuum Camber">Vacuum Camber</option>
                                <option value="Welding">Welding</option>
                                <option value="BTA">BTA</option>
                                <option value="Metal Clad">Metal Clad</option>
                                <option value="Wiring">Wiring</option>
                                <option value="Testing">Testing</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <label class="cn-text" for="mr-form">Location <span class="planner-fright">:</span></label>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <select class="form-control" name="location" id="mr-form">
                                <option value="INDKOM 16">INDKOM 16</option>
                                <option value="INDKOM 24">INDKOM 24</option>
                            </select>
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
                        <th>NO.</th>
                        <th>Select</th>
                        <th>Part No</th>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Remarks</th>
                    </tr>
                    </thead>
                    <tbody id="add-item-table">
                    </tbody>
                </table>
                <button type="button" class="btn btn-info" id="add-part">Add Part</button>
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="col-sm-offset-10 col-sm-2 col-xs-12">
            <input type="hidden" name="status" value="requested">
            <input type="hidden" name="total" id="total" value="">
            <input type="hidden" name="created_by" value="<?= $pic ?>">
            <button type="submit" class="button btn btn-info btn-submit">Create</button>
        </div>
    </div>
    </form>
</div>
</div>

<script>
    $(document).ready(function(){
        var count = 1;
        var html_table = '';
        $('#add-part').on('click', function(e){
            e.preventDefault();
            html_table = '<tr>' +
                '<td>'+count+'<input type="hidden" class="new-count" value="'+count+'"></td>' +
                '<td><input type="checkbox" name="select-'+count+'"></td>' +
                '<td id="no-td'+count+'"><input type="text" class="form-control part-no" id="part-no' + count + '" rel="part-name' + count + '" name="part_no' + count + '" required><span id="no'+count+'"></span></td>' +
                '<td id="name-td'+count+'"><input type="text" class="form-control part-name" id="part-name' + count + '" rel="part-no' + count + '" name="part_desc' + count + '" required><span id="name'+count+'"></span></td>' +
                '<td><input type="text" class="form-control" name="quantity' + count + '" required></td>' +
                '<td></td>' +
                '</tr>';
            count++;
            $('#total').val(count);
            $('#add-item-table').append(html_table);
        });
        var so_no = 'input#so-no';
        var data = [<?php echo $so_no; ?>];
        var options = {
            source: data,
            minLength: 0
        };
        $(document).on('keydown.autocomplete', so_no, function () {
            $(this).autocomplete(options);
        });
        $(document).on('autocompleteselect', so_no, function (e, ui) {
            setTimeout(function(){
                $(this).addClass('so-loading-box');
                $('#hidden-so').html('<img src="<?php echo $this->request->webroot."assets/img/loading.gif"; ?>" id="so-img" class="so-loading">');
            },100);
            setTimeout(function(){
                $(this).removeClass('so-loading-box');
                $('#hidden-so').html('');
            },500);
            $('#add-item-table').empty();
            count = 1;
            var parts = ui.item.parts;
            if(parts.length !== 0) {
                var html_create = '';
                $.each(parts, function (i, e) {
                    html_create += '<tr>' +
                        '<td>'+count+'</td>' +
                        '<td><input type="checkbox" name="select-'+count+'"></td>' +
                        '<td><input type="text" class="form-control part-no" id="part-no' + count + '" rel="part-name' + count + '" name="part_no' + count + '" value="' + e.partNo + '"  readonly></td>' +
                        '<td><input type="text" class="form-control part-name" id="part-name' + count + '" rel="part-no' + count + '" name="part_desc' + count + '" value="' + e.partName + '" readonly></td>' +
                        '<td><input type="text" class="form-control" name="quantity' + count + '"></td>' +
                        '<td></td>' +
                        '</tr>';
                    count++;
                    $('#total').val(count);
                });
                $('#add-item-table').html(html_create);
            }
        });
        var part_no = 'input.part-no';
        var part_name = 'input.part-name';
        var data_no = [<?php echo $part_no; ?>];
        var options_no = {
            source: data_no,
            minLength: 0
        };
        var targetName = null;
        $(document).on('keydown.autocomplete', part_no, function() {
            $(this).autocomplete(options_no);
        });
        $(document).on('autocompleteselect', part_no, function(e, ui) {
            targetName = $(this).attr('rel');
            var newCount = $('.new-count').val();
            //alert(newCount);
            setTimeout(function(){
                $('#name-td'+newCount).addClass('so-loading-box');
                $('#name'+newCount).html('<img src="<?php echo $this->request->webroot."assets/img/loading.gif"; ?>" id="so-img" class="so-loading-table">');
            },100);
            setTimeout(function(){
                $('#name-td'+newCount).removeClass('so-loading-box');
                $('#name'+newCount).html('');
            },500);
            $('#'+targetName).val(ui.item.idx);
        });
        var data_name = [<?php echo $part_name; ?>];
        var options_name = {
            source: data_name,
            minLength: 0
        };
        var targetNo = null;
        $(document).on('keydown.autocomplete', part_name, function() {
            $(this).autocomplete(options_name);
        });
        $(document).on('autocompleteselect', part_name, function(e, ui) {
            targetNo = $(this).attr('rel');
            var newCount = $('.new-count').val();
            //alert(newCount);
            setTimeout(function(){
                $('#no-td'+newCount).addClass('so-loading-box');
                $('#no'+newCount).html('<img src="<?php echo $this->request->webroot."assets/img/loading.gif"; ?>" id="so-img" class="so-loading-table">');
            },100);
            setTimeout(function(){
                $('#no-td'+newCount).removeClass('so-loading-box');
                $('#no'+newCount).html('');
            },500);
            $('#'+targetNo).val(ui.item.idx);
        });
    });

</script>