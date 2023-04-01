<?= Form::open(['action' => 'ajax/season/create', 'id' => 'ajax_form_season']); ?>
<fieldset>

    <div class="form-group">
        <?= Form::label('Season Start', 'start', ['class' => 'control-label']); ?>

        <?= Form::input('start', Input::post('start', isset($season) ? $season->start : ''), ['class' => 'form-control', 'placeholder' => 'YYYY']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Season End', 'end', ['class' => 'control-label']); ?>

        <?= Form::input('end', Input::post('end', isset($season) ? $season->end : ''), ['class' => 'form-control', 'placeholder' => 'YYYY']); ?>
    </div>

    <div class="form-group">
        <?= Form::submit('ajax_season', 'Save', ['class' => 'btn btn-primary']); ?>

    </div>
</fieldset>


<?= Form::close(); ?>