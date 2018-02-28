<!--=========
      MiT form page
      ==============-->

<div class="planner-from">
    <form method="post" action="<?php echo $this->url->build(['controller' => 'Fgtt', 'action' => 'add']); ?>" class="planner-relative">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Finish Good Transfer ticket Create Form</b></div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="fgtt-form" class="cn-text">Date <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="date" type="text" class="form-control datepicker" id="fgtt-form" value="<?php echo date('m/d/Y'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Fgtt No <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">FGTT<?= $fgtt_no ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="fgtt-so" class="cn-text">So No<span class="planner-fright" id="fgtt-so">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input name="so_no" type="text" class="form-control" id="fgtt-so">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="fgtt-qty" class="cn-text">QTY <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <input type="text" id="fgtt-qty" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Create By <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase"><?= $pic_name ?></p>
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
                            <th>Tender No</th>
                            <th>So No</th>
                            <th>Serial No</th>
                            <th>Model</th>
                            <th>Version</th>
                            <th>Type 1</th>
                            <th>Type 2</th>
                            <th>Remark</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up" id="so-data">
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                <div class="prepareted-by-submit">
                    <input type="hidden" name="status" value="requested">
                    <input type="hidden" name="created_by" value="<?= $pic ?>">
                    <button type="submit" class="button btn btn-info btn-submit">Create</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>

    <script>
        $(document).ready(function(){
            var so_no = 'input#fgtt-so';
            var data = [<?php echo $so_nos; ?>];
            var options = {
                source: data,
                minLength: 0
            };
            $(document).on('keydown.autocomplete', so_no, function() {
                $(this).autocomplete(options);
            });
            $(document).on('autocompleteselect', so_no, function(e, ui) {
                $('#fgtt-qty').val(ui.item.idx);
                var html_table = '';
                var items = ui.item.items;
                for(i = 0; i < items.length; i++){
                    html_table += '<tr>'+
                    '<td>'+(i+1)+'</td>'+
                    '<td>TNB 380/2016</td>'+
                    '<td>'+ui.item.label+'</td>'+
                    '<td>'+items[i]+'</td>'+
                    '<td>'+ui.item.model+'</td>'+
                    '<td>'+ui.item.version+'</td>'+
                    '<td>'+ui.item.type_1+'</td>'+
                    '<td>'+ui.item.type_2+'</td>'+
                    '<th></th>'+
                    '</tr>';
                }
                $('#so-data').html(html_table);
            });
        });
    </script>