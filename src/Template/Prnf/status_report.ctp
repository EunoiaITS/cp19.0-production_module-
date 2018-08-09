      <!--=========
      Production Planner page
      ==============-->

      <div class="planner-from">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
               <div class="part-title-planner text-uppercase text-center"><b>Production Reject Note Approval Status</b></div>
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
                        <th rowspan="2">Quantity</th>
                        <th rowspan="2">Document</th>
                        <th rowspan="2">Create By</th>
                        <th rowspan="2">Section</th>
                        <th colspan="4">Production</th>
                        <th colspan="2">Technical</th>
                        <th colspan="4">Quality Assurance</th>
                      </tr>
                      <tr class="table-cell">
                        <th>Status</th>
                        <th>Verify By</th>
                        <th>Status</th>
                        <th>Approve 1</th>
                        <th>Status</th>
                        <th>Approve 2</th>
                        <th>Status</th>
                        <th>Approve 3</th>
                        <th>Status</th>
                        <th>Approve 4</th>
                      </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <?php $i=0;foreach ($prnf as $p): $i++;?>
                        <tr>
                          <td><?= $i?></td>
                          <td><?= $p->date ?></td>
                          <td>PRN <?= $p->id ?></td>
                          <td><?= $p->part_no ?></td>
                          <td><?= $p->part_name ?></td>
                          <td><?= $p->description ?></td>
                          <td><?= $p->quantity ?></td>
                          <td><a href="#">View</a></td>
                          <td><?php if(isset($p->created_by)){echo $p->created_by;}?></td>
                          <td></td>
                          <td class="<?php if(isset($p->status)){if($p->status == "requested"){echo "colored-red";}elseif(isset($p->verified_by)){echo "colored-csn";}}?>"><?php if(isset($p->status)){if($p->status == "requested"){echo "Pending";}elseif(isset($p->verified_by)){echo "Verified";}}?></td>
                          <td><?php if(isset($p->verified_by)){echo $p->verified_by;}?></td>
                          <td class="<?php if(isset($p->status)){if($p->status == "verified"){echo "colored-red";}elseif(isset($p->approved1_by)){echo "colored-csn";}}?>"><?php if(isset($p->status)){if($p->status == "verified"){echo "Pending";}elseif(isset($p->approved1_by)){echo "Approved";}}?></td>
                          <td><?php if(isset($p->approved1_by)){echo $p->approved1_by;}?></td>
                          <td class="<?php if(isset($p->status)){if($p->status == "approved"){echo "colored-red";}elseif(isset($p->approved2_by)){echo "colored-csn";}}?>"><?php if(isset($p->status)){if($p->status == "approved"){echo "Pending";}elseif(isset($p->approved2_by)){echo "Approved";}}?></td>
                          <td><?php if(isset($p->approved2_by)){echo $p->approved2_by;}?></td>
                          <td class="<?php if(isset($p->status)){if($p->status == "approved1"){echo "colored-red";}elseif(isset($p->approved3_by)){echo "colored-csn";}}?>"><?php if(isset($p->status)){if($p->status == "approved1"){echo "Pending";}elseif(isset($p->approved3_by)){echo "Approved";}}?></td>
                          <td><?php if(isset($p->approved3_by)){echo $p->approved3_by;}?></td>
                          <td class="<?php if(isset($p->status)){if($p->status == "approved2"){echo "colored-red";}elseif(isset($p->approved4_by)){echo "colored-csn";}}?>"><?php if(isset($p->status)){if($p->status == "approved2"){echo "Pending";}elseif(isset($p->approved4_by)){echo "Approved";}}?></td>
                          <td class="<?php if(isset($p->approved4_by)){echo 'colored-csn';}?>"><?php if(isset($p->approved4_by)){echo $p->approved4_by;}?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                  </table>

              </div>
            </div>
        </div>
      </div>
