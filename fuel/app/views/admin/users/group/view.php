<h2>Viewing #<?php echo $users_group->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $users_group->id; ?></dd>
	<br>
	<dt>Name</dt>
	<dd><?php echo $users_group->name; ?></dd>
	<br>
	<dt>User id</dt>
	<dd><?php echo $users_group->user_id; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/users/group/edit/'.$users_group->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/users/group', 'Back', array('class' => 'btn btn-default')); ?>
</div>
