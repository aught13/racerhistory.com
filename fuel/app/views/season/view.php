<h2>Viewing <span class='muted'>#<?php echo $season->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $season->id; ?></p>
<p>
	<strong>Start:</strong>
	<?php echo $season->start; ?></p>
<p>
	<strong>End:</strong>
	<?php echo $season->end; ?></p>

<?php echo Html::anchor('season/edit/'.$season->id, 'Edit'); ?> |
<?php echo Html::anchor('season', 'Back'); ?>