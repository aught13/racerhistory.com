<h2>Listing Stats</h2>
<br>

<?php if ($stats): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sport</th>
                    <th>Stat name</th>
                    <th>Stat table</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($stats as $item): ?>
                    <tr>
                        <td><?= $item->sports->sport_name; ?></td>
                        <td><?= $item->stat_name; ?></td>
                        <td><?= $item->stat_table; ?></td>

                        <td>
                            <?= Html::anchor('admin/stat/view/' . $item->id, 'View'); ?> |
                            <?= Html::anchor('admin/stat/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/stat/delete/' . $item->id, 'Delete', ['onclick' => "return confirm('Are you sure?')"]); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $pagination ?>
<?php else: ?>
    <p>No Stats.</p>
<?php endif; ?>

<p>
    <?= Html::anchor('admin/stat/create', 'Add new Stat', array('class' => 'btn btn-success')); ?>
</p>
