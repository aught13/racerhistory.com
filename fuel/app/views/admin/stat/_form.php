<?= Form::open(); ?>
<fieldset>

    <div class="form-group">
        <?= Form::label('Sport id', 'sport_id',['class' => 'control-label']); ?>

	<?= Form::input('sport_id', Input::post('sport_id', isset($stat) ? $stat->sport_id : ''), ['class' => 'form-control', 'placeholder' => 'Sport id']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Stat name', 'stat_name',['class' => 'control-label']); ?>

	<?= Form::input('stat_name', Input::post('stat_name', isset($stat) ? $stat->stat_name : ''), ['class' => 'form-control', 'placeholder' => 'Stat name']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Stat table', 'stat_table',['class' => 'control-label']); ?>

	<?= Form::input('stat_table', Input::post('stat_table', isset($stat) ? $stat->stat_table : ''), ['class' => 'form-control', 'placeholder' => 'Stat table']); ?>
    </div>

    <div class="form-group">
        <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

        <div class="pull-right">
            <?php if (Uri::segment(3) === 'edit'): ?>
                <div class="btn-group">
                    <?= Html::anchor('admin/stat/view/' . $stat->id, 'View', ['class' => 'btn btn-info']); ?>
                    <?= Html::anchor('admin/stat', 'Back', ['class' => 'btn btn-default']); ?>
                </div>
            <?php else: ?>
                <?= Html::anchor('admin/stat', 'Back', ['class' => 'btn btn-link']); ?>
            <?php endif ?>
        </div>
    </div>
</fieldset>


<?= Form::close(); ?>