<h2>Listing Opponents</h2>
<br>

<?php if ($opponents): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Place</th>
                    <th>Opponent name</th>
                    <th>Opponent mascot</th>
                    <th>Opponent current</th>
                    <th>Opponent short</th>
                    <th>Opponent abbr</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($opponents as $item): ?>
                    <tr>
                        <td><?= ($item->places->place_name ?? 'N/A').(isset($item->places->place_state) ? ', '.$item->places->place_state ?? '' : ''); ?></td>
                        <td><?= $item->opponent_name; ?></td>
                        <td><?= $item->opponent_mascot; ?></td>
                        <td><?= $item->opponent_current; ?></td>
                        <td><?= $item->opponent_short; ?></td>
                        <td><?= $item->opponent_abbr; ?></td>

                        <td>
                            <?= Html::anchor('admin/opponent/view/' . $item->id, 'View'); ?> |
                            <?= Html::anchor('admin/opponent/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/opponent/delete/' . $item->id, 'Delete', ['onclick' => "return confirm('Are you sure?')"]); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $pagination ?>
<?php else: ?>
    <p>No Opponents.</p>
<?php endif; ?>

<p>
    <?= Html::anchor('admin/opponent/create', 'Add new Opponent', ['class' => 'btn btn-success']); ?>
</p>
