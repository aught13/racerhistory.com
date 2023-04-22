<h2>Viewing <span class='muted'>#<?php echo $team_season_roster->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $team_season_roster->id; ?></p>
<p>
	<strong>Team season id:</strong>
	<?php echo $team_season_roster->team_season_id; ?></p>
<p>
	<strong>Person id:</strong>
	<?php echo $team_season_roster->person_id; ?></p>
<p>
	<strong>Roster year:</strong>
	<?php echo $team_season_roster->roster_year; ?></p>
<p>
	<strong>Roster number:</strong>
	<?php echo $team_season_roster->roster_number; ?></p>
<p>
	<strong>Roster position:</strong>
	<?php echo $team_season_roster->roster_position; ?></p>
<p>
	<strong>Roster height:</strong>
	<?php echo $team_season_roster->roster_height; ?></p>
<p>
	<strong>Roster weight:</strong>
	<?php echo $team_season_roster->roster_weight; ?></p>

<?php echo Html::anchor('team/season/roster/edit/'.$team_season_roster->id, 'Edit'); ?> |
<?php echo Html::anchor('team/season/roster', 'Back'); ?>