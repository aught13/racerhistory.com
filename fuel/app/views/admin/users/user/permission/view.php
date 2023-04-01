<h2>Viewing #<?php echo $users_user_permission->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $users_user_permission->id; ?></dd>
	<br>
	<dt>User id</dt>
	<dd><?php echo $users_user_permission->user_id; ?></dd>
	<br>
	<dt>Perms id</dt>
	<dd><?php echo $users_user_permission->perms_id; ?></dd>
	<br>
	<dt>Actions</dt>
	<dd><?php echo $users_user_permission->actions; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/users/user/permission/edit/'.$users_user_permission->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/users/user/permission', 'Back', array('class' => 'btn btn-default')); ?>
</div>
