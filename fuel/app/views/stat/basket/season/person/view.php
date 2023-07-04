<?php
/**
 * /app/views/stat/basket/season/person/view
 * 
 * Single season stat view
 *
 */
?>
<?php if ($season_person ?? false): ?>
<?php if (Uri::segment(1) == 'stat') : ?>
<h2>
    <span class='muted'>
        <?=
        $season_person->team_season_roster->persons->display .
        ' ' . $season_person
        ->team_season_roster
        ->team_season->seasons->start .
        '-' . $season_person
        ->team_season_roster
        ->team_season->seasons->end;
        ?>
    </span>
</h2>
<?php endif; ?>
<div class="col-sm-<?=
$season_person->team_season_roster &&
 (isset($stats['FGA']) || isset($stats['FTA']) || isset($stats['TPA'])) ? 12 : 9;
?>table-responsive"> 
    <table class="table table-sm table-striped border">
        <thead>
            <tr>
                <th rowspan="2" colspan="1">Game</th>
                <?=
                isset($stats['GS']) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell" rowspan="2" colspan="1">GS</th>'
                        : '';
                ?>
                <?=
                (isset($stats['MIN']) && $season_person->team_season_roster) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell" rowspan="2" colspan="1">Min</th>'
                        : '';
                ?>
                <th class="text-center border " rowspan="<?=
                isset($stats['FGA']) ? 1 : 2;
                ?>" colspan="<?= isset($stats['FGA']) ? 2 : 1; ?>">FG</th>
                    <?=
                    isset($stats['TPM']) ?
                        '<th class="text-center border" rowspan="1" colspan="' .
                        (isset($stats['TPA']) ? 2 : 1) .
                        '">3P</th>' : '';
                    ?>
                <th class="text-center border" rowspan="<?=
                    isset($stats['FTA']) ? 1 : 2;
                    ?>" colspan="<?= isset($stats['FTA']) ? 2 : 1; ?>">FT</th>
                    <?=
                    isset($stats['ORB']) ?
                        '<th name="hide" class="text-center border d-none d-md-table-cell" rowspan="1" colspan="' .
                        (isset($stats['DRB']) ?
                            3 : 2) . '">Rebounds</th><th name="show" class="border d-md-none"rowspan="2" colspan="1">RB</th>'
                            : (isset($stats['RB']) ?
                            '<th class="text-center border" rowspan="2" colspan="1">RB</th>'
                                : '');
                    ?>
                    <?=
                    isset($stats['PF']) ?
                        '<th name="hide" class="text-center border d-none d-md-table-cell" rowspan="' .
                        (isset($stats['FD']) ? 1 : 2) .
                        '" colspan="' . (isset($stats['FD']) ? 2 : 1) .
                        '">' . (isset($stats['FD']) ? 'Fouls' : 'PF')
                        . '</th><th name="show" class="text-center border d-md-none"rowspan="2" colspan="1">PF</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['AST']) ?
                        '<th class="border text-center" rowspan="2" colspan="1">AS</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['TRN']) ?
                        '<th class="border text-center" rowspan="2" colspan="1">TO</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['STL']) ?
                        '<th class="border text-center" rowspan="2" colspan="1">ST</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['BS']) ?
                        '<th name="hide" class="text-center border d-none d-md-table-cell" rowspan="' .
                        (isset($stats['BD']) ? 1 : 2) . '" colspan="' .
                        (isset($stats['BD']) ? 2 : 1) . '">' .
                        (isset($stats['BD']) ? 'Blocks' : 'BS') .
                        '</th><th name="show" class="text-center border d-md-none"rowspan="2" colspan="1">BS</th>'
                            : '';
                    ?>
                <th class="text-center" rowspan="2" colspan="1">PTS</th>
            </tr>
            <tr>
                <?=
                isset($stats['FGA']) ?
                    '<th class="border text-center">M</th>' : '';
                ?>
                <?=
                isset($stats['FGA']) ?
                    '<th class="border text-center">A</th>' : '';
                ?>
                <?=
                isset($stats['TPA']) ?
                    '<th class="border text-center">M</th>' : '';
                ?>
                <?=
                isset($stats['TPA']) ?
                    '<th class="border text-center">A</th>' : '';
                ?>
                <?=
                isset($stats['FTA']) ?
                    '<th class="border text-center">M</th>' : '';
                ?>
                <?=
                isset($stats['FTA']) ?
                    '<th class="border text-center">A</th>' : '';
                ?>
                <?=
                isset($stats['ORB']) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell">OR</th>'
                        : '';
                ?>
                <?=
                isset($stats['DRB']) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell">DR</th>'
                        : '';
                ?>
                <?=
                (isset($stats['ORB']) || isset($stats['DRB'])) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell">TOT</th>'
                        : '';
                ?>
                <?=
                isset($stats['FD']) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell ">PF</th>'
                        : '';
                ?>
                <?=
                isset($stats['FD']) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell">FD</th>'
                        : '';
                ?>
                <?=
                isset($stats['BD']) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell">BS</th>'
                        : '';
                ?>
                <?=
                isset($stats['BD']) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell">BA</th>'
                        : '';
                ?>
            </tr>
        </thead>
        <tbody>
            <?php if ($season_games): ?> <!-- Individual Box -->
                <?php
                $count = 0;
                foreach ($season_games as $value) : ?>
                    <tr>                    
                        <td class="border d-none d-xl-table-cell">
                        <?= 
                        date_format(date_create($value->games->game_date), 'm-d-Y') .
                        ' ' . ($value->games->hrn == 1 ? 'Vs' : 
                            ($value->games->hrn == 2 ? '@' : 'Vs')) .
                        ' ' . $value->games->opponents->opponent_short;
                        ?>
                        </td>
                        <td class="border d-xl-none">
                         <?= 
                        date_format(date_create($value->games->game_date), 'm-d-Y') .
                        ' ' . ($value->games->hrn == 1 ? 'Vs' : 
                            ($value->games->hrn == 2 ? '@' : 'Vs')) .
                        ' ' . $value->games->opponents->opponent_abbr;
                        ?>
                        </td>
                        <?=
                        isset($stats['GS']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">' . (!empty($value->GS) ? '*' : '')  . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['MIN']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">' . $value->MIN . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['FGM']) ? '<td class="text-center border">' . $value->FGM . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['FGA']) ? '<td class="text-center border">' . $value->FGA . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['TPM']) ? '<td class="text-center border">' . $value->TPM . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['TPA']) ? '<td class="text-center border">' . $value->TPA . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['FTM']) ? '<td class="text-center border">' . $value->FTM . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['FTA']) ? '<td class="text-center border">' . $value->FTA . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['ORB']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">' . $value->ORB . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['DRB']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">' . $value->DRB . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['RB']) ? '<td class="text-center border">' . $value->RB . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['PF']) ? '<td class="text-center border">' . $value->PF . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['FD']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">' . $value->FD . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['AST']) ? '<td class="text-center border">' . $value->AST . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['TRN']) ? '<td class="text-center border">' . $value->TRN . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['STL']) ? '<td class="text-center border">' . $value->STL . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['BS']) ? '<td class="text-center border">' . $value->BS . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['BD']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">' . $value->BD . '</td>'
                                : '';
                        ?>
                        <?=
                        isset($stats['PTS']) ? '<td class="text-center border">' . $value->PTS . '</td>'
                                : '';
                        ?>
                    </tr>
                <?php $count ++; ?>    
                <?php endforeach; ?>
            <?php else: ?>
            <tr></tr>
            <?php endif; ?>
        </tbody> 
        <tfoot>
            <?php if ($count > 15) : ?>
            <tr>
                <th rowspan="2" colspan="1"></th>
                <?=
                isset($stats['GS']) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell" rowspan="2" colspan="1">GS</th>'
                        : '';
                ?>                
                <?=
                (isset($stats['MIN']) && $season_person->team_season_roster) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell" rowspan="2" colspan="1">Min</th>'
                        : '';
                ?>
                <th class="text-center border " rowspan="<?=
                isset($stats['FGA']) ? 1 : 2;
                ?>" colspan="<?= isset($stats['FGA']) ? 2 : 1; ?>">FG</th>
                    <?=
                    isset($stats['TPM']) ?
                        '<th class="text-center border" rowspan="1" colspan="' .
                        (isset($stats['TPA']) ? 2 : 1) .
                        '">3P</th>' : '';
                    ?>
                <th class="text-center border" rowspan="<?=
                    isset($stats['FTA']) ? 1 : 2;
                    ?>" colspan="<?= isset($stats['FTA']) ? 2 : 1; ?>">FT</th>
                    <?=
                    isset($stats['ORB']) ?
                        '<th name="hide" class="text-center border d-none d-md-table-cell" rowspan="1" colspan="' .
                        (isset($stats['DRB']) ?
                            3 : 2) . '">Rebounds</th><th name="show" class="border d-md-none"rowspan="2" colspan="1">RB</th>'
                            : (isset($stats['RB']) ?
                            '<th class="text-center border" rowspan="2" colspan="1">RB</th>'
                                : '');
                    ?>
                    <?=
                    isset($stats['PF']) ?
                        '<th name="hide" class="text-center border d-none d-md-table-cell" rowspan="' .
                        (isset($stats['FD']) ? 1 : 2) .
                        '" colspan="' . (isset($stats['FD']) ? 2 : 1) .
                        '">' . (isset($stats['FD']) ? 'Fouls' : 'PF')
                        . '</th><th name="show" class="text-center border d-md-none"rowspan="2" colspan="1">PF</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['AST']) ?
                        '<th class="border text-center" rowspan="2" colspan="1">AS</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['TRN']) ?
                        '<th class="border text-center" rowspan="2" colspan="1">TO</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['STL']) ?
                        '<th class="border text-center" rowspan="2" colspan="1">ST</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['BS']) ?
                        '<th name="hide" class="text-center border d-none d-md-table-cell" rowspan="' .
                        (isset($stats['BD']) ? 1 : 2) . '" colspan="' .
                        (isset($stats['BD']) ? 2 : 1) . '">' .
                        (isset($stats['BD']) ? 'Blocks' : 'BS') .
                        '</th><th name="show" class="text-center border d-md-none"rowspan="2" colspan="1">BS</th>'
                            : '';
                    ?>
                <th class="text-center" rowspan="2" colspan="1">PTS</th>
            </tr>
            <tr>
                <?=
                isset($stats['FGA']) ?
                    '<th class="border text-center">M</th>' : '';
                ?>
                <?=
                isset($stats['FGA']) ?
                    '<th class="border text-center">A</th>' : '';
                ?>
                <?=
                isset($stats['TPA']) ?
                    '<th class="border text-center">M</th>' : '';
                ?>
                <?=
                isset($stats['TPA']) ?
                    '<th class="border text-center">A</th>' : '';
                ?>
                <?=
                isset($stats['FTA']) ?
                    '<th class="border text-center">M</th>' : '';
                ?>
                <?=
                isset($stats['FTA']) ?
                    '<th class="border text-center">A</th>' : '';
                ?>
                <?=
                isset($stats['ORB']) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell">OR</th>'
                        : '';
                ?>
                <?=
                isset($stats['DRB']) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell">DR</th>'
                        : '';
                ?>
                <?=
                (isset($stats['ORB']) || isset($stats['DRB'])) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell">TOT</th>'
                        : '';
                ?>
                <?=
                isset($stats['FD']) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell ">PF</th>'
                        : '';
                ?>
                <?=
                isset($stats['FD']) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell">FD</th>'
                        : '';
                ?>
                <?=
                isset($stats['BD']) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell">BS</th>'
                        : '';
                ?>
                <?=
                isset($stats['BD']) ?
                    '<th name="hide" class="text-center border d-none d-md-table-cell">BA</th>'
                        : '';
                ?>
            </tr>
            <?php endif; ?>
                <?php if ($season_person): ?>
                <tr>                    
                    <th class="border">Total <?= isset($stats['GP']) ? $season_person->GP. ' Games' : '' ;?></th>
                
                <?=
                isset($stats['GS']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">' . $season_person->GS . '</th>'
                        : '';
                ?>
    <?=
    isset($stats['MIN']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">' . $season_person->MIN . '</th>'
            : '';
    ?>
                    <?=
                    isset($stats['FGM']) ? '<th class="text-center border">' . $season_person->FGM . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['FGA']) ? '<th class="text-center border">' . $season_person->FGA . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['TPM']) ? '<th class="text-center border">' . $season_person->TPM . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['TPA']) ? '<th class="text-center border">' . $season_person->TPA . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['FTM']) ? '<th class="text-center border">' . $season_person->FTM . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['FTA']) ? '<th class="text-center border">' . $season_person->FTA . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['ORB']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">' . $season_person->ORB . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['DRB']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">' . $season_person->DRB . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['RB']) ? '<th class="text-center border">' . $season_person->RB . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['PF']) ? '<th class="text-center border">' . $season_person->PF . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['FD']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">' . $season_person->FD . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['AST']) ? '<th class="text-center border">' . $season_person->AST . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['TRN']) ? '<th class="text-center border">' . $season_person->TRN . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['STL']) ? '<th class="text-center border">' . $season_person->STL . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['BS']) ? '<th class="text-center border">' . $season_person->BS . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['BD']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">' . $season_person->BD . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['PTS']) ? '<th class="text-center border">' . $season_person->PTS . '</th>'
                            : '';
                    ?>
                </tr>
                <?php endif; ?>
        </tfoot>
    </table>
</div>
<?php else: ?>
    <p>No Stats.</p>
<?php endif; ?>