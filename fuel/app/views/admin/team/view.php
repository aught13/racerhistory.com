<h2><?= $team->team_name; ?></h2>
<br>

<dl class="dl-horizontal">
    <dt>Sport</dt>
    <dd><?= $team->sports->sport_name; ?></dd>
    <br>
    <dt>Team name</dt>
    <dd><?= $team->team_name; ?></dd>
    <br>
    <dt>Team description</dt>
    <dd><?= $team->team_description; ?></dd>
    <br>
    <dt>Abbr</dt>
    <dd><?= $team->abbr; ?></dd>
    <br>
    <dt>Gender</dt>
    <dd><?= $team->gender; ?></dd>
    <br>
    <dt>Created</dt>
    <dd><?= $team->created_at; ?></dd>
    <br>
    <dt>Last Edit</dt>
    <dd><?= $team->updated_at; ?></dd>
    <br>
</dl>

<div class="btn-group">
    <?= Html::anchor('admin/team/edit/' . $team->id, 'Edit', array('class' => 'btn btn-warning')); ?>
    <?= Html::anchor('admin/team', 'Back', array('class' => 'btn btn-default')); ?>
</div>
<br><!-- seasons -->
<h2>Seasons</h2>
<br>

<?php if ($team->team_season): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
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
                <?php foreach ($team->team_season as $item): ?>
                    <tr>
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