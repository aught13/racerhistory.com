<?= Form::open(); ?>
<fieldset>

    <div class="form-group">
        <?= Form::label('Sport name', 'sport_name',['class' => 'control-label']); ?>

	<?= Form::input('sport_name', Input::post('sport_name', isset($sport) ? $sport->sport_name : ''), ['class' => 'form-control', 'placeholder' => 'Sport name']); ?>
    </div>

    <div class="form-group">
        <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

        <div class="pull-right">
            <?php if (Uri::segment(3) === 'edit'): ?>
                <div class="btn-group">
                    <?= Html::anchor('admin/sport/view/' . $sport->id, 'View', ['class' => 'btn btn-info']); ?>
                    <?= Html::anchor('admin/sport', 'Back', ['class' => 'btn btn-default']); ?>
                </div>
            <?php else: ?>
                <?= Html::anchor('admin/sport', 'Back', ['class' => 'btn btn-link']); ?>
            <?php endif ?>
        </div>
    </div>
</fieldset>


<?= Form::close(); ?>