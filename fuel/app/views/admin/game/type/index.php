<h2>Listing Game types</h2>
<br>

<?php if ($game_types): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Game type name</th>
                    <th>Post</th>
                    <th>Conf</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($game_types as $item): ?>
                    <tr>
                        <td><?= $item->id; ?></td>
                        <td><?= $item->game_type_name; ?></td>
                        <td><?= $item->post; ?></td>
                        <td><?= $item->conf; ?></td>

                        <td>
                            <?= Html::anchor('admin/game/type/view/' . $item->id, 'View'); ?> |
                            <?= Html::anchor('admin/game/type/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/game/type/delete/' . $item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $pagination ?>
<?php else: ?>
    <p>No Game_types.</p>
<?php endif; ?>

<p>
    <?= Html::anchor('admin/game/type/create', 'Add new Game type', array('class' => 'btn btn-success')); ?>
</p>
