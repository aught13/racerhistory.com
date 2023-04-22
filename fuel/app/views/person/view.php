<h2>Viewing <span class='muted'>#<?php echo $person->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $person->id; ?></p>
<p>
	<strong>First:</strong>
	<?php echo $person->first; ?></p>
<p>
	<strong>Last:</strong>
	<?php echo $person->last; ?></p>
<p>
	<strong>Full:</strong>
	<?php echo $person->full; ?></p>
<p>
	<strong>Display:</strong>
	<?php echo $person->display; ?></p>
<p>
	<strong>Birth:</strong>
	<?php echo $person->birth; ?></p>
<p>
	<strong>Death:</strong>
	<?php echo $person->death; ?></p>
<p>
	<strong>Person image:</strong>
	<?php echo $person->person_image; ?></p>

<?php echo Html::anchor('person/edit/'.$person->id, 'Edit'); ?> |
<?php echo Html::anchor('person', 'Back'); ?>