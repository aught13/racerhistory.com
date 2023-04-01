<h2>Viewing #<?php echo $users_group_permission->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $users_group_permission->id; ?></dd>
	<br>
	<dt>Group id</dt>
	<dd><?php echo $users_group_permission->group_id; ?></dd>
	<br>
	<dt>Perms id</dt>
	<dd><?php echo $users_group_permission->perms_id; ?></dd>
	<br>
	<dt>Actions</dt>
	<dd><?php echo $users_group_permission->actions; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/users/group/permission/edit/'.$users_group_permission->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/users/group/permission', 'Back', array('class' => 'btn btn-default')); ?>
</div>
