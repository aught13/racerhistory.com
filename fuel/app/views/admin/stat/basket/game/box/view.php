<h2>Viewing #<?= $stat_basket_game_box->id; ?></h2>
<br>

<dl class="dl-horizontal">
    <dt>Id</dt>
    <dd><?= $stat_basket_game_box->id; ?></dd>
    <br>
    <dt>Game id</dt>
    <dd><?= $stat_basket_game_box->game_id; ?></dd>
    <br>
    <dt>Period</dt>
    <dd><?= $stat_basket_game_box->period; ?></dd>
    <br>
    <dt>FGM</dt>
    <dd><?= $stat_basket_game_box->FGM; ?></dd>
    <br>
    <dt>FGA</dt>
    <dd><?= $stat_basket_game_box->FGA; ?></dd>
    <br>
    <dt>TPM</dt>
    <dd><?= $stat_basket_game_box->TPM; ?></dd>
    <br>
    <dt>TPA</dt>
    <dd><?= $stat_basket_game_box->TPA; ?></dd>
    <br>
    <dt>FTM</dt>
    <dd><?= $stat_basket_game_box->FTM; ?></dd>
    <br>
    <dt>FTA</dt>
    <dd><?= $stat_basket_game_box->FTA; ?></dd>
    <br>
    <dt>ORB</dt>
    <dd><?= $stat_basket_game_box->ORB; ?></dd>
    <br>
    <dt>DRB</dt>
    <dd><?= $stat_basket_game_box->DRB; ?></dd>
    <br>
    <dt>RB</dt>
    <dd><?= $stat_basket_game_box->RB; ?></dd>
    <br>
    <dt>AST</dt>
    <dd><?= $stat_basket_game_box->AST; ?></dd>
    <br>
    <dt>STL</dt>
    <dd><?= $stat_basket_game_box->STL; ?></dd>
    <br>
    <dt>BS</dt>
    <dd><?= $stat_basket_game_box->BS; ?></dd>
    <br>
    <dt>TRN</dt>
    <dd><?= $stat_basket_game_box->TRN; ?></dd>
    <br>
    <dt>PF</dt>
    <dd><?= $stat_basket_game_box->PF; ?></dd>
    <br>
    <dt>TF</dt>
    <dd><?= $stat_basket_game_box->TF; ?></dd>
    <br>
    <dt>PTS</dt>
    <dd><?= $stat_basket_game_box->PTS; ?></dd>
    <br>
    <dt>PNT</dt>
    <dd><?= $stat_basket_game_box->PNT; ?></dd>
    <br>
    <dt>OTO</dt>
    <dd><?= $stat_basket_game_box->OTO; ?></dd>
    <br>
    <dt>SND</dt>
    <dd><?= $stat_basket_game_box->SND; ?></dd>
    <br>
    <dt>FB</dt>
    <dd><?= $stat_basket_game_box->FB; ?></dd>
    <br>
    <dt>BN</dt>
    <dd><?= $stat_basket_game_box->BN; ?></dd>
    <br>
    <dt>TIED</dt>
    <dd><?= $stat_basket_game_box->TIED; ?></dd>
    <br>
    <dt>LC</dt>
    <dd><?= $stat_basket_game_box->LC; ?></dd>
    <br>
</dl>

<div class="btn-group">
    <?= Html::anchor('admin/stat/basket/game/box/edit/'.$stat_basket_game_box->id, 'Edit', ['class' => 'btn btn-warning']); ?>
    <?= Html::anchor('admin/stat/basket/game/box', 'Back', ['class' => 'btn btn-default']); ?>
</div>
