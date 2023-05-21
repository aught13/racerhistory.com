<?php 
/**
 * /app/views/stat/basket/season/person/view
 * 
 * Single season stat view
 *
 */
?>
<h2><span class='muted'><?= $stat_basket_season_person->team_season_roster->persons->display; ?> <?= $stat_basket_season_person->team_season_roster->team_season->seasons->start.'-'.$stat_basket_season_person->team_season_roster->team_season->seasons->end; ?></span></h2>
<hr>
<?php if ($stat_basket_season_person): ?>
    <div class="table-responsive">
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th></th>
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
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th>Total</th>
                    <th><?= $stat_basket_season_person->GP; ?></th>
                    <th><?= $stat_basket_season_person->GS; ?></th>
                    <th><?= $stat_basket_season_person->MIN; ?></th>
                    <th><?= $stat_basket_season_person->FGM; ?></th>
                    <th><?= $stat_basket_season_person->FGA; ?></th>
                    <th><?= $stat_basket_season_person->TPM; ?></th>
                    <th><?= $stat_basket_season_person->TPA; ?></th>
                    <th><?= $stat_basket_season_person->FTM; ?></th>
                    <th><?= $stat_basket_season_person->FTA; ?></th>
                    <th><?= $stat_basket_season_person->ORB; ?></th>
                    <th><?= $stat_basket_season_person->DRB; ?></th>
                    <th><?= $stat_basket_season_person->RB; ?></th>
                    <th><?= $stat_basket_season_person->AST; ?></th>
                    <th><?= $stat_basket_season_person->STL; ?></th>
                    <th><?= $stat_basket_season_person->BS; ?></th>
                    <th><?= $stat_basket_season_person->TRN; ?></th>
                    <th><?= $stat_basket_season_person->PF; ?></th>
                    <th><?= $stat_basket_season_person->TF; ?></th>
                    <th><?= $stat_basket_season_person->PTS; ?></th>
                </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <p>No Stats.</p>
<?php endif; ?>