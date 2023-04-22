<h2>Viewing <span class='muted'>#<?php echo $place->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $place->id; ?></p>
<p>
	<strong>Place name:</strong>
	<?php echo $place->place_name; ?></p>
<p>
	<strong>Place state:</strong>
	<?php echo $place->place_state; ?></p>

<?php echo Html::anchor('place/edit/'.$place->id, 'Edit'); ?> |
<?php echo Html::anchor('place', 'Back'); ?>