<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($users_scope) ? $users_scope->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Scope', 'scope', array('class' => 'control-label')); ?>

			<?php echo Form::input('scope', Input::post('scope', isset($users_scope) ? $users_scope->scope : ''), array('class' => 'form-control', 'placeholder' => 'Scope')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class' => 'control-label')); ?>

			<?php echo Form::input('name', Input::post('name', isset($users_scope) ? $users_scope->name : ''), array('class' => 'form-control', 'placeholder' => 'Name')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class' => 'control-label')); ?>

			<?php echo Form::input('description', Input::post('description', isset($users_scope) ? $users_scope->description : ''), array('class' => 'form-control', 'placeholder' => 'Description')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/users/scope/view/'.$users_scope->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/users/scope', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/users/scope', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>