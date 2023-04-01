<h2>Viewing #<?php echo $users_client->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $users_client->id; ?></dd>
	<br>
	<dt>Name</dt>
	<dd><?php echo $users_client->name; ?></dd>
	<br>
	<dt>Client id</dt>
	<dd><?php echo $users_client->client_id; ?></dd>
	<br>
	<dt>Client secret</dt>
	<dd><?php echo $users_client->client_secret; ?></dd>
	<br>
	<dt>Redirect uri</dt>
	<dd><?php echo $users_client->redirect_uri; ?></dd>
	<br>
	<dt>Auto approve</dt>
	<dd><?php echo $users_client->auto_approve; ?></dd>
	<br>
	<dt>Autonomous</dt>
	<dd><?php echo $users_client->autonomous; ?></dd>
	<br>
	<dt>Status</dt>
	<dd><?php echo $users_client->status; ?></dd>
	<br>
	<dt>Suspended</dt>
	<dd><?php echo $users_client->suspended; ?></dd>
	<br>
	<dt>Notes</dt>
	<dd><?php echo $users_client->notes; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/users/client/edit/'.$users_client->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/users/client', 'Back', array('class' => 'btn btn-default')); ?>
</div>
