<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($users_session) ? $users_session->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Client id', 'client_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('client_id', Input::post('client_id', isset($users_session) ? $users_session->client_id : ''), array('class' => 'form-control', 'placeholder' => 'Client id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Redirect uri', 'redirect_uri', array('class' => 'control-label')); ?>

			<?php echo Form::input('redirect_uri', Input::post('redirect_uri', isset($users_session) ? $users_session->redirect_uri : ''), array('class' => 'form-control', 'placeholder' => 'Redirect uri')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Type id', 'type_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('type_id', Input::post('type_id', isset($users_session) ? $users_session->type_id : ''), array('class' => 'form-control', 'placeholder' => 'Type id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Type', 'type', array('class' => 'control-label')); ?>

			<?php echo Form::input('type', Input::post('type', isset($users_session) ? $users_session->type : ''), array('class' => 'form-control', 'placeholder' => 'Type')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Code', 'code', array('class' => 'control-label')); ?>

			<?php echo Form::input('code', Input::post('code', isset($users_session) ? $users_session->code : ''), array('class' => 'form-control', 'placeholder' => 'Code')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Access token', 'access_token', array('class' => 'control-label')); ?>

			<?php echo Form::input('access_token', Input::post('access_token', isset($users_session) ? $users_session->access_token : ''), array('class' => 'form-control', 'placeholder' => 'Access token')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Stage', 'stage', array('class' => 'control-label')); ?>

			<?php echo Form::input('stage', Input::post('stage', isset($users_session) ? $users_session->stage : ''), array('class' => 'form-control', 'placeholder' => 'Stage')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('First requested', 'first_requested', array('class' => 'control-label')); ?>

			<?php echo Form::input('first_requested', Input::post('first_requested', isset($users_session) ? $users_session->first_requested : ''), array('class' => 'form-control', 'placeholder' => 'First requested')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Last updated', 'last_updated', array('class' => 'control-label')); ?>

			<?php echo Form::input('last_updated', Input::post('last_updated', isset($users_session) ? $users_session->last_updated : ''), array('class' => 'form-control', 'placeholder' => 'Last updated')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Limited access', 'limited_access', array('class' => 'control-label')); ?>

			<?php echo Form::input('limited_access', Input::post('limited_access', isset($users_session) ? $users_session->limited_access : ''), array('class' => 'form-control', 'placeholder' => 'Limited access')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/users/session/view/'.$users_session->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/users/session', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/users/session', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>