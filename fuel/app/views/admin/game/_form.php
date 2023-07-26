<?= Form::open(); ?>
<fieldset>
    
    <div class="form-group">
        <?= Form::label('Team Season', 'season', ['class' => 'control-label']); ?>
        <div class='input-group'>
            <?= Form::select('team_season_id', Input::post('season', isset($game) ? $game->team_season_id : (isset($season) ? $season->id : '')),$options['seasons'], ['class' => 'form-control', 'placeholder' => 'Season']); ?>
            
                <div class="input-group-btn">
                    <?= Html::anchor('admin/team/season/create', 'New', ['class' => 'btn btn-danger']); ?>
                </div>
            
        </div>    
    </div>

    <div class="form-group">
        <?= Form::label('Game date', 'game_date', ['class' => 'control-label']); ?>

        <?= Form::input('game_date', Input::post('game_date', isset($game) ? $game->game_date : ''), ['type' => 'date','class' => 'form-control', 'placeholder' => 'Game date']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Game time', 'game_time', ['class' => 'control-label']); ?>

        <?= Form::input('game_time', Input::post('game_time', isset($game) ? $game->game_time : ''), ['type' => 'time', 'class' => 'form-control', 'placeholder' => 'Game time']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Game type', 'game_type_id', ['class' => 'control-label']); ?>
        <div class='input-group'>
            <?= Form::select('game_type_id', Input::post('game_type_id', isset($game) ? $game->game_type_id : ''),$options['game_types'], ['class' => 'form-control', 'placeholder' => 'Game type id']); ?>
            
                <div class="input-group-btn">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#TypeModal">New</button>
                </div>
            
        </div>    
    </div>

    <div class="form-group">
        <?= Form::label('Opponent', 'opponent_id', ['class' => 'control-label']); ?>
        <div class='input-group'>
            <?= Form::select('opponent_id', Input::post('opponent_id', isset($game) ? $game->opponent_id : ''),$options['opponents'], ['class' => 'form-control', 'placeholder' => 'Opponent id']); ?>
            
                <div class="input-group-btn">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#OppModal">New</button>
                </div>
           
        </div>    
    </div>

    <div class="form-group">
        <?= Form::label('Place', 'place_id', ['class' => 'control-label']); ?>
        <div class='input-group'>
            <?= Form::select('place_id', Input::post('place_id', isset($game) ? $game->place_id : ''),$options['places'], ['class' => 'form-control', 'placeholder' => 'Place id']); ?>
            
                <div class="input-group-btn">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#PlaceModal">New</button>
                </div>
            
        </div>    
    </div>

    <div class="form-group">
        <?= Form::label('Site', 'site_id', ['class' => 'control-label']); ?>
        <div class='input-group'>
            <?= Form::select('site_id', Input::post('site_id', isset($game) ? $game->site_id : ''),$options['sites'], ['class' => 'form-control', 'placeholder' => 'Site id']); ?>
            
                <div class="input-group-btn">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#SiteModal">New</button>
                </div>
            
        </div> 
    </div>

    <div class="form-group">
        <?= Form::label('Hrn', 'hrn', ['class' => 'control-label']); ?>

        <?= Form::select('hrn', Input::post('hrn', $game->hrn ?? ''),[1 => 'Home', 2 => 'Road', 3 => 'Neutral'], ['class' => 'form-control', 'placeholder' => 'Hrn']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Post', 'post', ['class' => 'control-label']); ?>

        <?= Form::select('post', Input::post('post', isset($game) ? $game->post : ''),[0 => 'No', 1 => 'Yes'], ['class' => 'form-control', 'placeholder' => 'Post']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Periods', 'periods', ['class' => 'control-label']); ?>

        <?= Form::input('periods', Input::post('periods', isset($game) ? $game->periods : ''), ['class' => 'form-control', 'placeholder' => 'Periods']); ?>
    </div>

    <div class="form-group">
        <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

        <div class="pull-right">
            <?php if (Uri::segment(3) === 'edit'): ?>
                <div class="btn-group">
                    <?= Html::anchor('admin/game/refs/' . $game->id, 'Add Refs', ['class' => 'btn btn-success']); ?>
                    <?= Html::anchor('admin/game/view/' . $game->id, 'Back', ['class' => 'btn btn-info']); ?>
                    <?= Html::anchor('admin/game', 'All Games', ['class' => 'btn btn-default']); ?>
                    <?= Html::anchor('admin/team/season/view/' . $game->team_season_id, 'Back', ['class' => 'btn btn-info']); ?>
                </div>
            <?php else: ?>
                <?= Html::anchor('admin/game', 'Back', ['class' => 'btn btn-link']); ?>
            <?php endif ?>
        </div>
    </div>
</fieldset>


<?= Form::close(); ?>