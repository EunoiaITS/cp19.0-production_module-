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
                                <label for="wip-model-section" class="ps-month">Section <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <select class="form-control" name="section" id="wip-ps-section">
                                    <option value="wel">Welding</option>
                                    <option value="main">Main Line Tank</option>
                                    <option value="dm">Drive Mechanism</option>
                                    <option value="vc">Vacuum Chamber</option>
                                    <option value="weld">Welding</option>
                                    <option value="bta">BTA</option>
                                    <option value="mc">Metal Clad</option>
                                    <option value="wir">Wiring</option>
                                    <option value="test">Testing</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="cn-text">QTY Produce <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="cn-main-text">60</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="model-planer" class="ps-month">Month <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <select class="form-control" name="month" id="ps-year">
                                    <option value="jan">January</option>
                                    <option value="feb">February</option>
                                    <option value="march">March</option>
                                    <option value="apr">April</option>
                                    <option value="may">May</option>
                                    <option value="june">June</option>
                                    <option value="july">July</option>
                                    <option value="aug">August</option>
                                    <option value="sep">September</option>
                                    <option value="oct">October</option>
                                    <option value="nov">November</option>
                                    <option value="dec">December</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <label for="model-planer" class="ps-month">Year <span class="planner-fright">:</span></label>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <select name="year" class="form-control" name="" id="ps-year">
                                    <?php for($i=1980;$i<2025;$i++){
                                        echo "<option value='$i'>$i</option>";
                                    }?>

                                </select>
                            </div>
                        </div>
                        <div class="pre col-sm-8">
                            <div class="button btn btn-info" style="float: right;">Generate</div>
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
                            <th rowspan="2">No</th>
                            <th rowspan="2">Operator Name</th>
                            <th colspan="2">RMU INS 24</th>
                            <th colspan="2">RMU INS 24(VIOTORZEI)</th>
                            <th colspan="2">CSU</th>
                            <th colspan="2">JMW</th>
                            <th colspan="2">JMW - ARAB</th>
                            <th rowspan="2">Remark</th>
                        </tr>
                        <tr class="table-cells">
                            <td>Act</td>
                            <td>Reject</td>
                            <td>Act</td>
                            <td>Reject</td>
                            <td>Act</td>
                            <td>Reject</td>
                            <td>Act</td>
                            <td>Reject</td>
                            <td>Act</td>
                            <td>Reject</td>
                        </tr>
                        </thead>
                        <tbody class="csn-text-up">
                        <tr>
                            <td>1</td>
                            <td>Roslan</td>
                            <td>20</td>
                            <td>0</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                <div class="prepareted-by-csn">
                    <div class="button btn btn-info">Create</div>
                </div>
            </div>
        </div>
    </div>