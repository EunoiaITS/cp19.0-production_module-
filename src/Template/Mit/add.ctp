<!--=========
MiT form page
==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Material Issue Ticket Form</b></div>
                <form action="#" class="planner-relative">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Date <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">01/01/2018</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">SO NO <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $sales->so->salesorder_no?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Customer Name <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase"><?= $sales->cus->name?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Model <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase"><?= $sales->model?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Version <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase"><?= $sales->version?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Type 1 <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">Indoor</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Type 2 <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">Motorized</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Quantity <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text"><?= $sales->quantity?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text text-uppercase">MIT NO <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text text-uppercase">MIT 12345</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">Create By <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">Malik</p>
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
                                <select class="form-control" name="" id="mit-form">
                                    <option value="indkom_16">INDKOM 16</option>
                                    <option value="indkom_24">INDKOM 24</option>
                                </select>
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
                            <th>Part No</th>
                            <th>Description</th>
                            <th>Used QTY</th>
                            <th>Request QTY</th>
                            <th>Section Stock Availability</th>
                            <th>Net QTY</th>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <?php $i=0;foreach($eng as $en):?>
                            <?php $i++;?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?= $en->partNo?></td>
                            <td><?= $en->partName?></td>
                            <td><?= $en->quality?></td>
                            <td><?= ($sales->quantity * $en->quality)?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                <div class="prepareted-by-submit">
                    <div class="button btn btn-info btn-submit">Submit</div>
                </div>
            </div>
        </div>
    </div>


