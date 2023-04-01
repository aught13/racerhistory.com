<h2>Listing People</h2>
<br>

<?php if ($people): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>First</th>
                    <th>Last</th>
                    <th>Full</th>
                    <th>Display</th>
                    <th>Birth</th>
                    <th>Death</th>
                    <th>Person image</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($people as $item): ?>
                    <tr>
                        <td><?= $item->id; ?></td>
                        <td><?= $item->first; ?></td>
                        <td><?= $item->last; ?></td>
                        <td><?= $item->full; ?></td>
                        <td><?= $item->display; ?></td>
                        <td><?= $item->birth; ?></td>
                        <td><?= $item->death; ?></td>
                        <td><?= $item->person_image; ?></td>

                        <td>
                            <?= Html::anchor('admin/person/view/' . $item->id, 'View'); ?> |
                            <?= Html::anchor('admin/person/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/person/delete/' . $item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $pagination ?>
<?php else: ?>
    <p>No People.</p>
<?php endif; ?>

<p>
    <?= Html::anchor('admin/person/create', 'Add new Person', array('class' => 'btn btn-success')); ?>
</p>
