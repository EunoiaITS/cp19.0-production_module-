<div class="product-list">
    <div class="container">
        <div class="row">
            <div class="product-masterlist all-list-item finish-good-padding clearfix">
                <h2 class="part-title-planner text-uppercase text-center"><b>Store Report</b></h2>
                <div class="clearfix"></div>
                <div class="product-list-table clearfix">
                    <table class="table table-bordered table2excel">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date Received</th>
                            <th>Aging</th>
                            <th>Tender No</th>
                            <th>Part No</th>
                            <th>Part Name</th>
                            <th>UOM</th>
                            <th>Quantity</th>
                            <th>PIC Store</th>
                            <th>Zon</th>
                            <th>Rack No</th>
                            <th>Bin No</th>
                            <th>Level</th>
                            <th>Min  Stock Level</th>
                            <th>Max Stock Level</th>
                            <th>Remarks</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count=0; foreach ($inventory as $inventory): $count++;?>
                            <tr>
                                <td><?= $count ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?= h($inventory->part_no) ?></td>
                                <td><?= h($inventory->part_name) ?></td>
                                <td><?= h($inventory->uom) ?></td>
                                <td></td>
                                <td></td>
                                <td><?= h($inventory->zon) ?></td>
                                <td><?= h($inventory->rack) ?></td>
                                <td><?= h($inventory->bn) ?></td>
                                <td><?= h($inventory->product_level) ?></td>
                                <td><?= h($inventory->min_stock) ?></td>
                                <td><?= h($inventory->max_stock) ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- pagination -->
                <div class="pagination-indkom pull-right">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
</div>s