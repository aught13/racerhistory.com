<h2>Points per period</h2>
<br>

<div class="row">
    <div class="col-md-6">
        <?= Form::open(); ?>
        
        <div class="row">
            <div class="col-sm-12">
                <table class='table table-condensed table-bordered '>
                    <thead>
                        <tr>
                            <th></th>
                            <?php if ($game->pts_mur ?? false) : ?>
                            <?php $x=1;
                                //add columns dynamicaly as needed
                                while ($x <= $periods) { 
                                echo '<th>'.$x.'</th>';
                                $x++;
                                } ?>
                            <?php $x=1;
                                while ($x <= $ot) {
                                echo '<th>OT'.$x.'</th>';
                                $x++;
                                } ?>
                            <?php endif; ?>
                            <th>F</th>
                            <th>OT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>MURRAY</td>                            
                            <?php if ($game->pts_mur ?? '') : ?>
                            <?php $x=1;
                                //set values dynamically as needed
                                while ($x <= $periods) {
                                echo '<td>'.Form::input('mur_'.$x, Input::post('mur_'.$x, $game->{'mur_'.$x} ?? ''),  ['size'=>'2']).'</td>';
                                $x++;
                                } ?>
                            <?php $x=1;
                                while ($x <= $ot) {
                                echo '<td>'.Form::input('mur_ot_'.$x, Input::post('mur_ot_'.$x, $game->{'mur_ot_'.$x} ?? ''), ['size' => '2']).'</td>';
                                $x++;
                                } ?>
                            <?php endif; ?>
                            <td><?= Form::input('pts_mur', Input::post('pts_mur', $game->pts_mur ?? ''), ['size' => '3']); ?></td>
                            <td rowspan="2"><?= Form::input('ot', Input::post('ot', $game->ot ?? ''), ['size' => '1']); ?></td>
                        </tr>
                        <tr>
                            <td><?= $game->opponents->opponent_short; ?></td>
                            <?php if ($game->pts_mur ?? '') : ?>
                            <?php $x=1;
                                //set values dynamically as needed
                                while ($x <= $periods) {
                                echo '<td>'.Form::input('opp_'.$x, Input::post('opp_'.$x, $game->{'opp_'.$x} ?? ''),  ['size'=>'2']).'</td>';
                                $x++;
                                } ?>
                            <?php $x=1;
                                while ($x <= $ot) {
                                echo '<td>'.Form::input('opp_ot_'.$x, Input::post('opp_ot_'.$x, $game->{'opp_ot_'.$x} ?? ''), ['size' => '2']).'</td>';
                                $x++;
                                } ?>
                            <?php endif; ?>
                            <td><?=Form::input('pts_opp', Input::post('pts_opp', $game->pts_opp ?? ''), ['size' => '3']); ?></td>
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
    </div>
</div>
