<div class="product-list">
    <div class="container-fluid sm-fluid">
        <div class="row">
            <h2 class="part-title-planner text-uppercase text-center"><b>Store Stock Out Inventory Record</b></h2>
            <div class="product-masterlist all-list-item clearfix">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="fleft-label" for="section">Section <span class="fright">:</span></label>
                        <select class="form-control" id="section" name="section">
                            <option value=""></option>
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
                    <a id="section-picker" href="">
                        <button type="button" class="button btn btn-info">Submit</button>
                    </a>
                </div>
                <div class="clearfix"></div>
                <div class="planner-table table-responsive clearfix" style="margin:30px 10px">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th rowspan="2">NO</th>
                            <th rowspan="2">Date</th>
                            <th rowspan="2">Part No</th>
                            <th rowspan="2">Part Name</th>
                            <th rowspan="2">SO No</th>
                            <th rowspan="2">Tender No</th>
                            <th colspan="2">Stock-In Type</th>

                            <th rowspan="2">Current Balance</th>
                            <th rowspan="2">Total Quantity</th>
                            <th rowspan="2">Create By</th>
                            <th rowspan="2">Section</th>
                            <th colspan="4">Location</th>
                            <th rowspan="2">Document</th>
                            <th rowspan="2">Remark</th>
                        </tr>
                        <tr class="table-cells">
                            <th>MIT/MR/PRN No</th>
                            <th>Quantity</th>
                            <th>Zon</th>
                            <th>Rack No</th>
                            <th>Bin No</th>
                            <th>Level</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 0;foreach ($pm as $p): $count++;?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= date('Y-m-d',strtotime($p->date)) ?></td>
                            <td><?= $p->part_no ?></td>
                            <td><?= $p->part_name ?></td>
                            <td><?= $p->so_no ?></td>
                            <td><?= $p->tender_no ?></td>
                            <td><?php if(isset($p->mit_no)){echo $p->mit_no;}elseif (isset($p->prn_no)){echo $p->prn_no;}elseif(isset($p->pr_no)){echo $p->pr_no;} ?></td>
                            <td><?= $p->quantity ?></td>
                            <td><?= $p->current_balance ?></td>
                            <td><?= $p->quantity + $p->current_balance ?></td>
                            <td><?= $p->pic_store ?></td>
                            <td><?= $p->section ?></td>
                            <td><?= $p->zon ?></td>
                            <td><?= $p->rack_no ?></td>
                            <td><?= $p->bin_no ?></td>
                            <td><?= $p->level ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#section').on('change',function (e) {
            e.preventDefault();
            var param = this.value;
            var url = "<?php echo $this->Url->build(['controller'=> 'Inventory','action'=>'stockOutRecord'])?>";
            $('#section-picker').attr('href',url+"?section="+param);
        });
    });
</script>