<?= Form::open(); ?>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>&nbsp;&nbsp;GP&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;GS&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;&nbsp;MIN&nbsp;&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;FGM&nbsp;</th>
                <th>&nbsp;&nbsp;FGA&nbsp;</th>
                <th>&nbsp;&nbsp;TPM&nbsp;</th>
                <th>&nbsp;&nbsp;TPA&nbsp;</th>
                <th>&nbsp;&nbsp;FTM&nbsp;</th>
                <th>&nbsp;&nbsp;FTA&nbsp;</th>
                <th>&nbsp;&nbsp;ORB&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;DRB&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;&nbsp;&nbsp;RB&nbsp;&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;AST&nbsp;</th>
                <th>&nbsp;&nbsp;STL&nbsp;</th>
                <th>&nbsp;&nbsp;BS&nbsp;&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;TRN&nbsp;</th>
                <th>&nbsp;&nbsp;PF&nbsp;&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;TF&nbsp;&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;&nbsp;PTS&nbsp;&nbsp;&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?= isset($stat_basket_season_person) ? $stat_basket_season_person->team_season_roster->persons->full : (isset($roster_player) ? $roster_player->persons->full : ''); ?>
                    <?= Form::hidden('team_season_roster_id', Input::post('team_season_roster_id', isset($stat_basket_season_person) ? $stat_basket_season_person->team_season_roster_id : (isset($roster_player) ? $roster_player->id : ''))); ?>
                </td>
                <td>
                    <?= Form::input('GP', Input::post('GP', isset($stat_basket_season_person) ? $stat_basket_season_person->GP : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('GS', Input::post('GS', isset($stat_basket_season_person) ? $stat_basket_season_person->GS : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('MIN', Input::post('MIN', isset($stat_basket_season_person) ? $stat_basket_season_person->MIN : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('FGM', Input::post('FGM', isset($stat_basket_season_person) ? $stat_basket_season_person->FGM : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('FGA', Input::post('FGA', isset($stat_basket_season_person) ? $stat_basket_season_person->FGA : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('TPM', Input::post('TPM', isset($stat_basket_season_person) ? $stat_basket_season_person->TPM : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('TPA', Input::post('TPA', isset($stat_basket_season_person) ? $stat_basket_season_person->TPA : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('FTM', Input::post('FTM', isset($stat_basket_season_person) ? $stat_basket_season_person->FTM : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('FTA', Input::post('FTA', isset($stat_basket_season_person) ? $stat_basket_season_person->FTA : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('ORB', Input::post('ORB', isset($stat_basket_season_person) ? $stat_basket_season_person->ORB : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('DRB', Input::post('DRB', isset($stat_basket_season_person) ? $stat_basket_season_person->DRB : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('RB', Input::post('RB', isset($stat_basket_season_person) ? $stat_basket_season_person->RB : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('AST', Input::post('AST', isset($stat_basket_season_person) ? $stat_basket_season_person->AST : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('STL', Input::post('STL', isset($stat_basket_season_person) ? $stat_basket_season_person->STL : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('BS', Input::post('BS', isset($stat_basket_season_person) ? $stat_basket_season_person->BS : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('TRN', Input::post('TRN', isset($stat_basket_season_person) ? $stat_basket_season_person->TRN : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('PF', Input::post('PF', isset($stat_basket_season_person) ? $stat_basket_season_person->PF : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('TF', Input::post('TF', isset($stat_basket_season_person) ? $stat_basket_season_person->TF : ''),['class' => 'form-control input-sm']); ?>
                </td>
                <td>
                    <?= Form::input('PTS', Input::post('PTS', isset($stat_basket_season_person) ? $stat_basket_season_person->PTS : ''),['class' => 'form-control input-sm']); ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>    

<div class="form-group">
    <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>
    <?= Html::anchor('admin/team/season/view/'.(isset($stat_basket_season_person) ? $stat_basket_season_person->team_season_roster->team_season_id : (isset($roster_player) ? $roster_player->team_season_id : '')), 'Back', ['class' => 'btn btn-link']); ?>
</div>

<?= Form::close(); ?>