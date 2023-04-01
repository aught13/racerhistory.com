<?= Form::open(); ?>
<fieldset>
    <div class="form-group">
        <?= Form::label('Place', 'place_id', ['class' => 'control-label']); ?>

        <?= Form::select('place_id', Input::post('place_id', isset($site) ? $site->place_id : ''), $place, ['class' => 'form-control', 'placeholder' => 'Place id']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Site name', 'site_name', ['class' => 'control-label']); ?>

        <?= Form::input('site_name', Input::post('site_name', isset($site) ? $site->site_name : ''), ['class' => 'form-control', 'placeholder' => 'Site name']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Capacity', 'capacity', ['class' => 'control-label']); ?>

        <?= Form::input('capacity', Input::post('capacity', isset($site) ? $site->capacity : ''), ['class' => 'form-control', 'placeholder' => 'Capacity']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Site image', 'site_image', ['class' => 'control-label']); ?>

        <?= Form::input('site_image', Input::post('site_image', isset($site) ? $site->site_image : ''), ['class' => 'form-control', 'placeholder' => 'Site image']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Site info', 'site_info', ['class' => 'control-label']); ?>

        <?= Form::input('site_info', Input::post('site_info', isset($site) ? $site->site_info : ''), ['class' => 'form-control', 'placeholder' => 'Site info']); ?>
    </div>

    <div class="form-group">
        <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

        <div class="pull-right">
            <?php if (Uri::segment(3) === 'edit'): ?>
                <div class="btn-group">
                    <?= Html::anchor('admin/site/view/' . $site->id, 'View', ['class' => 'btn btn-info']); ?>
                    <?= Html::anchor('admin/site', 'Back', ['class' => 'btn btn-default']); ?>
                </div>
            <?php else: ?>
                <?= Html::anchor('admin/site', 'Back', ['class' => 'btn btn-link']); ?>
            <?php endif ?>
        </div>
    </div>
</fieldset>


<?= Form::close(); ?>