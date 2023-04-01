<h2>Viewing #<?= $stat_basket_season_opponent->id; ?></h2>
<br>

<dl class="dl-horizontal">
    <dt>Id</dt>
    <dd><?= $stat_basket_season_opponent->id; ?></dd>
    <br>
    <dt>Team season id</dt>
    <dd><?= $stat_basket_season_opponent->team_season_id; ?></dd>
    <br>
    <dt>Game id</dt>
    <dd><?= $stat_basket_season_opponent->game_id; ?></dd>
    <br>
    <dt>GP</dt>
    <dd><?= $stat_basket_season_opponent->GP; ?></dd>
    <br>
    <dt>MIN</dt>
    <dd><?= $stat_basket_season_opponent->MIN; ?></dd>
    <br>
    <dt>FGM</dt>
    <dd><?= $stat_basket_season_opponent->FGM; ?></dd>
    <br>
    <dt>FGA</dt>
    <dd><?= $stat_basket_season_opponent->FGA; ?></dd>
    <br>
    <dt>TPM</dt>
    <dd><?= $stat_basket_season_opponent->TPM; ?></dd>
    <br>
    <dt>TPA</dt>
    <dd><?= $stat_basket_season_opponent->TPA; ?></dd>
    <br>
    <dt>FTM</dt>
    <dd><?= $stat_basket_season_opponent->FTM; ?></dd>
    <br>
    <dt>FTA</dt>
    <dd><?= $stat_basket_season_opponent->FTA; ?></dd>
    <br>
    <dt>ORB</dt>
    <dd><?= $stat_basket_season_opponent->ORB; ?></dd>
    <br>
    <dt>DRB</dt>
    <dd><?= $stat_basket_season_opponent->DRB; ?></dd>
    <br>
    <dt>RB</dt>
    <dd><?= $stat_basket_season_opponent->RB; ?></dd>
    <br>
    <dt>AST</dt>
    <dd><?= $stat_basket_season_opponent->AST; ?></dd>
    <br>
    <dt>STL</dt>
    <dd><?= $stat_basket_season_opponent->STL; ?></dd>
    <br>
    <dt>BS</dt>
    <dd><?= $stat_basket_season_opponent->BS; ?></dd>
    <br>
    <dt>TRN</dt>
    <dd><?= $stat_basket_season_opponent->TRN; ?></dd>
    <br>
    <dt>PF</dt>
    <dd><?= $stat_basket_season_opponent->PF; ?></dd>
    <br>
    <dt>TF</dt>
    <dd><?= $stat_basket_season_opponent->TF; ?></dd>
    <br>
    <dt>PTS</dt>
    <dd><?= $stat_basket_season_opponent->PTS; ?></dd>
    <br>
</dl>

<div class="btn-group">
    <?= Html::anchor('admin/stat/basket/season/opponent/edit/'.$stat_basket_season_opponent->id, 'Edit', ['class' => 'btn btn-warning']); ?>
    <?= Html::anchor('admin/stat/basket/season/opponent', 'Back', ['class' => 'btn btn-default']); ?>
</div>
