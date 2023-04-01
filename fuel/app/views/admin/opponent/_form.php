<?= Form::open(); ?>

<fieldset>
    <div class="form-group">
        <?= Form::label('Place', 'place_id', ['class' => 'control-label']); ?>
        <div class="input-group">
            <?= Form::select('place_id', Input::post('place_id', isset($opponent) ? $opponent->place_id : ''),$opt, ['class' => 'form-control', 'placeholder' => 'Place Id']); ?>
            <?php if(\Fuel\Core\Uri::segment(3) == 'create') : ?>
            <div class="input-group-btn">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">New</button>
            </div>
            <?php endif; ?>        
        </div>    
    </div>

    <div class="form-group">
        <?= Form::label('Name', 'opponent_name', ['class' => 'control-label']); ?>

        <?= Form::input('opponent_name', Input::post('opponent_name', isset($opponent) ? $opponent->opponent_name : ''), ['class' => 'form-control', 'placeholder' => 'Opponent name']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Mascot', 'opponent_mascot', ['class' => 'control-label']); ?>

        <?= Form::input('opponent_mascot', Input::post('opponent_mascot', isset($opponent) ? $opponent->opponent_mascot : ''), ['class' => 'form-control', 'placeholder' => 'Opponent mascot']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Current', 'opponent_current', ['class' => 'control-label']); ?>

        <?= Form::select('opponent_current', Input::post('opponent_current', isset($opponent) ? $opponent->opponent_current : ''),$opp, ['class' => 'form-control', 'placeholder' => 'Opponent current']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Short', 'opponent_short', ['class' => 'control-label']); ?>

        <?= Form::input('opponent_short', Input::post('opponent_short', isset($opponent) ? $opponent->opponent_short : ''), ['class' => 'form-control', 'placeholder' => 'Opponent short']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Abbr', 'opponent_abbr', ['class' => 'control-label']); ?>

        <?= Form::input('opponent_abbr', Input::post('opponent_abbr', isset($opponent) ? $opponent->opponent_abbr : ''), ['class' => 'form-control', 'placeholder' => 'Opponent abbr']); ?>
    </div>

    <div class="form-group">
        <?= Form::submit('sub', 'Save', ['class' => 'btn btn-primary']); ?>

        <div class="pull-right">
            <?php if (Uri::segment(3) === 'edit'): ?>
                <div class="btn-group">
                    <?= Html::anchor('admin/opponent/view/' . $opponent->id, 'View', ['class' => 'btn btn-info']); ?>
                    <?= Html::anchor('admin/opponent', 'Back', ['class' => 'btn btn-default']); ?>
                </div>
            <?php else: ?>
                <?= Html::anchor('admin/opponent', 'Back', ['class' => 'btn btn-link']); ?>
            <?php endif ?>
        </div>
    </div>
</fieldset>


<?= Form::close(); ?>