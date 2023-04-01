<h2>Viewing #<?= $team_season_roster->id; ?></h2>
<br>

<dl class="dl-horizontal">
    <dt>Id</dt>
    <dd><?= $team_season_roster->id; ?></dd>
    <br>
    <dt>Team</dt>
    <dd><?= $team_season_roster->team_season_id.' - '.($team_season_roster->team_season->semester == 1 ? $team_season_roster->team_season->seasons->start : ($team_season_roster->team_season->semester == 2 ? $team_season_roster->team_season->seasons->start.'-'.$team_season_roster->team_season->seasons->end : $team_season_roster->team_season->seasons->end)).' - '.$team_season_roster->team_season->teams->team_name; ?></dd>
    <br>
    <dt>Person</dt>
    <dd><?= Html::anchor('admin/person/edit/' .$team_season_roster->person_id,$team_season_roster->person_id.' - '.$team_season_roster->persons->display); ?></dd>
    <br>
    <dt>Roster year</dt>
    <dd><?= $team_season_roster->roster_year; ?></dd>
    <br>
    <dt>Roster number</dt>
    <dd><?= $team_season_roster->roster_number; ?></dd>
    <br>
    <dt>Roster position</dt>
    <dd><?= $team_season_roster->roster_position; ?></dd>
    <br>
    <dt>Roster height</dt>
    <dd><?= $team_season_roster->roster_height; ?></dd>
    <br>
    <dt>Roster weight</dt>
    <dd><?= $team_season_roster->roster_weight; ?></dd>
    <br>
</dl>

<div class="btn-group">
    <?= Html::anchor('admin/team/season/roster/edit/' . $team_season_roster->id, 'Edit', array('class' => 'btn btn-warning')); ?>
    <?= Html::anchor('admin/team/season/roster', 'Back', array('class' => 'btn btn-default')); ?>
</div>
