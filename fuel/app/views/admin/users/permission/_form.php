<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($users_permission) ? $users_permission->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Area', 'area', array('class' => 'control-label')); ?>

			<?php echo Form::input('area', Input::post('area', isset($users_permission) ? $users_permission->area : ''), array('class' => 'form-control', 'placeholder' => 'Area')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Permission', 'permission', array('class' => 'control-label')); ?>

			<?php echo Form::input('permission', Input::post('permission', isset($users_permission) ? $users_permission->permission : ''), array('class' => 'form-control', 'placeholder' => 'Permission')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class' => 'control-label')); ?>

			<?php echo Form::input('description', Input::post('description', isset($users_permission) ? $users_permission->description : ''), array('class' => 'form-control', 'placeholder' => 'Description')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Actions', 'actions', array('class' => 'control-label')); ?>

			<?php echo Form::input('actions', Input::post('actions', isset($users_permission) ? $users_permission->actions : ''), array('class' => 'form-control', 'placeholder' => 'Actions')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('User id', 'user_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('user_id', Input::post('user_id', isset($users_permission) ? $users_permission->user_id : ''), array('class' => 'form-control', 'placeholder' => 'User id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/users/permission/view/'.$users_permission->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/users/permission', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/users/permission', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>