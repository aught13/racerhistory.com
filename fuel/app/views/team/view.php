<h2>Viewing <span class='muted'>#<?php echo $team->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $team->id; ?></p>
<p>
	<strong>Sport id:</strong>
	<?php echo $team->sport_id; ?></p>
<p>
	<strong>Team name:</strong>
	<?php echo $team->team_name; ?></p>
<p>
	<strong>Team description:</strong>
	<?php echo $team->team_description; ?></p>
<p>
	<strong>Abbr:</strong>
	<?php echo $team->abbr; ?></p>
<p>
	<strong>Gender:</strong>
	<?php echo $team->gender; ?></p>

<?php echo Html::anchor('team/edit/'.$team->id, 'Edit'); ?> |
<?php echo Html::anchor('team', 'Back'); ?>