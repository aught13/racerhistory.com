<?= Form::open(); ?>
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
        <?= Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

        <div class="pull-right">
            <?php if (Uri::segment(3) === 'edit'): ?>
                <div class="btn-group">
                    <?= Html::anchor('admin/game/type/view/' . $game_type->id, 'View', array('class' => 'btn btn-info')); ?>
                    <?= Html::anchor('admin/game/type', 'Back', array('class' => 'btn btn-default')); ?>
                </div>
            <?php else: ?>
                <?= Html::anchor('admin/game/type', 'Back', array('class' => 'btn btn-link')); ?>
            <?php endif ?>
        </div>
    </div>
</fieldset>


<?= Form::close(); ?>