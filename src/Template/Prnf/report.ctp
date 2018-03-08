      <!--=========
      Production Planner page
      ==============-->

      <div class="planner-from">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
               <div class="part-title-planner text-uppercase text-center"><b>Production Reject Note Report</b></div>
              </div><!-- end mit title -->
            </div>

            <div class="clearfix"></div>

           <!--============== Add drawing table area ===================-->

          <div class="planner-table table-responsive clearfix">
              <div class="col-sm-12">
               <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Date</th>
                        <th rowspan="2">PRN No</th>
                        <th rowspan="2">Part No</th>
                        <th rowspan="2">Part Name</th>
                        <th rowspan="2" >Description</th>
                        <th rowspan="2">QTY</th>
                        <th rowspan="2">Document</th>
                        <th rowspan="2">Create By</th>
                        <th rowspan="2">Section</th>
                        <th colspan="4">IQC</th>
                        <th colspan="6">Store</th>
                        <th colspan="4">Production</th>
                    
                      </tr>
                      <tr class="table-cell">
                        <th>Date</th>
                        <th>Ack Status</th>
                        <th>Verify By</th>
                        <th>Mdr No</th>
                        <th>Date</th>
                        <th>Ack Status</th>
                        <th>Receive By</th>
                        <th>Delivery Date</th>
                        <th>Delivery Qty</th>
                        <th>Delivery Status</th>
                        <th>Date</th>
                        <th>Ack Status</th>
                        <th>Ack By</th>
                        <th>Remark</th>
                      </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <?php $i=0;foreach ($prnf as $p):$i++;?>
                        <tr>
                          <td><?= $i ?></td>
                          <td><?= $p->date ?></td>
                          <td>PRN <?= $p->id ?></td>
                          <td><?= $p->part_no ?></td>
                          <td><?= $p->part_name ?></td>
                          <td><?= $p->description ?></td>
                          <td><?= $p->quantity ?></td>
                          <td><a href="<?php echo "../". $p->document ?>"><?php if(isset($p->document)){echo "View";}else{echo "";}?></a></td>
                          <td><?= $p->created_by ?></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
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
                    <?php endforeach;?>
                    </tbody>
                  </table>

              </div>
            </div>
        </div>
      </div>
