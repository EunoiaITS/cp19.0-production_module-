<!--=========
Production Planner page
==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Inventory Create</b></div>
            </div><!-- end mit title -->
        </div>

        <div class="clearfix"></div>

        <!--============== Add drawing table area ===================-->

        <div class="planner-table table-responsive clearfix">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>NO.</th>
                        <th>Part No</th>
                        <th>Part Name</th>
                        <th>Drawing No</th>
                        <th>Section</th>
                        <th>UOM</th>
                        <th>Current Qty</th>
                        <th>Zon</th>
                        <th>Rack No</th>
                        <th>Bin No</th>
                        <th>Level</th>
                        <th>Min Stock Level</th>
                        <th>Max Stock Level</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <tr>
                        <td>1</td>
                        <td>0233</td>
                        <td>Screw Cover</td>
                        <td>PDD-121-005</td>
                        <td></td>
                        <td>pcs</td>
                        <td>315</td>
                        <td>A</td>
                        <td>1</td>
                        <td>1-2</td>
                        <td>3</td>
                        <td>100</td>
                        <td>1000</td>
                        <td><button class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>0262</td>
                        <td>Speoal Twin Gasket</td>
                        <td>Lro28-3</td>
                        <td></td>
                        <td>pcs</td>
                        <td>500</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</button></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>0263</td>
                        <td>Spring Bearing Assembly</td>
                        <td>L15-Springs Bea</td>
                        <td></td>
                        <td>pcs</td>
                        <td>652</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</button></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>0264</td>
                        <td>Spring Hacder</td>
                        <td>L12-set off le</td>
                        <td></td>
                        <td>pcs</td>
                        <td>1000</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>

<!--Inventory edit popup
  ===================-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Inventory Edit </h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Inventory Title</th>
                        <th>Edit Option</th>
                    </tr>
                    </thead>
                    <tbody id="add-item-table">
                    <tr>
                        <td>1</td>
                        <td>Part No</td>
                        <td><input type="text" class="form-control" name="inPartNo"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Part Name</td>
                        <td><input type="text" class="form-control" name="inPartName"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Drawing No</td>
                        <td><input type="text" class="form-control" name="inDr"></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Section</td>
                        <td><input type="text" class="form-control" name="inSection"></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>UOM</td>
                        <td><input type="text" class="form-control" name="inUom"></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Current Qty</td>
                        <td><input type="text" class="form-control" name="inCurrent"></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Zon</td>
                        <td><input type="text" class="form-control" name="inZon"></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Rack No</td>
                        <td><input type="text" class="form-control" name="inRack"></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Bin No</td>
                        <td><input type="text" class="form-control" name="inBin"></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Level</td>
                        <td><input type="text" class="form-control" name="inLevel"></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Min Stock Level</td>
                        <td><input type="text" class="form-control" name="inMinLevel"></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Max Stock Level</td>
                        <td><input type="text" class="form-control" name="inMaxLevel"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>