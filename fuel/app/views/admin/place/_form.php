<?= Form::open(); ?>

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
        <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

        <div class="pull-right">
            <?php if (Uri::segment(3) === 'edit'): ?>
                <div class="btn-group">
                    <?= Html::anchor('admin/place/view/' . $place->id, 'View', ['class' => 'btn btn-info']); ?>
                    <?= Html::anchor('admin/place', 'Back', ['class' => 'btn btn-default']); ?>
                </div>
            <?php else: ?>
                <?= Html::anchor('admin/place', 'Back', ['class' => 'btn btn-link']); ?>
            <?php endif ?>
        </div>
    </div>
</fieldset>


<?= Form::close(); ?>