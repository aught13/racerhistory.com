<h2>Viewing <span class='muted'>#<?php echo $sport->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $sport->id; ?></p>
<p>
	<strong>Sport name:</strong>
	<?php echo $sport->sport_name; ?></p>

<?php echo Html::anchor('sport/edit/'.$sport->id, 'Edit'); ?> |
<?php echo Html::anchor('sport', 'Back'); ?>