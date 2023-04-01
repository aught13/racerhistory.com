<h2>Viewing <?= $person->display; ?></h2>
<br>

<dl class="dl-horizontal">
    <dt>First</dt>
    <dd><?= $person->first; ?></dd>
    <br>
    <dt>Last</dt>
    <dd><?= $person->last; ?></dd>
    <br>
    <dt>Full</dt>
    <dd><?= $person->full; ?></dd>
    <br>
    <dt>Display</dt>
    <dd><?= $person->display; ?></dd>
    <br>
    <dt>Birth</dt>
    <dd><?= $person->birth; ?></dd>
    <br>
    <dt>Death</dt>
    <dd><?= $person->death; ?></dd>
    <br>
    <dt>Person image</dt>
    <dd><?= $person->person_image; ?></dd>
    <br>
</dl>

<div class="btn-group">
    <?= Html::anchor('admin/person/edit/' . $person->id, 'Edit', array('class' => 'btn btn-warning')); ?>
    <?= Html::anchor('admin/person', 'Back', array('class' => 'btn btn-default')); ?>
</div>

<h2>Teams</h2>
<?php if ($person->team_season_roster): ?>
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
                <?php foreach ($person->team_season_roster as $item): ?>
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

<?php else: ?>
    <p>No Team_season_rosters.</p>
<?php endif; ?>

<p>
    <?= Html::anchor('admin/team/season/roster/create', 'Add new Team roster', array('class' => 'btn btn-success')); ?>
</p>