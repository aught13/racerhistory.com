<h2>Listing Sites</h2>
<br>

<?php if ($sites): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Place</th>
                    <th>Site name</th>
                    <th>Capacity</th>
                    <th>Site image</th>
                    <th>Site info</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($sites as $item): ?>
                    <tr>
                        <td><?= $item->id; ?></td>
                        <td><?= $item->places->place_name.', '.$item->places->place_state; ?></td>
                        <td><?= $item->site_name; ?></td>
                        <td><?= $item->capacity; ?></td>
                        <td><?= $item->site_image; ?></td>
                        <td><?= $item->site_info; ?></td>

                        <td>
                            <?= Html::anchor('admin/site/view/' . $item->id, 'View'); ?> |
                            <?= Html::anchor('admin/site/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/site/delete/' . $item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $pagination ?>
<?php else: ?>
    <p>No Sites.</p>
<?php endif; ?>

<p>
    <?= Html::anchor('admin/site/create', 'Add new Site', array('class' => 'btn btn-success')); ?>
</p>
