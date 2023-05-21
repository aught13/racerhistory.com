<?php 
/**
 * /app/views/admin/stat/basket/season/person/index
 * 
 * Single season view
 *
 */
?>
<h2>Listing Player Season Stats</h2>
<br>

<?php if ($stat_basket_season_people): ?>
    <div class="table-responsive">
        <table class="table table-striped">
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
                        <td><?= $item->team_season_roster->persons->full; ?></td>
                        <td><?= $item->team_season_roster->team_season->seasons->start.'-'.$item->team_season_roster->team_season->seasons->end.' '.$item->team_season_roster->team_season->teams->team_name; ?></td>
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
                            <?= Html::anchor('admin/stat/basket/season/person/view/' . $item->id, 'View'); ?> |
                            <?= Html::anchor('admin/stat/basket/season/person/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/stat/basket/season/person/delete/' . $item->id, 'Delete', ['onclick' => "return confirm('Are you sure?')"]); ?>
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

<p>
    <?= Html::anchor('admin/stat/basket/season/person/create', 'Add Player Season Stat', array('class' => 'btn btn-success')); ?>
</p>
