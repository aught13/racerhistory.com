<h2>Viewing #<?php echo $users_session->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $users_session->id; ?></dd>
	<br>
	<dt>Client id</dt>
	<dd><?php echo $users_session->client_id; ?></dd>
	<br>
	<dt>Redirect uri</dt>
	<dd><?php echo $users_session->redirect_uri; ?></dd>
	<br>
	<dt>Type id</dt>
	<dd><?php echo $users_session->type_id; ?></dd>
	<br>
	<dt>Type</dt>
	<dd><?php echo $users_session->type; ?></dd>
	<br>
	<dt>Code</dt>
	<dd><?php echo $users_session->code; ?></dd>
	<br>
	<dt>Access token</dt>
	<dd><?php echo $users_session->access_token; ?></dd>
	<br>
	<dt>Stage</dt>
	<dd><?php echo $users_session->stage; ?></dd>
	<br>
	<dt>First requested</dt>
	<dd><?php echo $users_session->first_requested; ?></dd>
	<br>
	<dt>Last updated</dt>
	<dd><?php echo $users_session->last_updated; ?></dd>
	<br>
	<dt>Limited access</dt>
	<dd><?php echo $users_session->limited_access; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/users/session/edit/'.$users_session->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/users/session', 'Back', array('class' => 'btn btn-default')); ?>
</div>
