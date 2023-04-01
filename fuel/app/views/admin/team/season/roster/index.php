<h2>Listing Team Rosters</h2>
<br>

<?php if ($team_season_rosters): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Team</th>
                    <th>Person</th>
                    <th>Roster year</th>
                    <th>Roster number</th>
                    <th>Roster position</th>
                    <th>Roster height</th>
                    <th>Roster weight</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($team_season_rosters as $item): ?>
                    <tr>
                        <td><?= $item->id; ?></td>
                        <td><?= ($item->team_season->semester == 1 ? $item->team_season->seasons->start : ($item->team_season->semester == 2 ? $item->team_season->seasons->start.'-'.$item->team_season->seasons->end : $item->team_season->seasons->end)).' - '.$item->team_season->teams->team_name; ?></td>
                        <td><?= $item->persons->display; ?></td>
                        <td><?= $item->roster_year; ?></td>
                        <td><?= $item->roster_number; ?></td>
                        <td><?= $item->roster_position; ?></td>
                        <td><?= $item->roster_height; ?></td>
                        <td><?= $item->roster_weight; ?></td>

                        <td>
                            <?= Html::anchor('admin/team/season/roster/view/' . $item->id, 'View'); ?> |
                            <?= Html::anchor('admin/team/season/roster/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/team/season/roster/delete/' . $item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $pagination ?>
<?php else: ?>
    <p>No Team_season_rosters.</p>
<?php endif; ?>

<p>
    <?= Html::anchor('admin/team/season/roster/create', 'Add new Team roster', array('class' => 'btn btn-success')); ?>
</p>
