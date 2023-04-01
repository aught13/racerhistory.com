<h2>Viewing #<?php echo $users_metadatum->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $users_metadatum->id; ?></dd>
	<br>
	<dt>Parent id</dt>
	<dd><?php echo $users_metadatum->parent_id; ?></dd>
	<br>
	<dt>Key</dt>
	<dd><?php echo $users_metadatum->key; ?></dd>
	<br>
	<dt>Value</dt>
	<dd><?php echo $users_metadatum->value; ?></dd>
	<br>
	<dt>User id</dt>
	<dd><?php echo $users_metadatum->user_id; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/users/metadatum/edit/'.$users_metadatum->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/users/metadatum', 'Back', array('class' => 'btn btn-default')); ?>
</div>
