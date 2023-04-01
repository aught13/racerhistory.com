<?= Form::open(); ?>
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
        <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

        <div class="pull-right">
            <?php if (Uri::segment(3) === 'edit'): ?>
                <div class="btn-group">
                    <?= Html::anchor('admin/season/view/' . $season->id, 'View', ['class' => 'btn btn-info']); ?>
                    <?= Html::anchor('admin/season', 'Back', ['class' => 'btn btn-default']); ?>
                </div>
            <?php else: ?>
                <?= Html::anchor('admin/season', 'Back', ['class' => 'btn btn-link']); ?>
            <?php endif ?>
        </div>
    </div>
</fieldset>


<?= Form::close(); ?>