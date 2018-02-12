<!--=========
      MiT form page
      ==============-->

<div class="planner-from">
    <form method="post" action="<?php echo $this->url->build(['controller' => 'Nbdo', 'action' => 'add']); ?>" class="planner-relative" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Non Billing Delivery Order Form</b></div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="fgtt-form" class="cn-text">Date <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="date" type="text" class="form-control datepicker" id="fgtt-form">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Nbdo No <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">NBDO<?= $sn_no ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="fgtt-customer" class="cn-text">Customer Name<span class="planner-fright" id="fgtt-so">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="cust_name" type="text" class="form-control" id="fgtt-customer">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="fgtt-address" class="cn-text">Address <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <textarea name="address" id="fgtt-address" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="nbdo-contact-no" class="cn-text">Contact Person<span class="planner-fright" id="fgtt-so">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="contact_person" type="text" class="form-control" id="nbdo-contact-no">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="nbdo-contact" class="cn-text">Contact No<span class="planner-fright" id="fgtt-so">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="contact_no" type="text" class="form-control" id="nbdo-contact">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Create By <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase">Fauzi</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Department <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">Production</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Section <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">Welding</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label class="cn-text" for="mit-form">Location <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <select class="form-control" name="location" id="mit-form">
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
                            <th>No</th>
                            <th>Part No</th>
                            <th>Part Name</th>
                            <th>Qty</th>
                            <th>Document</th>
                            <th>Remark</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up" id="add-item-table">
                        <tr>
                            <td>1</td>
                            <td><input type="text" id="part-no0" rel="part-name0" name="part_no0" class="form-control part-no" required=""></td>
                            <td><input type="text" id="part-name0" rel="part-name0" name="part_desc0"  class="form-control part-name" required=""></td>
                            <td><input type="text" name="quantity0"  class="form-control" required=""></td>
                            <td>
                                <label class="btn btn-info">
                                    Upload <input name="document0" type="file" hidden style="display: none !important;">
                                </label>
                            </td>
                            <td><input type="hidden" id="total" name="total" value="1"></td>
                        </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-info" id="add-part">Add Part</button>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                <div class="prepareted-by-submit">
                    <input type="hidden" name="created_by" value="requester">
                    <button type="submit" class="button btn btn-info btn-submit">Create</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <script>
        $(document).ready(function(){

            var count = 1;

            $('#add-part').on('click', function(e){
                e.preventDefault();
                var html_table = '';
                html_table += '<tr>'+
                '<td>'+(count+1)+'</td>'+
                '<td><input type="text" class="form-control part-no" id="part-no'+count+'" rel="part-name'+count+'" name="part_no'+count+'" required></td>'+
                '<td><input type="text" class="form-control part-name" id="part-name'+count+'" rel="part-no'+count+'" name="part_desc'+count+'" required></td>'+
                '<td><input type="text" class="form-control" name="quantity'+count+'" required></td>'+
                '<td>'+
                '<label class="btn btn-info">'+
                'Upload <input name="document'+count+'" type="file" hidden style="display: none !important;">'+
                '</label>'+
                '</td>'+
                '<td></td>'+
                '</tr>';
                count++;
                $('#total').val(count);
                $('#add-item-table').append(html_table);
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
                $('#'+targetNo).val(ui.item.idx);
            });

            var cust_details = [<?php echo $cust_details; ?>];
            var options_cust = {
                source: cust_details,
                minLength: 0
            };
            $(document).on('keydown.autocomplete', '#fgtt-customer', function(){
                $(this).autocomplete(options_cust);
            });
            $(document).on('autocompleteselect', '#fgtt-customer', function(e, ui) {
                $('#fgtt-address').val(ui.item.idx);
                $('#nbdo-contact-no').val(ui.item.conper);
                $('#nbdo-contact').val(ui.item.contact);
            });

        });
    </script>