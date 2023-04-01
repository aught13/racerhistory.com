<h2>Viewing #<?php echo $game_eav->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $game_eav->id; ?></dd>
	<br>
	<dt>Game id</dt>
	<dd><?php echo $game_eav->game_id; ?></dd>
	<br>
	<dt>Key</dt>
	<dd><?php echo $game_eav->key; ?></dd>
	<br>
	<dt>Value</dt>
	<dd><?php echo $game_eav->value; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/game/eav/edit/'.$game_eav->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/game/eav', 'Back', array('class' => 'btn btn-default')); ?>
</div>
