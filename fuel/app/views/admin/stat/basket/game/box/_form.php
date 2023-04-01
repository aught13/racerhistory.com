<?= Form::open(); ?>
<fieldset>

    <div class="form-group">
        <?= Form::hidden('game_id', Input::post('game_id', isset($stat_basket_game_box) ? $stat_basket_game_box->game_id : $game->id), ['class' => 'hidden', 'placeholder' => 'Game id']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Team', 'opponent_id', ['class' => 'control-label']); ?>

        <?= Form::select('opponent_id', Input::post('opponent_id', isset($stat_basket_game_box) ? $stat_basket_game_box->opponent_id : ''),['0' => 'Murray', $game->opponent_id => $game->opponents->opponent_name] ,['class' => 'form-control', 'placeholder' => 'Team']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Period', 'period', ['class' => 'control-label']); ?>

        <?= Form::select('period', Input::post('period', isset($stat_basket_game_box) ? $stat_basket_game_box->period : ''),$periods ,['class' => 'form-control', 'placeholder' => 'Period']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('FGM', 'FGM', ['class' => 'control-label']); ?>

        <?= Form::input('FGM', Input::post('FGM', isset($stat_basket_game_box) ? $stat_basket_game_box->FGM : ''), ['class' => 'form-control', 'placeholder' => 'FGM']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('FGA', 'FGA', ['class' => 'control-label']); ?>

        <?= Form::input('FGA', Input::post('FGA', isset($stat_basket_game_box) ? $stat_basket_game_box->FGA : ''), ['class' => 'form-control', 'placeholder' => 'FGA']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('TPM', 'TPM', ['class' => 'control-label']); ?>

        <?= Form::input('TPM', Input::post('TPM', isset($stat_basket_game_box) ? $stat_basket_game_box->TPM : ''), ['class' => 'form-control', 'placeholder' => 'TPM']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('TPA', 'TPA', ['class' => 'control-label']); ?>

        <?= Form::input('TPA', Input::post('TPA', isset($stat_basket_game_box) ? $stat_basket_game_box->TPA : ''), ['class' => 'form-control', 'placeholder' => 'TPA']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('FTM', 'FTM', ['class' => 'control-label']); ?>

        <?= Form::input('FTM', Input::post('FTM', isset($stat_basket_game_box) ? $stat_basket_game_box->FTM : ''), ['class' => 'form-control', 'placeholder' => 'FTM']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('FTA', 'FTA', ['class' => 'control-label']); ?>

        <?= Form::input('FTA', Input::post('FTA', isset($stat_basket_game_box) ? $stat_basket_game_box->FTA : ''), ['class' => 'form-control', 'placeholder' => 'FTA']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('ORB', 'ORB', ['class' => 'control-label']); ?>

        <?= Form::input('ORB', Input::post('ORB', isset($stat_basket_game_box) ? $stat_basket_game_box->ORB : ''), ['class' => 'form-control', 'placeholder' => 'ORB']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('DRB', 'DRB', ['class' => 'control-label']); ?>

        <?= Form::input('DRB', Input::post('DRB', isset($stat_basket_game_box) ? $stat_basket_game_box->DRB : ''), ['class' => 'form-control', 'placeholder' => 'DRB']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('RB', 'RB', ['class' => 'control-label']); ?>

        <?= Form::input('RB', Input::post('RB', isset($stat_basket_game_box) ? $stat_basket_game_box->RB : ''), ['class' => 'form-control', 'placeholder' => 'RB']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('AST', 'AST', ['class' => 'control-label']); ?>

        <?= Form::input('AST', Input::post('AST', isset($stat_basket_game_box) ? $stat_basket_game_box->AST : ''), ['class' => 'form-control', 'placeholder' => 'AST']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('STL', 'STL', ['class' => 'control-label']); ?>

        <?= Form::input('STL', Input::post('STL', isset($stat_basket_game_box) ? $stat_basket_game_box->STL : ''), ['class' => 'form-control', 'placeholder' => 'STL']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('BS', 'BS', ['class' => 'control-label']); ?>

        <?= Form::input('BS', Input::post('BS', isset($stat_basket_game_box) ? $stat_basket_game_box->BS : ''), ['class' => 'form-control', 'placeholder' => 'BS']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('TRN', 'TRN', ['class' => 'control-label']); ?>

        <?= Form::input('TRN', Input::post('TRN', isset($stat_basket_game_box) ? $stat_basket_game_box->TRN : ''), ['class' => 'form-control', 'placeholder' => 'TRN']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('PF', 'PF', ['class' => 'control-label']); ?>

        <?= Form::input('PF', Input::post('PF', isset($stat_basket_game_box) ? $stat_basket_game_box->PF : ''), ['class' => 'form-control', 'placeholder' => 'PF']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('TF', 'TF', ['class' => 'control-label']); ?>

        <?= Form::input('TF', Input::post('TF', isset($stat_basket_game_box) ? $stat_basket_game_box->TF : ''), ['class' => 'form-control', 'placeholder' => 'TF']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('PTS', 'PTS', ['class' => 'control-label']); ?>

        <?= Form::input('PTS', Input::post('PTS', isset($stat_basket_game_box) ? $stat_basket_game_box->PTS : ''), ['class' => 'form-control', 'placeholder' => 'PTS']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('PNT', 'PNT', ['class' => 'control-label']); ?>

        <?= Form::input('PNT', Input::post('PNT', isset($stat_basket_game_box) ? $stat_basket_game_box->PNT : ''), ['class' => 'form-control', 'placeholder' => 'PNT']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('OTO', 'OTO', ['class' => 'control-label']); ?>

        <?= Form::input('OTO', Input::post('OTO', isset($stat_basket_game_box) ? $stat_basket_game_box->OTO : ''), ['class' => 'form-control', 'placeholder' => 'OTO']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('SND', 'SND', ['class' => 'control-label']); ?>

        <?= Form::input('SND', Input::post('SND', isset($stat_basket_game_box) ? $stat_basket_game_box->SND : ''), ['class' => 'form-control', 'placeholder' => 'SND']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('FB', 'FB', ['class' => 'control-label']); ?>

        <?= Form::input('FB', Input::post('FB', isset($stat_basket_game_box) ? $stat_basket_game_box->FB : ''), ['class' => 'form-control', 'placeholder' => 'FB']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('BN', 'BN', ['class' => 'control-label']); ?>

        <?= Form::input('BN', Input::post('BN', isset($stat_basket_game_box) ? $stat_basket_game_box->BN : ''), ['class' => 'form-control', 'placeholder' => 'BN']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('TIED', 'TIED', ['class' => 'control-label']); ?>

        <?= Form::input('TIED', Input::post('TIED', isset($stat_basket_game_box) ? $stat_basket_game_box->TIED : ''), ['class' => 'form-control', 'placeholder' => 'TIED']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('LC', 'LC', ['class' => 'control-label']); ?>

        <?= Form::input('LC', Input::post('LC', isset($stat_basket_game_box) ? $stat_basket_game_box->LC : ''), ['class' => 'form-control', 'placeholder' => 'LC']); ?>
    </div>

    <div class="form-group">
        <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

        <div class="pull-right">
            <?php if (Uri::segment(3) === 'edit'): ?>
                <div class="btn-group">
                    <?= Html::anchor('admin/stat/basket/game/box/view/' . $stat_basket_game_box->id, 'View', ['class' => 'btn btn-info']); ?>
                    <?= Html::anchor('admin/game/view/'.$game->id, 'Back', ['class' => 'btn btn-default']); ?>
                </div>
            <?php else: ?>
                <?= Html::anchor('admin/game/view/'.$game->id, 'Back', ['class' => 'btn btn-link']); ?>
            <?php endif ?>
        </div>
    </div>
</fieldset>


<?= Form::close(); ?>