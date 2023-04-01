<h2>Listing Stat_basket_game_opponents</h2>
<br>

<?php if ($stat_basket_game_opponents): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Game id</th>
                    <th>Period</th>
                    <th>Name</th>
                    <th>Jersey</th>
                    <th>Position</th>
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
                    <th>BD</th>
                    <th>TRN</th>
                    <th>PF</th>
                    <th>TF</th>
                    <th>FD</th>
                    <th>PTS</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($stat_basket_game_opponents as $item): ?>
                    <tr>
                        <td><?= $item->id; ?></td>
                        <td><?= $item->game_id; ?></td>
                        <td><?= $item->period; ?></td>
                        <td><?= $item->name; ?></td>
                        <td><?= $item->jersey; ?></td>
                        <td><?= $item->position; ?></td>
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
                        <td><?= $item->BD; ?></td>
                        <td><?= $item->TRN; ?></td>
                        <td><?= $item->PF; ?></td>
                        <td><?= $item->TF; ?></td>
                        <td><?= $item->FD; ?></td>
                        <td><?= $item->PTS; ?></td>

                        <td>
                            <?= Html::anchor('admin/stat/basket/game/opponent/view/' . $item->id, 'View'); ?> |
                            <?= Html::anchor('admin/stat/basket/game/opponent/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/stat/basket/game/opponent/delete/' . $item->id, 'Delete', ['onclick' => "return confirm('Are you sure?')"]); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $pagination ?>
<?php else: ?>
    <p>No Stat_basket_game_opponents.</p>
<?php endif; ?>

<p>
    <?= Html::anchor('admin/stat/basket/game/opponent/create', 'Add new Stat basket game opponent', array('class' => 'btn btn-success')); ?>
</p>
