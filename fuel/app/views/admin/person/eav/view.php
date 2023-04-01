<h2>Viewing #<?php echo $person_eav->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $person_eav->id; ?></dd>
	<br>
	<dt>Parent id</dt>
	<dd><?php echo $person_eav->parent_id; ?></dd>
	<br>
	<dt>Key</dt>
	<dd><?php echo $person_eav->key; ?></dd>
	<br>
	<dt>Value</dt>
	<dd><?php echo $person_eav->value; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/person/eav/edit/'.$person_eav->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/person/eav', 'Back', array('class' => 'btn btn-default')); ?>
</div>
