<?= Form::open(['action' => 'ajax/game/type/create', 'id' => 'ajax_form_game_type']); ?>
<fieldset>
    
    <div class="form-group">
        <?= Form::label('Game type name', 'game_type_name', array('class' => 'control-label')); ?>

        <?= Form::input('game_type_name', Input::post('game_type_name', isset($game_type) ? $game_type->game_type_name : ''), array('class' => 'form-control', 'placeholder' => 'Game type name')); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Post', 'post', array('class' => 'control-label')); ?>

        <?= Form::input('post', Input::post('post', isset($game_type) ? $game_type->post : ''), array('class' => 'form-control', 'placeholder' => 'Post')); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Conf', 'conf', array('class' => 'control-label')); ?>

        <?= Form::input('conf', Input::post('conf', isset($game_type) ? $game_type->conf : ''), array('class' => 'form-control', 'placeholder' => 'Conf')); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Indicator', 'ind', array('class' => 'control-label')); ?>

        <?= Form::input('ind', Input::post('ind', isset($game_type) ? $game_type->conf : ''), array('class' => 'form-control', 'placeholder' => 'Indicator')); ?>
    </div>
    
    <div class="form-group">
        <?= Form::submit('ajax', 'Save', array('class' => 'btn btn-primary')); ?>
    </div>
</fieldset>


<?= Form::close(); ?>