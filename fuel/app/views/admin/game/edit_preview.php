<h2>Editing Game Preview</h2>
<br>

<div class="row">
    <div class="col-md-6">
        <?= Form::open(); ?>
        <fieldset>

            <div class="form-group">
                <?= Form::label('Game preview', 'game_preview', ['class' => 'control-label']); ?>

                <?= Form::textarea('game_preview', Input::post('game_preview', isset($game) ? $game->game_preview : ''), ['class' => 'form-control', 'rows' => '10']); ?>
            </div>
        </fieldset>
        <div class="form-group">
                <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

                <div class="pull-right">
                    <?php if (Uri::segment(3) === 'edit'): ?>
                        <div class="btn-group">
                            <?= Html::anchor('admin/game/view/' . $game->id, 'Back to Game', ['class' => 'btn btn-info']); ?>
                            <?= Html::anchor('admin/game', 'All Games', ['class' => 'btn btn-default']); ?>
                            <?= Html::anchor('admin/team/season/view/' . $game->team_season_id, 'Back to Season', ['class' => 'btn btn-info']); ?>
                        </div>
                    <?php else: ?>
                        <?= Html::anchor('admin/game', 'Back', ['class' => 'btn btn-link']); ?>
                    <?php endif ?>
                </div>
            </div>
        <?= Form::close(); ?>
    </div>
</div>