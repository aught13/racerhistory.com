<?= Form::open(); ?>
<fieldset>

    <div class="form-group">
        <?= Form::label('Team', 'team_id', ['class' => 'control-label']); ?>
        <div class='input-group'>
            <?= Form::select('team_id', Input::post('team_id', isset($team_season) ? $team_season->team_id : ''), $teams, ['class' => 'form-control', 'placeholder' => 'Team id']); ?>
            <?php if(\Fuel\Core\Uri::segment(4) == 'create') : ?>
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#TeamModal">New</button>
                </div>
            <?php endif; ?> 
        </div>    
    </div>

    <div class="form-group">
        <?= Form::label('Season', 'season_id', ['class' => 'control-label']); ?>
        <div class='input-group'>
            <?= Form::select('season_id', Input::post('season_id', isset($team_season) ? $team_season->season_id : ''), $seasons, ['class' => 'form-control', 'placeholder' => 'Season id']); ?>
            <?php if(\Fuel\Core\Uri::segment(4) == 'create') : ?>
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#SeasonModal">New</button>
                </div>
            <?php endif; ?> 
        </div>    
    </div>

    <div class="form-group">
        <?= Form::label('Semester', 'semester', ['class' => 'control-label']); ?>

        <?= Form::select('semester', Input::post('semester', isset($team_season) ? $team_season->semester : ''), [1 => 'Fall', 2 => 'Winter', 3 => 'Spring'] , ['class' => 'form-control', 'placeholder' => 'Semester']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('League Finish', 'league_finish', ['class' => 'control-label']); ?>

        <?= Form::input('league_finish', Input::post('league_finish', isset($team_season) ? $team_season->league_finish : ''), ['class' => 'form-control', 'placeholder' => 'League finish']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('League Torunament Finish', 'league_torunament_finish', ['class' => 'control-label']); ?>

        <?= Form::input('league_torunament_finish', Input::post('league_torunament_finish', isset($team_season) ? $team_season->league_torunament_finish : ''), ['class' => 'form-control', 'placeholder' => 'League torunament finish']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Last Postseason Game', 'last_post_game', ['class' => 'control-label']); ?>

        <?= Form::input('last_post_game', Input::post('last_post_game', isset($team_season) ? $team_season->last_post_game : ''), ['class' => 'form-control', 'placeholder' => 'Last post game']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Notes', 'team_season_notes', ['class' => 'control-label']); ?>

        <?= Form::input('team_season_notes', Input::post('team_season_notes', isset($team_season) ? $team_season->team_season_notes : ''), ['class' => 'form-control', 'placeholder' => 'Team season notes']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Image', 'team_season_image', ['class' => 'control-label']); ?>

        <?= Form::input('team_season_image', Input::post('team_season_image', isset($team_season) ? $team_season->team_season_image : ''), ['class' => 'form-control', 'placeholder' => 'Team season image']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Season Preview', 'team_season_preview', ['class' => 'control-label']); ?>

        <?= Form::input('team_season_preview', Input::post('team_season_preview', isset($team_season) ? $team_season->team_season_preview : ''), ['class' => 'form-control', 'placeholder' => 'Team season preview']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Season Recap', 'team_season_recap', ['class' => 'control-label']); ?>

        <?= Form::input('team_season_recap', Input::post('team_season_recap', isset($team_season) ? $team_season->team_season_recap : ''), ['class' => 'form-control', 'placeholder' => 'Team season recap']); ?>
    </div>

    <div class="form-group">
        <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

        <div class="pull-right">
            <?php if (Uri::segment(3) === 'edit'): ?>
                <div class="btn-group">
                    <?= Html::anchor('admin/team/season/view/' . $team_season->id, 'View', ['class' => 'btn btn-info']); ?>
                    <?= Html::anchor('admin/team/season', 'Back', ['class' => 'btn btn-default']); ?>
                </div>
            <?php else: ?>
                <?= Html::anchor('admin/team/season', 'Back', ['class' => 'btn btn-link']); ?>
            <?php endif ?>
        </div>
    </div>
</fieldset>


<?= Form::close(); ?>