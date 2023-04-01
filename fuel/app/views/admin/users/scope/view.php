<h2>Viewing #<?php echo $users_scope->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $users_scope->id; ?></dd>
	<br>
	<dt>Scope</dt>
	<dd><?php echo $users_scope->scope; ?></dd>
	<br>
	<dt>Name</dt>
	<dd><?php echo $users_scope->name; ?></dd>
	<br>
	<dt>Description</dt>
	<dd><?php echo $users_scope->description; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/users/scope/edit/'.$users_scope->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/users/scope', 'Back', array('class' => 'btn btn-default')); ?>
</div>
