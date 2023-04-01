<h2>Points per period</h2>
<br>

<div class="row">
    <div class="col-md-6">
        <?= Form::open(); ?>
        
            <fieldset>
                <?php $x=1;
                while ($x <= $periods) { ?>
                <div class="form-group">
                    <?= Form::label('Mur '.$x, 'mur_'.$x, ['class' => 'control-label']); ?>

                    <?= Form::input('mur_'.$x, Input::post('mur_'.$x, isset($game->{'mur_'.$x}) ? $game->{'mur_'.$x} : ''), ['class' => 'form-control', 'placeholder' => 'Mur '.$x]); ?>
                </div>

                <div class="form-group">
                    <?= Form::label('Opp '.$x, 'opp_'.$x, ['class' => 'control-label']); ?>

                    <?= Form::input('opp_'.$x, Input::post('opp_'.$x, isset($game->{'opp_'.$x}) ? $game->{'opp_'.$x} : ''), ['class' => 'form-control', 'placeholder' => 'Opp '.$x]); ?>
                </div>
                <?php $x++; } ?>
                <?php $x=1;
                while ($x <= $ot) { ?>
                <div class="form-group">
                    <?= Form::label('Mur OT '.$x, 'mur_ot_'.$x, ['class' => 'control-label']); ?>

                    <?= Form::input('mur_ot_'.$x, Input::post('mur_ot_'.$x, isset($game->{'mur_ot_'.$x}) ? $game->{'mur_ot_'.$x} : ''), ['class' => 'form-control', 'placeholder' => 'Mur OT'.$x]); ?>
                </div>

                <div class="form-group">
                    <?= Form::label('Opp OT'.$x, 'opp_ot_'.$x, ['class' => 'control-label']); ?>

                    <?= Form::input('opp_ot_'.$x, Input::post('opp_ot_'.$x, isset($game->{'opp_ot_'.$x}) ? $game->{'opp_ot_'.$x} : ''), ['class' => 'form-control', 'placeholder' => 'Opp OT'.$x]); ?>
                </div>
                <?php $x++; } ?>

                <div class="form-group">
                    <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

                </div>
                
            </fieldset>


        <?= Form::close(); ?>
    </div>
</div>
