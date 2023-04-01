<?= \Fuel\Core\Uri::segment(4) == 'roster' ? Form::open(['action' => 'ajax/person/create', 'id' => 'ajax_form_person']) : Form::open(); ?>

<fieldset>

    <div class="form-group">
        <?= Form::label('First', 'first', ['class' => 'control-label']); ?>

        <?= Form::input('first', Input::post('first', isset($person) ? $person->first : ''), ['class' => 'form-control', 'placeholder' => 'First']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Last', 'last', ['class' => 'control-label']); ?>

        <?= Form::input('last', Input::post('last', isset($person) ? $person->last : ''), ['class' => 'form-control', 'placeholder' => 'Last']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Full', 'full', ['class' => 'control-label']); ?>

        <?= Form::input('full', Input::post('full', isset($person) ? $person->full : ''), ['class' => 'form-control', 'placeholder' => 'Full']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Display', 'display', ['class' => 'control-label']); ?>

        <?= Form::input('display', Input::post('display', isset($person) ? $person->display : ''), ['class' => 'form-control', 'placeholder' => 'Display']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Birth', 'birth', ['class' => 'control-label']); ?>

        <?= Form::input('birth', Input::post('birth', isset($person) ? $person->birth : ''), ['class' => 'form-control', 'placeholder' => 'Birth']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Death', 'death', ['class' => 'control-label']); ?>

        <?= Form::input('death', Input::post('death', isset($person) ? $person->death : ''), ['class' => 'form-control', 'placeholder' => 'Death']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Person image', 'person_image', ['class' => 'control-label']); ?>

        <?= Form::input('person_image', Input::post('person_image', isset($person) ? $person->person_image : ''), ['class' => 'form-control', 'placeholder' => 'Person image']); ?>
    </div>

    <div class="form-group">
        <?= Form::submit((\Fuel\Core\Uri::segment(4) == 'roster' ? 'axax_team' : 'submit'), 'Save', ['class' => 'btn btn-primary']); ?>

        <div class="pull-right">
            <?php if (Uri::segment(3) === 'edit'): ?>
                <div class="btn-group">
                    <?= Html::anchor('admin/person/view/' . $person->id, 'View', ['class' => 'btn btn-info']); ?>
                    <?= Html::anchor('admin/person', 'Back', ['class' => 'btn btn-default']); ?>
                </div>
            <?php else: ?>
                <?= Html::anchor('admin/person', 'Back', ['class' => 'btn btn-link']); ?>
            <?php endif ?>
        </div>
    </div>
</fieldset>


<?= Form::close(); ?>