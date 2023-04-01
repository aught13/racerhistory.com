<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($person_eav) ? $person_eav->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Parent id', 'parent_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('parent_id', Input::post('parent_id', isset($person_eav) ? $person_eav->parent_id : ''), array('class' => 'form-control', 'placeholder' => 'Parent id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Key', 'key', array('class' => 'control-label')); ?>

			<?php echo Form::input('key', Input::post('key', isset($person_eav) ? $person_eav->key : ''), array('class' => 'form-control', 'placeholder' => 'Key')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Value', 'value', array('class' => 'control-label')); ?>

			<?php echo Form::input('value', Input::post('value', isset($person_eav) ? $person_eav->value : ''), array('class' => 'form-control', 'placeholder' => 'Value')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/person/eav/view/'.$person_eav->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/person/eav', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/person/eav', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>