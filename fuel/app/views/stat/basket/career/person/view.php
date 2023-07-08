<?php
/**
 * /app/views/stat/basket/career/person/view
 * 
 * career season stat view
 *
 */
?>
<div class="col-sm-<?=
$person->team_season_roster &&
 (isset($stats['FGA']) || isset($stats['FTA']) || isset($stats['TPA'])) ? 12 : 9;
?>table-responsive"> 
    <table class="table table-sm table-striped border">
        <thead>
            <tr>
                <?=
                $person->team_season_roster ?
                    '<th rowspan="2" colspan="1">Season</th>' : '';
                ?>
                <?=
                isset($stats['GP']) ?
                    '<th class="border" rowspan="2" colspan="1">GP</th>' : '';
                ?>                    
                <?=
                isset($stats['GS']) ?
                    '<th name="hide" class="border d-none d-md-table-cell" rowspan="2" colspan="1">GS</th>'
                        : '';
                ?>
                <?=
                (isset($stats['MIN']) && $person->team_season_roster) ?
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
                <?php if ($person->team_season_roster): ?> <!-- Individual Box -->
                    <?php
                    foreach (
                        $person->team_season_roster as $value
                    ):
                        if ($value->stat_basket_season_person):
                            ?>
                        <tr>                    
                            <td class="border d-none d-xl-table-cell">
                        <?=
                        ($value->team_season->semester == 1 ?
                            $value->team_season->seasons->start : ($value->team_season->semester
                            == 2 ?
                                $value->team_season->seasons->start .
                                '-' .
                                date_format(
                                    DateTime::createFromFormat(
                                        'Y', $value->team_season->seasons->end
                                    ), 'y'
                                ) : $value->team_season->seasons->end)
                        ) . ' - ' .
                        $value->team_season->teams->team_name
                        ?>
                            </td>
                            <td class="border d-xl-none">
                                <?=
                                ($value->team_season->semester == 1 ?
                                    $value->team_season->seasons->start : ($value->team_season->semester
                                    == 2 ?
                                        date_format(
                                            DateTime::createFromFormat(
                                                'Y',
                                                $value->team_season->seasons->start
                                            ), 'y'
                                        ) . '-' .
                                        date_format(
                                            DateTime::createFromFormat(
                                                'Y',
                                                $value->team_season->seasons->end
                                            ), 'y'
                                        ) : $value->team_season->seasons->end)
                                ) . ' - ' .
                                $value->team_season->teams->abbr;
                                ?>
                            </td>
                                <?=
                                isset($stats['GP']) ?
                                    '<td class="text-center border">' .
                                    $value->stat_basket_season_person->GP .
                                    '</td>' : '';
                                ?>
                                <?=
                                isset($stats['GS']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">' . $value->stat_basket_season_person->GS . '</td>'
                                        : '';
                                ?>
                            <?=
                            isset($stats['MIN']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">' . $value->stat_basket_season_person->MIN . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['FGM']) ? '<td class="text-center border">' . $value->stat_basket_season_person->FGM . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['FGA']) ? '<td class="text-center border">' . $value->stat_basket_season_person->FGA . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['TPM']) ? '<td class="text-center border">' . $value->stat_basket_season_person->TPM . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['TPA']) ? '<td class="text-center border">' . $value->stat_basket_season_person->TPA . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['FTM']) ? '<td class="text-center border">' . $value->stat_basket_season_person->FTM . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['FTA']) ? '<td class="text-center border">' . $value->stat_basket_season_person->FTA . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['ORB']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">' . $value->stat_basket_season_person->ORB . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['DRB']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">' . $value->stat_basket_season_person->DRB . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['RB']) ? '<td class="text-center border">' . $value->stat_basket_season_person->RB . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['PF']) ? '<td class="text-center border">' . $value->stat_basket_season_person->PF . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['FD']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">' . $value->stat_basket_season_person->FD . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['AST']) ? '<td class="text-center border">' . $value->stat_basket_season_person->AST . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['TRN']) ? '<td class="text-center border">' . $value->stat_basket_season_person->TRN . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['STL']) ? '<td class="text-center border">' . $value->stat_basket_season_person->STL . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['BS']) ? '<td class="text-center border">' . $value->stat_basket_season_person->BS . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['BD']) ? '<td name="hide" class="text-center border d-none d-md-table-cell">' . $value->stat_basket_season_person->BD . '</td>'
                                    : '';
                            ?>
                            <?=
                            isset($stats['PTS']) ? '<td class="text-center border">' . $value->stat_basket_season_person->PTS . '</td>'
                                    : '';
                            ?>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                <tr></tr>
                <?php endif; ?>
        </tbody> 
        <tfoot>
                <?php if ($career): ?>
                <?php foreach ($career as $value): ?>
                <tr>                    
                    <th class="border"><?= 'Total ' . $value['seasons']; ?></th>
                <?=
                isset($stats['GP']) ? '<th class="text-center border">' . $value['GP'] . '</th>'
                        : '';
                ?>
                <?=
                isset($stats['GS']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">' . $value['GS'] . '</th>'
                        : '';
                ?>
    <?=
    isset($stats['MIN']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">' . $value['MIN'] . '</th>'
            : '';
    ?>
                    <?=
                    isset($stats['FGM']) ? '<th class="text-center border">' . $value['FGM'] . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['FGA']) ? '<th class="text-center border">' . $value['FGA'] . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['TPM']) ? '<th class="text-center border">' . $value['TPM'] . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['TPA']) ? '<th class="text-center border">' . $value['TPA'] . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['FTM']) ? '<th class="text-center border">' . $value['FTM'] . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['FTA']) ? '<th class="text-center border">' . $value['FTA'] . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['ORB']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">' . $value['ORB'] . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['DRB']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">' . $value['DRB'] . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['RB']) ? '<th class="text-center border">' . $value['RB'] . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['PF']) ? '<th class="text-center border">' . $value['PF'] . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['FD']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">' . $value['FD'] . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['AST']) ? '<th class="text-center border">' . $value['AST'] . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['TRN']) ? '<th class="text-center border">' . $value['TRN'] . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['STL']) ? '<th class="text-center border">' . $value['STL'] . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['BS']) ? '<th class="text-center border">' . $value['BS'] . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['BD']) ? '<th name="hide" class="text-center border d-none d-md-table-cell">' . $value['BD'] . '</th>'
                            : '';
                    ?>
                    <?=
                    isset($stats['PTS']) ? '<th class="text-center border">' . $value['PTS'] . '</th>'
                            : '';
                    ?>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
        </tfoot>
    </table>
</div>
