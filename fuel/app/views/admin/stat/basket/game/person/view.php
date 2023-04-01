<h2>Viewing #<?= $stat_basket_game_person->id; ?></h2>
<br>

<dl class="dl-horizontal">
    <dt>Id</dt>
    <dd><?= $stat_basket_game_person->id; ?></dd>
    <br>
    <dt>Person id</dt>
    <dd><?= $stat_basket_game_person->person_id; ?></dd>
    <br>
    <dt>Game id</dt>
    <dd><?= $stat_basket_game_person->game_id; ?></dd>
    <br>
    <dt>Period</dt>
    <dd><?= $stat_basket_game_person->period; ?></dd>
    <br>
    <dt>GP</dt>
    <dd><?= $stat_basket_game_person->GP; ?></dd>
    <br>
    <dt>GS</dt>
    <dd><?= $stat_basket_game_person->GS; ?></dd>
    <br>
    <dt>MIN</dt>
    <dd><?= $stat_basket_game_person->MIN; ?></dd>
    <br>
    <dt>FGM</dt>
    <dd><?= $stat_basket_game_person->FGM; ?></dd>
    <br>
    <dt>FGA</dt>
    <dd><?= $stat_basket_game_person->FGA; ?></dd>
    <br>
    <dt>TPM</dt>
    <dd><?= $stat_basket_game_person->TPM; ?></dd>
    <br>
    <dt>TPA</dt>
    <dd><?= $stat_basket_game_person->TPA; ?></dd>
    <br>
    <dt>FTM</dt>
    <dd><?= $stat_basket_game_person->FTM; ?></dd>
    <br>
    <dt>FTA</dt>
    <dd><?= $stat_basket_game_person->FTA; ?></dd>
    <br>
    <dt>ORB</dt>
    <dd><?= $stat_basket_game_person->ORB; ?></dd>
    <br>
    <dt>DRB</dt>
    <dd><?= $stat_basket_game_person->DRB; ?></dd>
    <br>
    <dt>RB</dt>
    <dd><?= $stat_basket_game_person->RB; ?></dd>
    <br>
    <dt>AST</dt>
    <dd><?= $stat_basket_game_person->AST; ?></dd>
    <br>
    <dt>STL</dt>
    <dd><?= $stat_basket_game_person->STL; ?></dd>
    <br>
    <dt>BS</dt>
    <dd><?= $stat_basket_game_person->BS; ?></dd>
    <br>
    <dt>BD</dt>
    <dd><?= $stat_basket_game_person->BD; ?></dd>
    <br>
    <dt>TRN</dt>
    <dd><?= $stat_basket_game_person->TRN; ?></dd>
    <br>
    <dt>PF</dt>
    <dd><?= $stat_basket_game_person->PF; ?></dd>
    <br>
    <dt>TF</dt>
    <dd><?= $stat_basket_game_person->TF; ?></dd>
    <br>
    <dt>FD</dt>
    <dd><?= $stat_basket_game_person->FD; ?></dd>
    <br>
    <dt>PTS</dt>
    <dd><?= $stat_basket_game_person->PTS; ?></dd>
    <br>
</dl>

<div class="btn-group">
    <?= Html::anchor('admin/stat/basket/game/person/edit/'.$stat_basket_game_person->id, 'Edit', ['class' => 'btn btn-warning']); ?>
    <?= Html::anchor('admin/stat/basket/game/person', 'Back', ['class' => 'btn btn-default']); ?>
</div>
