<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($user) ? $user->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Username', 'username', array('class' => 'control-label')); ?>

			<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'form-control', 'placeholder' => 'Username')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Password', 'password', array('class' => 'control-label')); ?>

			<?php echo Form::input('password', Input::post('password', isset($user) ? $user->password : ''), array('class' => 'form-control', 'placeholder' => 'Password')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Group id', 'group_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('group_id', Input::post('group_id', isset($user) ? $user->group_id : ''), array('class' => 'form-control', 'placeholder' => 'Group id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class' => 'control-label')); ?>

			<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'form-control', 'placeholder' => 'Email')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Last login', 'last_login', array('class' => 'control-label')); ?>

			<?php echo Form::input('last_login', Input::post('last_login', isset($user) ? $user->last_login : ''), array('class' => 'form-control', 'placeholder' => 'Last login')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Previous login', 'previous_login', array('class' => 'control-label')); ?>

			<?php echo Form::input('previous_login', Input::post('previous_login', isset($user) ? $user->previous_login : ''), array('class' => 'form-control', 'placeholder' => 'Previous login')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Login hash', 'login_hash', array('class' => 'control-label')); ?>

			<?php echo Form::input('login_hash', Input::post('login_hash', isset($user) ? $user->login_hash : ''), array('class' => 'form-control', 'placeholder' => 'Login hash')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('User id', 'user_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('user_id', Input::post('user_id', isset($user) ? $user->user_id : ''), array('class' => 'form-control', 'placeholder' => 'User id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/user/view/'.$user->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/user', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/user', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>