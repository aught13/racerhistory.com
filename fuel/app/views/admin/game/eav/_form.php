<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class' => 'control-label')); ?>

			<?php echo Form::input('id', Input::post('id', isset($game_eav) ? $game_eav->id : ''), array('class' => 'form-control', 'placeholder' => 'Id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Game id', 'game_id', array('class' => 'control-label')); ?>

			<?php echo Form::input('game_id', Input::post('game_id', isset($game_eav) ? $game_eav->game_id : ''), array('class' => 'form-control', 'placeholder' => 'Game id')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Key', 'key', array('class' => 'control-label')); ?>

			<?php echo Form::input('key', Input::post('key', isset($game_eav) ? $game_eav->key : ''), array('class' => 'form-control', 'placeholder' => 'Key')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Value', 'value', array('class' => 'control-label')); ?>

			<?php echo Form::input('value', Input::post('value', isset($game_eav) ? $game_eav->value : ''), array('class' => 'form-control', 'placeholder' => 'Value')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/game/eav/view/'.$game_eav->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/game/eav', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/game/eav', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>