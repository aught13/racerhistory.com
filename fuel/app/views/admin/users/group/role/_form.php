<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Group id', 'group_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('group_id', Input::post('group_id', isset($users_group_role) ? $users_group_role->group_id : ''), array('class' => 'form-control', 'placeholder' => 'Group id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Role id', 'role_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('role_id', Input::post('role_id', isset($users_group_role) ? $users_group_role->role_id : ''), array('class' => 'form-control', 'placeholder' => 'Role id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/users/group/role/view/'.$users_group_role->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/users/group/role', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/users/group/role', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>