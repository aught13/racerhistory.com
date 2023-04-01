<h2>Viewing #<?php echo $users_user_role->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>User id</dt>
	<dd><?php echo $users_user_role->user_id; ?></dd>
	<br>
	<dt>Role id</dt>
	<dd><?php echo $users_user_role->role_id; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/users/user/role/edit/'.$users_user_role->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/users/user/role', 'Back', array('class' => 'btn btn-default')); ?>
</div>
