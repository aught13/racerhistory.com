<?= Form::open(); ?>
<?= Form::hidden('game_id', Input::post('game_id', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->game_id : $game->id), ); ?>
<?= Form::hidden('GP', Input::post('GP', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->GP : '1'), ); ?>
<fieldset>

    <div class="form-group">    
        <?= Form::label('Period', 'period',['class' => 'control-label']); ?>

	<?= Form::select('period', Input::post('period', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->period : ''), $periods, []); ?>
    </div>

</fieldset>
<div class="row">
    <div class="col-sm-12">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Pos</th>
                    <th>GS</th>
                    <th>MIN</th>
                    <th>FGM</th>
                    <th>FGA</th>
                    <th>TPM</th>
                    <th>TPA</th>
                    <th>FTM</th>
                    <th>FTA</th>
                    <th>ORB</th>
                    <th>DRB</th>
                    <th>RB</th>
                    <th>PF</th>
                    <th>FD</th>
                    <th>PTS</th>
                    <th>AST</th>
                    <th>TO</th>
                    <th>ST</th>
                    <th>BS</th>
                    <th>BA</th>
                    <th>TF</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= Form::input('jersey', Input::post('jersey', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->jersey : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('name', Input::post('name', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->name : ''), ['size'=>'6']); ?></td>
                    <td><?= Form::input('position', Input::post('position', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->position : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::checkbox('GS', Input::post('GS', '1'), isset($stat_basket_game_opponent) ? ($stat_basket_game_opponent->GS == '1' ? true : false) : false); ?></td>
                    <td><?= Form::input('MIN', Input::post('MIN', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->MIN : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('FGM', Input::post('FGM', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->FGM : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('FGA', Input::post('FGA', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->FGA : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('TPM', Input::post('TPM', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->TPM : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('TPA', Input::post('TPA', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->TPA : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('FTM', Input::post('FTM', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->FTM : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('FTA', Input::post('FTA', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->FTA : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('ORB', Input::post('ORB', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->ORB : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('DRB', Input::post('DRB', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->DRB : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('RB', Input::post('RB', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->RB : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('PF', Input::post('PF', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->PF : ''), ['size'=>'1']); ?></td>
                    <td><?= Form::input('FD', Input::post('FD', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->FD : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('PTS', Input::post('PTS', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->PTS : ''), ['size'=>'3']); ?></td>
                    <td><?= Form::input('AST', Input::post('AST', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->AST : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('TRN', Input::post('TRN', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->TRN : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('STL', Input::post('STL', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->STL : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('BS', Input::post('BS', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->BS : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('BD', Input::post('BD', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->BD : ''), ['size'=>'2']); ?></td>
                    <td><?= Form::input('TF', Input::post('TF', isset($stat_basket_game_opponent) ? $stat_basket_game_opponent->TF : ''), ['size'=>'1']); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    <div class="form-group">
        <?= Form::submit('submit', 'Save', ['class' => 'btn btn-primary']); ?>

        <div class="pull-right">
            <?php if (Uri::segment(3) === 'edit'): ?>
                <div class="btn-group">
                    <?= Html::anchor('admin/game/view/'.$game->id, 'Back', ['class' => 'btn btn-default']); ?>
                </div>
            <?php else: ?>
                <?= Html::anchor('admin/game/view/'.$game->id, 'Back', ['class' => 'btn btn-link']); ?>
            <?php endif ?>
        </div>
    </div>



<?= Form::close(); ?>