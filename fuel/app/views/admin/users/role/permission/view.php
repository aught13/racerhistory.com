<h2>Viewing #<?php echo $users_role_permission->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $users_role_permission->id; ?></dd>
	<br>
	<dt>Role id</dt>
	<dd><?php echo $users_role_permission->role_id; ?></dd>
	<br>
	<dt>Perms id</dt>
	<dd><?php echo $users_role_permission->perms_id; ?></dd>
	<br>
	<dt>Actions</dt>
	<dd><?php echo $users_role_permission->actions; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/users/role/permission/edit/'.$users_role_permission->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/users/role/permission', 'Back', array('class' => 'btn btn-default')); ?>
</div>
