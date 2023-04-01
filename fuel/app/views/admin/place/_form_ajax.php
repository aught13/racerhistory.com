<?= Form::open(['action' => 'ajax/place/create', 'id' => 'ajax_form']); ?>

<fieldset>
    <div class="form-group">
        <?= Form::label('Place name', 'place_name', ['class' => 'control-label']); ?>

        <?= Form::input('place_name', Input::post('place_name', isset($place) ? $place->place_name : ''), ['class' => 'form-control', 'placeholder' => 'Place name']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Place state', 'place_state', ['class' => 'control-label']); ?>

        <?= Form::input('place_state', Input::post('place_state', isset($place) ? $place->place_state : ''), ['class' => 'form-control', 'placeholder' => 'Place state']); ?>
    </div>

    <div class="form-group">
        <?= Form::submit('ajax', 'Save', ['class' => 'btn btn-primary']); ?>
    </div>
</fieldset>


<?= Form::close(); ?>