<h2>Viewing #<?php echo $user->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>User Id</dt>
	<dd><?php echo $user->user_id; ?></dd>
	<br>
	<dt>Username</dt>
	<dd><?php echo $user->username; ?></dd>
        <br>
        <dt>Full Name</dt>
        <dd><?php echo isset($user->fullname) ? $user->fullname : ''; ?></dd>
	<br>
	<dt>Group</dt>
	<dd><?php echo $user->group_id; ?> - <?php echo $user->group->name ?></dd>
	<br>
	<dt>Email</dt>
	<dd><?php echo $user->email; ?></dd>
	<br>
	<dt>Last login</dt>
	<dd><?php echo $user->last_login; ?></dd>
	<br>
	<dt>Previous login</dt>
	<dd><?php echo $user->previous_login; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/user/edit/'.$user->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/user', 'Back', array('class' => 'btn btn-default')); ?>
</div>
