<h2>Viewing <span class='muted'>#<?php echo $stat->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $stat->id; ?></p>
<p>
	<strong>Sport id:</strong>
	<?php echo $stat->sport_id; ?></p>
<p>
	<strong>Stat name:</strong>
	<?php echo $stat->stat_name; ?></p>
<p>
	<strong>Stat table:</strong>
	<?php echo $stat->stat_table; ?></p>

<?php echo Html::anchor('stat/edit/'.$stat->id, 'Edit'); ?> |
<?php echo Html::anchor('stat', 'Back'); ?>