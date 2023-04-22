<h2>Viewing <span class='muted'>#<?php echo $team_season->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $team_season->id; ?></p>
<p>
	<strong>Team id:</strong>
	<?php echo $team_season->team_id; ?></p>
<p>
	<strong>Season id:</strong>
	<?php echo $team_season->season_id; ?></p>
<p>
	<strong>Semester:</strong>
	<?php echo $team_season->semester; ?></p>
<p>
	<strong>League finish:</strong>
	<?php echo $team_season->league_finish; ?></p>
<p>
	<strong>League torunament finish:</strong>
	<?php echo $team_season->league_torunament_finish; ?></p>
<p>
	<strong>Last post game:</strong>
	<?php echo $team_season->last_post_game; ?></p>
<p>
	<strong>Team season notes:</strong>
	<?php echo $team_season->team_season_notes; ?></p>
<p>
	<strong>Team season image:</strong>
	<?php echo $team_season->team_season_image; ?></p>
<p>
	<strong>Team season preview:</strong>
	<?php echo $team_season->team_season_preview; ?></p>
<p>
	<strong>Team season recap:</strong>
	<?php echo $team_season->team_season_recap; ?></p>

<?php echo Html::anchor('team/season/edit/'.$team_season->id, 'Edit'); ?> |
<?php echo Html::anchor('team/season', 'Back'); ?>