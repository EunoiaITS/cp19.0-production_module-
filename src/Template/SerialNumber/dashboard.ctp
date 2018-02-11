<div class="container-fluid">
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th>Part No</th>
            <th>Part Name</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data as $d): ?>
            <tr>
                <td><?= $d->partNo ?></td>
                <td><?= $d->partName ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>