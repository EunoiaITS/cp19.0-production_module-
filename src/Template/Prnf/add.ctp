<!--=========
prn page
==============-->

<div class="planner-from">
    <form action="<?php echo $this->Url->build(['controller'=>'Prnf','action'=>'add']);?>" method="post" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Production Reject Note Form</b></div>
            </div><!-- end mit title -->
                <div class="col-md-5 col-sm-6">
                    <div class="form-group left-from-group">
                        <div class="col-sm-3 col-xs-6">
                            <label for="mr-date" class="planner-year mit-label-item">Date <span class="planner-fright">:</span></label>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <input type="text" name="date" class="form-control datepicker" id="mr-date" value="<?php echo date('m/d/Y'); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 col-xs-6">
                            <p class="cn-text">Prn No <span class="planner-fright">:</span></p>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <p class="cn-main-text text-uppercase">PRN<?= $sn_no ?></p>
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
                            <select class="form-control" name="section" id="prnf-form">
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
                            <label class="cn-text" for="prn-lo-form">Location<span class="planner-fright">:</span></label>
                        </div>
                        <div class="col-sm-5 col-xs-6">
                            <select class="form-control" name="location" id="prn-lo-form">
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
                        <th>Serial No</th>
                        <th>Select</th>
                        <th>Part No</th>
                        <th>Part Name</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Reason</th>
                        <th>Document</th>
                        <th>Remark</th>
                    </tr>
                    </thead>
                    <tbody id="add-item-table">
                    </tbody>
                </table>
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
<script type="text/javascript">
    $(document).ready(function() {
        var count = 1;
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
            var parts = ui.item.parts;
            if (parts.length !== 0) {
                var html_create = '';
                $.each(parts, function (i, e) {
                    html_create = '<tr>' +
                        '<td>'+count+'</td>' +
                        '<td><input type="checkbox" name="select-'+count+'"></td>' +
                        '<td><input type="text" name="part_no'+count+'" id="part-no" rel="part-name" class="form-control part-no" value="'+e.partNo+'" id="prn-form" readonly></td>' +
                        '<td><input type="text" name="part_name'+count+'" id="part-name" rel="part-no" class="form-control part-name" value="'+e.partName+'" id="prn-form" readonly></td>' +
                        '<td><input type="text" name="quantity'+count+'" class="form-control" value="'+e.quantity+'" id="prn-qry" readonly></td>' +
                        '<td><textarea name="description'+count+'" id="" class="form-control" cols="20" rows="1"></textarea></td>' +
                        '<td><textarea name="reason'+count+'" id="" class="form-control" cols="10" rows="1"></textarea></td>' +
                        '<td><label class="btn btn-info">' +
                        'Upload <input name="upload_file'+count+'" type="file" hidden style="display: none !important;">' +
                        '</label></td>' +
                        '<td></td>' +
                        '</tr>';
                    count++;
                    $('#add-item-table').append(html_create);
                    $('#total').val(count);
                });
            }
        });
    });
</script>
