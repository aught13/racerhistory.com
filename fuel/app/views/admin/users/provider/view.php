<h2>Viewing #<?php echo $users_provider->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $users_provider->id; ?></dd>
	<br>
	<dt>Parent id</dt>
	<dd><?php echo $users_provider->parent_id; ?></dd>
	<br>
	<dt>Provider</dt>
	<dd><?php echo $users_provider->provider; ?></dd>
	<br>
	<dt>Uid</dt>
	<dd><?php echo $users_provider->uid; ?></dd>
	<br>
	<dt>Secret</dt>
	<dd><?php echo $users_provider->secret; ?></dd>
	<br>
	<dt>Access token</dt>
	<dd><?php echo $users_provider->access_token; ?></dd>
	<br>
	<dt>Expires</dt>
	<dd><?php echo $users_provider->expires; ?></dd>
	<br>
	<dt>Refresh token</dt>
	<dd><?php echo $users_provider->refresh_token; ?></dd>
	<br>
	<dt>User id</dt>
	<dd><?php echo $users_provider->user_id; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/users/provider/edit/'.$users_provider->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/users/provider', 'Back', array('class' => 'btn btn-default')); ?>
</div>
