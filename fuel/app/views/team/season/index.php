<?php
/**
 * /app/views/team/season/index
 * 
 * Team season list
 *
 */
?>
<h2>Seasons</h2>
<br>

<?php if ($team_seasons): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="3"></th>
                    <th colspan="3">Overall</th>
                    <th colspan="3">Conference</th>
                    <th colspan="3"></th>
                </tr>
                <tr>
                    <th>Team</th>
                    <th>Season</th>
                    <th>Conf</th>
                    <th>W</th>
                    <th>L</th>
                    <th>W-L%</th>
                    <th>W</th>
                    <th>L</th>
                    <th>W-L%</th>
                    <th>Conf finish</th>
                    <th>Conf Tourn finish</th>
                    <th>Postseason</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($team_seasons as $item): ?>
                    <tr>
                        <td><?= $item->teams->team_name; ?></td>
                        <td>
                        <?=
                            Html::anchor(
                                '/team/season/view/'. $item->id,
                                $item->semester == 1 ?
                                $item->seasons->start
                                : ($item->semester == 2 ?
                                $item->seasons->start . '-' .
                                date_format(
                                    DateTime::createFromFormat(
                                        'Y',
                                        $item->seasons->end
                                    ), 'y'
                                ) : $item->seasons->end));
                        ?>
                        </td>
                        <td></td>
                        <td><?= $records[$item->id]['w'] ;?></td>
                        <td><?= $records[$item->id]['l'] ;?></td>
                        <td>
                        <?= 
                            intval($records[$item->id]['w']) + 
                            intval($records[$item->id]['l']) == 0 ?
                            '' 
                            : number_format((float)
                                (intval($records[$item->id]['w']) /
                                    (intval($records[$item->id]['w']) + 
                                    intval($records[$item->id]['l'])))
                                , 3);
                        ?>
                        </td>
                        <td><?= $records[$item->id]['cw'] ;?></td>
                        <td><?= $records[$item->id]['cl'] ;?></td>
                        <td>
                        <?= 
                            intval($records[$item->id]['cw']) + 
                            intval($records[$item->id]['cl']) == 0 ?
                            '' 
                            : number_format((float)
                                (intval($records[$item->id]['cw']) /
                                    (intval($records[$item->id]['cw']) + 
                                    intval($records[$item->id]['cl'])))
                                , 3);
                        ?></td>
                        <td><?= $item->league_finish; ?></td>
                        <td><?= $item->league_torunament_finish; ?></td>
                        <td><?= $item->last_post_game; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $pagination ?>
<?php else: ?>
    <p>No Team Seasons.</p>
<?php endif; ?>
