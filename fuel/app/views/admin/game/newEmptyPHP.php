



    <div class="form-group">
        <?= Form::label('W', 'w', ['class' => 'control-label']); ?>

        <?= Form::input('w', Input::post('w', $game->w ?? ''), ['class' => 'form-control', 'placeholder' => 'W']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('L', 'l', ['class' => 'control-label']); ?>

        <?= Form::input('l', Input::post('l', isset($game) ? $game->l : ''), ['class' => 'form-control', 'placeholder' => 'L']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Murray Points', 'pts_mur', ['class' => 'control-label']); ?>

        <?= Form::input('pts_mur', Input::post('pts_mur', isset($game) ? $game->pts_mur : ''), ['type' => 'number', 'class' => 'form-control', 'placeholder' => 'Pts mur']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Opponent Points', 'pts_opp', ['class' => 'control-label']); ?>

        <?= Form::input('pts_opp', Input::post('pts_opp', isset($game) ? $game->pts_opp : ''), ['type' => 'number', 'class' => 'form-control', 'placeholder' => 'Pts opp']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Murray rank', 'mur_rk', ['class' => 'control-label']); ?>

        <?= Form::input('mur_rk', Input::post('mur_rk', isset($game) ? $game->mur_rk : ''), ['class' => 'form-control', 'placeholder' => 'Mur rk']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Opponent rank', 'opp_rk', ['class' => 'control-label']); ?>

        <?= Form::input('opp_rk', Input::post('opp_rk', isset($game) ? $game->opp_rk : ''), ['class' => 'form-control', 'placeholder' => 'Opp rk']); ?>
    </div>


    <div class="form-group">
        <?= Form::label('OT periods', 'ot', ['class' => 'control-label']); ?>

        <?= Form::input('ot', Input::post('ot', isset($game) ? $game->ot : ''), ['class' => 'form-control', 'placeholder' => 'Ot']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Attendance', 'attendance', ['class' => 'control-label']); ?>

        <?= Form::input('attendance', Input::post('attendance', isset($game) ? $game->attendance : ''), ['class' => 'form-control', 'placeholder' => 'Attendance']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Game preview', 'game_preview', ['class' => 'control-label']); ?>

        <?= Form::textarea('game_preview', Input::post('game_preview', isset($game) ? $game->game_preview : ''), ['class' => 'form-control', 'placeholder' => 'Game preview']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Game recap', 'game_recap', ['class' => 'control-label']); ?>

        <?= Form::textarea('game_recap', Input::post('game_recap', isset($game) ? $game->game_recap : ''), ['class' => 'form-control', 'placeholder' => 'Game recap']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Game notes', 'game_notes', ['class' => 'control-label']); ?>

        <?= Form::textarea('game_notes', Input::post('game_notes', isset($game) ? $game->game_notes : ''), ['class' => 'form-control', 'placeholder' => 'Game notes']); ?>
    </div>



                            'w' => Input::post('w'),
                            'l' => Input::post('l'),
                            'pts_mur' => Input::post('pts_mur'),
                            'pts_opp' => Input::post('pts_opp'),
                            'mur_rk' => Input::post('mur_rk'),
                            'opp_rk' => Input::post('opp_rk'),
                            
                            'ot' => Input::post('ot'),
                            'attendance' => Input::post('attendance'),
                            'game_preview' => Input::post('game_preview'),
                            'game_recap' => Input::post('game_recap'),
                            'game_notes' => Input::post('game_notes'),