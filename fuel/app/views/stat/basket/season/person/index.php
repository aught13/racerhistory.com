<?php 
/**
 * /app/views/stat/basket/season/person/index
 * 
 * Single season stats index
 *
 */
?>
<h2>Listing Player Season Stats</h2>
<br>

<?php if ($stat_basket_season_people): ?>
    <div class="table-responsive">
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>Person</th>
                    <th>Season</th>
                    <th>GP</th>
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
                    <th>AST</th>
                    <th>STL</th>
                    <th>BS</th>
                    <th>TRN</th>
                    <th>PF</th>
                    <th>TF</th>
                    <th>PTS</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($stat_basket_season_people as $item): ?>
                    <tr>
                        <td><?= $item->team_season_roster->persons->display; ?></td>
                        <td><?= $item->team_season_roster->team_season->seasons->start.'-'.$item->team_season_roster->team_season->seasons->end; ?></td>
                        <td><?= $item->GP; ?></td>
                        <td><?= $item->GS; ?></td>
                        <td><?= $item->MIN; ?></td>
                        <td><?= $item->FGM; ?></td>
                        <td><?= $item->FGA; ?></td>
                        <td><?= $item->TPM; ?></td>
                        <td><?= $item->TPA; ?></td>
                        <td><?= $item->FTM; ?></td>
                        <td><?= $item->FTA; ?></td>
                        <td><?= $item->ORB; ?></td>
                        <td><?= $item->DRB; ?></td>
                        <td><?= $item->RB; ?></td>
                        <td><?= $item->AST; ?></td>
                        <td><?= $item->STL; ?></td>
                        <td><?= $item->BS; ?></td>
                        <td><?= $item->TRN; ?></td>
                        <td><?= $item->PF; ?></td>
                        <td><?= $item->TF; ?></td>
                        <td><?= $item->PTS; ?></td>

                        <td>
                            <?= Html::anchor('stat/basket/season/person/view/' . $item->id, 'View'); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $pagination ?>
<?php else: ?>
    <p>No Stats.</p>
<?php endif; ?>
