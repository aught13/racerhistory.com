<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($users_user_permission) ? $users_user_permission->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('User id', 'user_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('user_id', Input::post('user_id', isset($users_user_permission) ? $users_user_permission->user_id : ''), array('class' => 'form-control', 'placeholder' => 'User id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Perms id', 'perms_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('perms_id', Input::post('perms_id', isset($users_user_permission) ? $users_user_permission->perms_id : ''), array('class' => 'form-control', 'placeholder' => 'Perms id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Actions', 'actions', array('class' => 'control-label')); ?>

			<?php echo Form::input('actions', Input::post('actions', isset($users_user_permission) ? $users_user_permission->actions : ''), array('class' => 'form-control', 'placeholder' => 'Actions')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/users/user/permission/view/'.$users_user_permission->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/users/user/permission', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/users/user/permission', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>