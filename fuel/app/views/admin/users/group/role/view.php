<h2>Viewing #<?php echo $users_group_role->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Group id</dt>
	<dd><?php echo $users_group_role->group_id; ?></dd>
	<br>
	<dt>Role id</dt>
	<dd><?php echo $users_group_role->role_id; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/users/group/role/edit/'.$users_group_role->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/users/group/role', 'Back', array('class' => 'btn btn-default')); ?>
</div>
