<h2>Editing Game Referees</h2>
<br>

<div class="row">
    <div class="col-md-6">
        <?= Form::open(); ?>
        <fieldset>

            <div class="form-group">
                <?= Form::label('Ref 1', 'ref_1', ['class' => 'control-label']); ?>

                <?= Form::input('ref_1', Input::post('ref_1', isset($game->ref_1) ? $game->ref_1 : ''), ['class' => 'form-control', 'placeholder' => 'ref 1']); ?>
            </div>

            <div class="form-group">
                <?= Form::label('Ref 2', 'ref_2', ['class' => 'control-label']); ?>

                <?= Form::input('ref_2', Input::post('ref_2', isset($game->ref_2) ? $game->ref_2 : ''), ['class' => 'form-control', 'placeholder' => 'ref 2']); ?>
            </div>

            <div class="form-group">
                <?= Form::label('Ref 3', 'ref_3', ['class' => 'control-label']); ?>

                <?= Form::input('ref_3', Input::post('ref_3', isset($game->ref_3) ? $game->ref_3 : ''), ['class' => 'form-control', 'placeholder' => 'ref 3']); ?>
            </div>

            <div class="form-group">
                <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

            </div>
        </fieldset>


        <?= Form::close(); ?>
    </div>
</div>
