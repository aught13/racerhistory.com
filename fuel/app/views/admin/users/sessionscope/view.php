<h2>Viewing #<?php echo $users_sessionscope->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $users_sessionscope->id; ?></dd>
	<br>
	<dt>Session id</dt>
	<dd><?php echo $users_sessionscope->session_id; ?></dd>
	<br>
	<dt>Access token</dt>
	<dd><?php echo $users_sessionscope->access_token; ?></dd>
	<br>
	<dt>Scope</dt>
	<dd><?php echo $users_sessionscope->scope; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/users/sessionscope/edit/'.$users_sessionscope->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/users/sessionscope', 'Back', array('class' => 'btn btn-default')); ?>
</div>
