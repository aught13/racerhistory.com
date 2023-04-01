<h2>Viewing #<?= $game_type->id; ?></h2>
<br>

<dl class="dl-horizontal">
    <dt>Id</dt>
    <dd><?= $game_type->id; ?></dd>
    <br>
    <dt>Game type name</dt>
    <dd><?= $game_type->game_type_name; ?></dd>
    <br>
    <dt>Post</dt>
    <dd><?= $game_type->post; ?></dd>
    <br>
    <dt>Conf</dt>
    <dd><?= $game_type->conf; ?></dd>
    <br>
</dl>

<div class="btn-group">
    <?= Html::anchor('admin/game/type/edit/' . $game_type->id, 'Edit', array('class' => 'btn btn-warning')); ?>
    <?= Html::anchor('admin/game/type', 'Back', array('class' => 'btn btn-default')); ?>
</div>
