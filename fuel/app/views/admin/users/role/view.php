<h2>Viewing #<?php echo $users_role->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $users_role->id; ?></dd>
	<br>
	<dt>Name</dt>
	<dd><?php echo $users_role->name; ?></dd>
	<br>
	<dt>Filter</dt>
	<dd><?php echo $users_role->filter; ?></dd>
	<br>
	<dt>User id</dt>
	<dd><?php echo $users_role->user_id; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/users/role/edit/'.$users_role->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/users/role', 'Back', array('class' => 'btn btn-default')); ?>
</div>
