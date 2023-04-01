<h2><?= $season->start.' - '.$season->end; ?></h2>
<br>

<dl class="dl-horizontal">
    <dt>Id</dt>
    <dd><?= $season->id; ?></dd>
    <br>
    <dt>Start</dt>
    <dd><?= $season->start; ?></dd>
    <br>
    <dt>End</dt>
    <dd><?= $season->end; ?></dd>
    <br>
</dl>

<div class="btn-group">
    <?= Html::anchor('admin/season/edit/' . $season->id, 'Edit', array('class' => 'btn btn-warning')); ?>
    <?= Html::anchor('admin/season', 'Back', array('class' => 'btn btn-default')); ?>
</div>

<h2>Teams</h2>
<br>

<?php if ($season->team_season): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Team</th>
                    <th>Season</th>
                    <th>Semester</th>
                    <th>League finish</th>
                    <th>League torunament finish</th>
                    <th>Last post game</th>
                    <th>Team season notes</th>
                    <th>Team season image</th>
                    <th>Team season preview</th>
                    <th>Team season recap</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($season->team_season as $item): ?>
                    <tr>
                        <td><?= $item->id; ?></td>
                        <td><?= $item->teams->team_name; ?></td>
                        <td><?= ($item->semester == 1 ? $item->seasons->start : ($item->semester == 2 ? $item->seasons->start.'-'.$item->seasons->end : $item->seasons->end)); ?></td>
                        <td><?= ($item->semester == 1 ? 'Fall' : ($item->semester == 2 ? 'Winter' : 'Spring')); ?></td>
                        <td><?= $item->league_finish; ?></td>
                        <td><?= $item->league_torunament_finish; ?></td>
                        <td><?= $item->last_post_game; ?></td>
                        <td><?= $item->team_season_notes; ?></td>
                        <td><?= $item->team_season_image; ?></td>
                        <td><?= $item->team_season_preview; ?></td>
                        <td><?= $item->team_season_recap; ?></td>

                        <td>
                            <?= Html::anchor('admin/team/season/view/' . $item->id, 'View'); ?> |
                            <?= Html::anchor('admin/team/season/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/team/season/delete/' . $item->id, 'Delete', ['onclick' => "return confirm('Are you sure?')"]); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php else: ?>
    <p>No Team Seasons.</p>
<?php endif; ?>

<p>
    <?= Html::anchor('admin/team/season/create', 'Add new Team season', ['class' => 'btn btn-success']); ?>
</p>

