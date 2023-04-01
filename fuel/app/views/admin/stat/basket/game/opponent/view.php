<h2>Viewing #<?= $stat_basket_game_opponent->id; ?></h2>
<br>

<dl class="dl-horizontal">
    <dt>Id</dt>
    <dd><?= $stat_basket_game_opponent->id; ?></dd>
    <br>
    <dt>Game id</dt>
    <dd><?= $stat_basket_game_opponent->game_id; ?></dd>
    <br>
    <dt>Period</dt>
    <dd><?= $stat_basket_game_opponent->period; ?></dd>
    <br>
    <dt>Name</dt>
    <dd><?= $stat_basket_game_opponent->name; ?></dd>
    <br>
    <dt>Jersey</dt>
    <dd><?= $stat_basket_game_opponent->jersey; ?></dd>
    <br>
    <dt>Position</dt>
    <dd><?= $stat_basket_game_opponent->position; ?></dd>
    <br>
    <dt>GP</dt>
    <dd><?= $stat_basket_game_opponent->GP; ?></dd>
    <br>
    <dt>GS</dt>
    <dd><?= $stat_basket_game_opponent->GS; ?></dd>
    <br>
    <dt>MIN</dt>
    <dd><?= $stat_basket_game_opponent->MIN; ?></dd>
    <br>
    <dt>FGM</dt>
    <dd><?= $stat_basket_game_opponent->FGM; ?></dd>
    <br>
    <dt>FGA</dt>
    <dd><?= $stat_basket_game_opponent->FGA; ?></dd>
    <br>
    <dt>TPM</dt>
    <dd><?= $stat_basket_game_opponent->TPM; ?></dd>
    <br>
    <dt>TPA</dt>
    <dd><?= $stat_basket_game_opponent->TPA; ?></dd>
    <br>
    <dt>FTM</dt>
    <dd><?= $stat_basket_game_opponent->FTM; ?></dd>
    <br>
    <dt>FTA</dt>
    <dd><?= $stat_basket_game_opponent->FTA; ?></dd>
    <br>
    <dt>ORB</dt>
    <dd><?= $stat_basket_game_opponent->ORB; ?></dd>
    <br>
    <dt>DRB</dt>
    <dd><?= $stat_basket_game_opponent->DRB; ?></dd>
    <br>
    <dt>RB</dt>
    <dd><?= $stat_basket_game_opponent->RB; ?></dd>
    <br>
    <dt>AST</dt>
    <dd><?= $stat_basket_game_opponent->AST; ?></dd>
    <br>
    <dt>STL</dt>
    <dd><?= $stat_basket_game_opponent->STL; ?></dd>
    <br>
    <dt>BS</dt>
    <dd><?= $stat_basket_game_opponent->BS; ?></dd>
    <br>
    <dt>BD</dt>
    <dd><?= $stat_basket_game_opponent->BD; ?></dd>
    <br>
    <dt>TRN</dt>
    <dd><?= $stat_basket_game_opponent->TRN; ?></dd>
    <br>
    <dt>PF</dt>
    <dd><?= $stat_basket_game_opponent->PF; ?></dd>
    <br>
    <dt>TF</dt>
    <dd><?= $stat_basket_game_opponent->TF; ?></dd>
    <br>
    <dt>FD</dt>
    <dd><?= $stat_basket_game_opponent->FD; ?></dd>
    <br>
    <dt>PTS</dt>
    <dd><?= $stat_basket_game_opponent->PTS; ?></dd>
    <br>
</dl>

<div class="btn-group">
    <?= Html::anchor('admin/stat/basket/game/opponent/edit/'.$stat_basket_game_opponent->id, 'Edit', ['class' => 'btn btn-warning']); ?>
    <?= Html::anchor('admin/stat/basket/game/opponent', 'Back', ['class' => 'btn btn-default']); ?>
</div>
