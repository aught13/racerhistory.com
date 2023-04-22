<h2>Viewing <span class='muted'>#<?php echo $game_type->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $game_type->id; ?></p>
<p>
	<strong>Game type name:</strong>
	<?php echo $game_type->game_type_name; ?></p>
<p>
	<strong>Post:</strong>
	<?php echo $game_type->post; ?></p>
<p>
	<strong>Conf:</strong>
	<?php echo $game_type->conf; ?></p>

<?php echo Html::anchor('game/type/edit/'.$game_type->id, 'Edit'); ?> |
<?php echo Html::anchor('game/type', 'Back'); ?>