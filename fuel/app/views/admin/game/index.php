<h2>Listing Games</h2>
<br>

<?php if ($games): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Season</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Opponent</th>
                    <th>Place</th>
                    <th>Site</th>
                    <th></th>
                    <th>Post?</th>
                    <th>W/L</th>
                    <th>Murray</th>
                    <th>Opponent</th>
                    <th>Mur rk</th>
                    <th>Opp rk</th>
                    <th>Periods</th>
                    <th>Ot</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($games as $item): ?>
                    <tr>
                        <td><?= $item->team_season->seasons->start.'-'.$item->team_season->seasons->end.' - '.$item->team_season->teams->team_name; ?></td>
                        <td><?= $item->game_date; ?></td>
                        <td><?= $item->game_types->game_type_name; ?></td>
                        <td><?= $item->opponents->opponent_short; ?></td>
                        <td><?= $item->places->place_name; ?></td>
                        <td><?= empty($item->site_id) ? '' : $item->sites->site_name; ?></td>
                        <td><?= $item->hrn == '1' ? 'Home' : ($item->hrn == '2' ? 'Road' : 'Neutral'); ?></td>
                        <td><?= $item->post == '1' ? 'Yes' : 'No'; ?></td>
                        <td><?= $item->w == '1' ? 'W' : ($item->l == '1' ? 'L' : ''); ?></td>
                        <td><?= $item->pts_mur; ?></td>
                        <td><?= $item->pts_opp; ?></td>
                        <td><?= $item->mur_rk; ?></td>
                        <td><?= $item->opp_rk; ?></td>
                        <td><?= $item->periods; ?></td>
                        <td><?= $item->ot; ?></td>
                        <td>
                            <?= Html::anchor('admin/game/view/' . $item->id, 'View'); ?> |
                            <?= Html::anchor('admin/game/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/game/delete/' . $item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $pagination ?>
<?php else: ?>
    <p>No Games.</p>
<?php endif; ?>

<p>
    <?= Html::anchor('admin/game/create', 'Add new Game', array('class' => 'btn btn-success')); ?>
</p>
