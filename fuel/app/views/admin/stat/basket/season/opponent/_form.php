<?= Form::open(); ?>
<fieldset>

    <?= Form::hidden('team_season_id', Input::post('team_season_id', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->team_season_id : (isset($team) ? $team : '')), []); ?>

    <div class="form-group">
        <?= Form::label('GP', 'GP',['class' => 'control-label']); ?>

	<?= Form::input('GP', Input::post('GP', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->GP : ''), ['class' => 'form-control', 'placeholder' => 'GP']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('MIN', 'MIN',['class' => 'control-label']); ?>

	<?= Form::input('MIN', Input::post('MIN', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->MIN : ''), ['class' => 'form-control', 'placeholder' => 'MIN']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('FGM', 'FGM',['class' => 'control-label']); ?>

	<?= Form::input('FGM', Input::post('FGM', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->FGM : ''), ['class' => 'form-control', 'placeholder' => 'FGM']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('FGA', 'FGA',['class' => 'control-label']); ?>

	<?= Form::input('FGA', Input::post('FGA', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->FGA : ''), ['class' => 'form-control', 'placeholder' => 'FGA']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('TPM', 'TPM',['class' => 'control-label']); ?>

	<?= Form::input('TPM', Input::post('TPM', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->TPM : ''), ['class' => 'form-control', 'placeholder' => 'TPM']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('TPA', 'TPA',['class' => 'control-label']); ?>

	<?= Form::input('TPA', Input::post('TPA', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->TPA : ''), ['class' => 'form-control', 'placeholder' => 'TPA']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('FTM', 'FTM',['class' => 'control-label']); ?>

	<?= Form::input('FTM', Input::post('FTM', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->FTM : ''), ['class' => 'form-control', 'placeholder' => 'FTM']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('FTA', 'FTA',['class' => 'control-label']); ?>

	<?= Form::input('FTA', Input::post('FTA', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->FTA : ''), ['class' => 'form-control', 'placeholder' => 'FTA']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('ORB', 'ORB',['class' => 'control-label']); ?>

	<?= Form::input('ORB', Input::post('ORB', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->ORB : ''), ['class' => 'form-control', 'placeholder' => 'ORB']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('DRB', 'DRB',['class' => 'control-label']); ?>

	<?= Form::input('DRB', Input::post('DRB', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->DRB : ''), ['class' => 'form-control', 'placeholder' => 'DRB']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('RB', 'RB',['class' => 'control-label']); ?>

	<?= Form::input('RB', Input::post('RB', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->RB : ''), ['class' => 'form-control', 'placeholder' => 'RB']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('AST', 'AST',['class' => 'control-label']); ?>

	<?= Form::input('AST', Input::post('AST', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->AST : ''), ['class' => 'form-control', 'placeholder' => 'AST']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('STL', 'STL',['class' => 'control-label']); ?>

	<?= Form::input('STL', Input::post('STL', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->STL : ''), ['class' => 'form-control', 'placeholder' => 'STL']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('BS', 'BS',['class' => 'control-label']); ?>

	<?= Form::input('BS', Input::post('BS', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->BS : ''), ['class' => 'form-control', 'placeholder' => 'BS']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('TRN', 'TRN',['class' => 'control-label']); ?>

	<?= Form::input('TRN', Input::post('TRN', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->TRN : ''), ['class' => 'form-control', 'placeholder' => 'TRN']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('PF', 'PF',['class' => 'control-label']); ?>

	<?= Form::input('PF', Input::post('PF', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->PF : ''), ['class' => 'form-control', 'placeholder' => 'PF']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('TF', 'TF',['class' => 'control-label']); ?>

	<?= Form::input('TF', Input::post('TF', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->TF : ''), ['class' => 'form-control', 'placeholder' => 'TF']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('PTS', 'PTS',['class' => 'control-label']); ?>

	<?= Form::input('PTS', Input::post('PTS', isset($stat_basket_season_opponent) ? $stat_basket_season_opponent->PTS : ''), ['class' => 'form-control', 'placeholder' => 'PTS']); ?>
    </div>

    <div class="form-group">
        <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

        <div class="pull-right">            
            <?= Html::anchor('admin/team/season/view/'.(isset($team) ? $team : $stat_basket_season_opponent->team_season_id), 'Back', ['class' => 'btn btn-link']); ?>
        </div>
    </div>
</fieldset>


<?= Form::close(); ?>