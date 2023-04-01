<h2>Listing Game Boxes</h2>
<br>

<?php if ($stat_basket_game_boxes): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Game</th>
                    <th>Team</th>
                    <th>Period</th>
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
                    <th>PNT</th>
                    <th>OTO</th>
                    <th>SND</th>
                    <th>FB</th>
                    <th>BN</th>
                    <th>TIED</th>
                    <th>LC</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($stat_basket_game_boxes as $item): ?>
                    <tr>
                        <td><?= $item->games->game_date,$item->games->hrn == '1' ? ' Vs ' : ($item->games->hrn == '2' ? ' @ ' : ' Vs '),$item->games->opponents->opponent_short; ?></td>
                        <td><?= $item->opponent_id == '0' ? 'Murray' : (isset($item->opponent_id) | $item->opponent_id == '' ? 'Not Found' : $item->games->opponents->opponent_abbr); ?></td> <!-- change this to opponent_id and add it to the models -->
                        <td><?= $item->period; ?></td>
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
                        <td><?= $item->PNT; ?></td>
                        <td><?= $item->OTO; ?></td>
                        <td><?= $item->SND; ?></td>
                        <td><?= $item->FB; ?></td>
                        <td><?= $item->BN; ?></td>
                        <td><?= $item->TIED; ?></td>
                        <td><?= $item->LC; ?></td>

                        <td>
                            <?= Html::anchor('admin/stat/basket/game/box/view/' . $item->id, 'View'); ?> |
                            <?= Html::anchor('admin/stat/basket/game/box/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/stat/basket/game/box/delete/' . $item->id, 'Delete', ['onclick' => "return confirm('Are you sure?')"]); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $pagination ?>
<?php else: ?>
    <p>No Stat_basket_game_boxes.</p>
<?php endif; ?>

<p>
    <?= Html::anchor('admin/stat/basket/game/box/create', 'Add new game box', array('class' => 'btn btn-success')); ?>
</p>
