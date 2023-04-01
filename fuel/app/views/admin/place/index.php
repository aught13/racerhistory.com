<h2>Listing Places</h2>
<br>

<?php if ($places): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Place name</th>
                    <th>Place state</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($places as $item): ?>
                    <tr>
                        <td><?= $item->id; ?></td>
                        <td><?= $item->place_name; ?></td>
                        <td><?= $item->place_state; ?></td>

                        <td>
                            <?= Html::anchor('admin/place/view/' . $item->id, 'View'); ?> |
                            <?= Html::anchor('admin/place/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/place/delete/' . $item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $pagination ?>
<?php else: ?>
    <p>No Places.</p>
<?php endif; ?>

<p>
    <?= Html::anchor('admin/place/create', 'Add new Place', array('class' => 'btn btn-success')); ?>
</p>
