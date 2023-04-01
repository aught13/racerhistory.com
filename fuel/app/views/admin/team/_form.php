<?= Form::open(); ?>
<fieldset>
    
    <div class="form-group">
        <?= Form::label('Sport', 'sport_id', ['class' => 'control-label']); ?>

        <?= Form::select('sport_id', Input::post('sport_id', isset($team) ? $team->sport_id : ''), $sports, ['class' => 'form-control', 'placeholder' => 'Team name']); ?>
    </div>
    
    <div class="form-group">
        <?= Form::label('Team name', 'team_name', ['class' => 'control-label']); ?>

        <?= Form::input('team_name', Input::post('team_name', isset($team) ? $team->team_name : ''), ['class' => 'form-control', 'placeholder' => 'Team name']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Team description', 'team_description', ['class' => 'control-label']); ?>

        <?= Form::input('team_description', Input::post('team_description', isset($team) ? $team->team_description : ''), ['class' => 'form-control', 'placeholder' => 'Team description']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Abbr', 'abbr', ['class' => 'control-label']); ?>

        <?= Form::input('abbr', Input::post('abbr', isset($team) ? $team->abbr : ''), ['class' => 'form-control', 'placeholder' => 'i.e. WBB']); ?>
    </div>

    <div class="form-group">
        <?= Form::label('Gender', 'gender', ['class' => 'control-label']); ?>

        <?= Form::select('gender', Input::post('gender', isset($team) ? $team->gender : ''),['W' => 'Women', 'M' => 'Men', 'C' => 'Coed'], ['class' => 'form-control', 'placeholder' => 'Gender']); ?>
    </div>

    <div class="form-group">
        <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

        <div class="pull-right">
            <?php if (Uri::segment(3) === 'edit'): ?>
                <div class="btn-group">
                    <?= Html::anchor('admin/team/view/' . $team->id, 'View', ['class' => 'btn btn-info']); ?>
                    <?= Html::anchor('admin/team', 'Back', ['class' => 'btn btn-default']); ?>
                </div>
            <?php else: ?>
                <?= Html::anchor('admin/team', 'Back', ['class' => 'btn btn-link']); ?>
            <?php endif ?>
        </div>
    </div>
</fieldset>


<?php echo Form::close(); ?>