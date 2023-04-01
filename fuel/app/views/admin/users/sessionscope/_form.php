<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($users_sessionscope) ? $users_sessionscope->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Session id', 'session_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('session_id', Input::post('session_id', isset($users_sessionscope) ? $users_sessionscope->session_id : ''), array('class' => 'form-control', 'placeholder' => 'Session id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Access token', 'access_token', array('class' => 'control-label')); ?>

			<?php echo Form::input('access_token', Input::post('access_token', isset($users_sessionscope) ? $users_sessionscope->access_token : ''), array('class' => 'form-control', 'placeholder' => 'Access token')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Scope', 'scope', array('class' => 'control-label')); ?>

			<?php echo Form::input('scope', Input::post('scope', isset($users_sessionscope) ? $users_sessionscope->scope : ''), array('class' => 'form-control', 'placeholder' => 'Scope')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/users/sessionscope/view/'.$users_sessionscope->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/users/sessionscope', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/users/sessionscope', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>