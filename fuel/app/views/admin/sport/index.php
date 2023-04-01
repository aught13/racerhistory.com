<h2>Listing Sports</h2>
<br>

<?php if ($sports): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Sport name</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($sports as $item): ?>
                    <tr>
                        <td><?= $item->id; ?></td>
                        <td><?= $item->sport_name; ?></td>

                        <td>
                            <?= Html::anchor('admin/sport/view/' . $item->id, 'View'); ?> |
                            <?= Html::anchor('admin/sport/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/sport/delete/' . $item->id, 'Delete', ['onclick' => "return confirm('Are you sure?')"]); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $pagination ?>
<?php else: ?>
    <p>No Sports.</p>
<?php endif; ?>

<p>
    <?= Html::anchor('admin/sport/create', 'Add new Sport', array('class' => 'btn btn-success')); ?>
</p>
