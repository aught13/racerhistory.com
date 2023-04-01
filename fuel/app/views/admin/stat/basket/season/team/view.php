<h2>Viewing #<?= $stat_basket_season_team->id; ?></h2>
<br>

<dl class="dl-horizontal">
    <dt>Id</dt>
    <dd><?= $stat_basket_season_team->id; ?></dd>
    <br>
    <dt>Team season id</dt>
    <dd><?= $stat_basket_season_team->team_season_id; ?></dd>
    <br>
    <dt>Game id</dt>
    <dd><?= $stat_basket_season_team->game_id; ?></dd>
    <br>
    <dt>GP</dt>
    <dd><?= $stat_basket_season_team->GP; ?></dd>
    <br>
    <dt>MIN</dt>
    <dd><?= $stat_basket_season_team->MIN; ?></dd>
    <br>
    <dt>FGM</dt>
    <dd><?= $stat_basket_season_team->FGM; ?></dd>
    <br>
    <dt>FGA</dt>
    <dd><?= $stat_basket_season_team->FGA; ?></dd>
    <br>
    <dt>TPM</dt>
    <dd><?= $stat_basket_season_team->TPM; ?></dd>
    <br>
    <dt>TPA</dt>
    <dd><?= $stat_basket_season_team->TPA; ?></dd>
    <br>
    <dt>FTM</dt>
    <dd><?= $stat_basket_season_team->FTM; ?></dd>
    <br>
    <dt>FTA</dt>
    <dd><?= $stat_basket_season_team->FTA; ?></dd>
    <br>
    <dt>ORB</dt>
    <dd><?= $stat_basket_season_team->ORB; ?></dd>
    <br>
    <dt>DRB</dt>
    <dd><?= $stat_basket_season_team->DRB; ?></dd>
    <br>
    <dt>RB</dt>
    <dd><?= $stat_basket_season_team->RB; ?></dd>
    <br>
    <dt>AST</dt>
    <dd><?= $stat_basket_season_team->AST; ?></dd>
    <br>
    <dt>STL</dt>
    <dd><?= $stat_basket_season_team->STL; ?></dd>
    <br>
    <dt>BS</dt>
    <dd><?= $stat_basket_season_team->BS; ?></dd>
    <br>
    <dt>TRN</dt>
    <dd><?= $stat_basket_season_team->TRN; ?></dd>
    <br>
    <dt>PF</dt>
    <dd><?= $stat_basket_season_team->PF; ?></dd>
    <br>
    <dt>TF</dt>
    <dd><?= $stat_basket_season_team->TF; ?></dd>
    <br>
    <dt>PTS</dt>
    <dd><?= $stat_basket_season_team->PTS; ?></dd>
    <br>
</dl>

<div class="btn-group">
    <?= Html::anchor('admin/stat/basket/season/team/edit/'.$stat_basket_season_team->id, 'Edit', ['class' => 'btn btn-warning']); ?>
    <?= Html::anchor('admin/stat/basket/season/team', 'Back', ['class' => 'btn btn-default']); ?>
</div>
