<?= Form::open(); ?>

<fieldset>

    <div class="form-group">
        <?= Form::label('Team', 'team_season_id', ['class' => 'control-label']); ?>
        <div class='input-group'>
            <?= Form::select('team_season_id', Input::post('team_season_id', isset($team_season_roster) ? $team_season_roster->team_season_id : ''), $teams, ['class' => 'form-control', 'placeholder' => 'Team season id']); ?>
            <?php if(\Fuel\Core\Uri::segment(5) == 'create') : ?>
                <div class="input-group-btn">
                    <?= Html::anchor('admin/team/season/create/' , 'New', ['class' => 'btn btn-warning', 'onclick' => "return confirm('Leave Page? All other information will be lost')"]); ?>
                </div>
            <?php endif; ?> 
        </div>    
    </div>

    <div class="form-group">
        <?= Form::label('Person', 'person_id', ['class' => 'control-label']); ?>
        <div class='input-group'>
            <?= Form::select('person_id', Input::post('person_id', isset($team_season_roster) ? $team_season_roster->person_id : ''), $people, ['class' => 'form-control', 'placeholder' => 'Person id']); ?>
            <?php if(\Fuel\Core\Uri::segment(5) == 'create') : ?>
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#PersonModal">New</button>
                </div>
            <?php endif; ?> 
        </div>    
    </div>

    <div class="form-group">
        <?= Form::label('Roster year', 'roster_year', ['class' => 'control-label']); ?>

        <?= Form::input('roster_year', Input::post('roster_year', isset($team_season_roster) ? $team_season_roster->roster_year : ''), ['class' => 'form-control', 'placeholder' => 'Fr, So, (R)Jr, etc']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Roster number', 'roster_number', ['class' => 'control-label']); ?>

        <?= Form::input('roster_number', Input::post('roster_number', isset($team_season_roster) ? $team_season_roster->roster_number : ''), ['class' => 'form-control', 'placeholder' => 'Roster number']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Roster position', 'roster_position', ['class' => 'control-label']); ?>

        <?= Form::input('roster_position', Input::post('roster_position', isset($team_season_roster) ? $team_season_roster->roster_position : ''), ['class' => 'form-control', 'placeholder' => 'Roster position']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Roster height', 'roster_height', ['class' => 'control-label']); ?>

        <?= Form::input('roster_height', Input::post('roster_height', isset($team_season_roster) ? $team_season_roster->roster_height : ''), ['class' => 'form-control', 'placeholder' => 'Roster height']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Roster weight', 'roster_weight', ['class' => 'control-label']); ?>

        <?= Form::input('roster_weight', Input::post('roster_weight', isset($team_season_roster) ? $team_season_roster->roster_weight : ''), ['class' => 'form-control', 'placeholder' => 'Roster weight']); ?>
    </div>

    <div class="form-group">
        <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

        <div class="pull-right">
            <?php if (Uri::segment(3) === 'edit'): ?>
                <div class="btn-group">
                    <?= Html::anchor('admin/team/season/roster/view/' . $team_season_roster->id, 'View', ['class' => 'btn btn-info']); ?>
                    <?= Html::anchor('admin/team/season/roster', 'Back', ['class' => 'btn btn-default']); ?>
                </div>
            <?php else: ?>
                <?= Html::anchor('admin/team/season/roster', 'Back', ['class' => 'btn btn-link']); ?>
            <?php endif ?>
        </div>
    </div>
</fieldset>


<?= Form::close(); ?>