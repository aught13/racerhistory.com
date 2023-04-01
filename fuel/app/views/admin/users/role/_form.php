<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($users_role) ? $users_role->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class' => 'control-label')); ?>

			<?php echo Form::input('name', Input::post('name', isset($users_role) ? $users_role->name : ''), array('class' => 'form-control', 'placeholder' => 'Name')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Filter', 'filter', array('class' => 'control-label')); ?>

			<?php echo Form::input('filter', Input::post('filter', isset($users_role) ? $users_role->filter : ''), array('class' => 'form-control', 'placeholder' => 'Filter')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('User id', 'user_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('user_id', Input::post('user_id', isset($users_role) ? $users_role->user_id : ''), array('class' => 'form-control', 'placeholder' => 'User id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/users/role/view/'.$users_role->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/users/role', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/users/role', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>