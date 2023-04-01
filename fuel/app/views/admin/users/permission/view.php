<h2>Viewing #<?php echo $users_permission->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $users_permission->id; ?></dd>
	<br>
	<dt>Area</dt>
	<dd><?php echo $users_permission->area; ?></dd>
	<br>
	<dt>Permission</dt>
	<dd><?php echo $users_permission->permission; ?></dd>
	<br>
	<dt>Description</dt>
	<dd><?php echo $users_permission->description; ?></dd>
	<br>
	<dt>Actions</dt>
	<dd><?php echo $users_permission->actions; ?></dd>
	<br>
	<dt>User id</dt>
	<dd><?php echo $users_permission->user_id; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/users/permission/edit/'.$users_permission->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/users/permission', 'Back', array('class' => 'btn btn-default')); ?>
</div>
