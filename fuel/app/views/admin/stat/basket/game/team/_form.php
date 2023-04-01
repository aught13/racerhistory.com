<?= Form::open(); ?>
<fieldset>

    <?= Form::hidden('game_id', Input::post('game_id', isset($stat_basket_game_team) ? $stat_basket_game_team->game_id : $game), []); ?>
    
    <?= Form::hidden('opp', Input::post('opp', isset($stat_basket_game_team) ? $stat_basket_game_team->opp : (isset($opp)? 1 : 0)), []); ?>
        
    <div class="form-group">
        <?= Form::label('ORB', 'ORB',['class' => 'control-label']); ?>

	<?= Form::input('ORB', Input::post('ORB', isset($stat_basket_game_team) ? $stat_basket_game_team->ORB : ''), ['class' => 'form-control', 'placeholder' => 'ORB']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('DRB', 'DRB',['class' => 'control-label']); ?>

	<?= Form::input('DRB', Input::post('DRB', isset($stat_basket_game_team) ? $stat_basket_game_team->DRB : ''), ['class' => 'form-control', 'placeholder' => 'DRB']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('RB', 'RB',['class' => 'control-label']); ?>

	<?= Form::input('RB', Input::post('RB', isset($stat_basket_game_team) ? $stat_basket_game_team->RB : ''), ['class' => 'form-control', 'placeholder' => 'RB']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('TRN', 'TRN',['class' => 'control-label']); ?>

	<?= Form::input('TRN', Input::post('TRN', isset($stat_basket_game_team) ? $stat_basket_game_team->TRN : ''), ['class' => 'form-control', 'placeholder' => 'TRN']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('TF', 'TF',['class' => 'control-label']); ?>

	<?= Form::input('TF', Input::post('TF', isset($stat_basket_game_team) ? $stat_basket_game_team->TF : ''), ['class' => 'form-control', 'placeholder' => 'TF']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('PTS', 'PTS',['class' => 'control-label']); ?>

	<?= Form::input('PTS', Input::post('PTS', isset($stat_basket_game_team) ? $stat_basket_game_team->PTS : ''), ['class' => 'form-control', 'placeholder' => 'PTS']); ?>
    </div>

    <div class="form-group">
        <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

        <div class="pull-right">
            <?php if (Uri::segment(3) === 'edit'): ?>
                <div class="btn-group">
                    <?= Html::anchor('admin/stat/basket/game/team/view/' . $stat_basket_game_team->id, 'View', ['class' => 'btn btn-info']); ?>
                    <?= Html::anchor('admin/stat/basket/game/team', 'Back', ['class' => 'btn btn-default']); ?>
                </div>
            <?php else: ?>
                <?= Html::anchor('admin/stat/basket/game/team', 'Back', ['class' => 'btn btn-link']); ?>
            <?php endif ?>
        </div>
    </div>
</fieldset>


<?= Form::close(); ?>