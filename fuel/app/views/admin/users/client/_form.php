<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($users_client) ? $users_client->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class' => 'control-label')); ?>

			<?php echo Form::input('name', Input::post('name', isset($users_client) ? $users_client->name : ''), array('class' => 'form-control', 'placeholder' => 'Name')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Client id', 'client_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('client_id', Input::post('client_id', isset($users_client) ? $users_client->client_id : ''), array('class' => 'form-control', 'placeholder' => 'Client id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Client secret', 'client_secret', array('class' => 'control-label')); ?>

			<?php echo Form::input('client_secret', Input::post('client_secret', isset($users_client) ? $users_client->client_secret : ''), array('class' => 'form-control', 'placeholder' => 'Client secret')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Redirect uri', 'redirect_uri', array('class' => 'control-label')); ?>

			<?php echo Form::input('redirect_uri', Input::post('redirect_uri', isset($users_client) ? $users_client->redirect_uri : ''), array('class' => 'form-control', 'placeholder' => 'Redirect uri')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Auto approve', 'auto_approve', array('class' => 'control-label')); ?>

			<?php echo Form::input('auto_approve', Input::post('auto_approve', isset($users_client) ? $users_client->auto_approve : ''), array('class' => 'form-control', 'placeholder' => 'Auto approve')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Autonomous', 'autonomous', array('class' => 'control-label')); ?>

			<?php echo Form::input('autonomous', Input::post('autonomous', isset($users_client) ? $users_client->autonomous : ''), array('class' => 'form-control', 'placeholder' => 'Autonomous')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Status', 'status', array('class' => 'control-label')); ?>

			<?php echo Form::input('status', Input::post('status', isset($users_client) ? $users_client->status : ''), array('class' => 'form-control', 'placeholder' => 'Status')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Suspended', 'suspended', array('class' => 'control-label')); ?>

			<?php echo Form::input('suspended', Input::post('suspended', isset($users_client) ? $users_client->suspended : ''), array('class' => 'form-control', 'placeholder' => 'Suspended')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Notes', 'notes', array('class' => 'control-label')); ?>

			<?php echo Form::input('notes', Input::post('notes', isset($users_client) ? $users_client->notes : ''), array('class' => 'form-control', 'placeholder' => 'Notes')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/users/client/view/'.$users_client->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/users/client', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/users/client', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>