<h2>Viewing #<?= $sport->id; ?></h2>
<br>

<dl class="dl-horizontal">
    <dt>Id</dt>
    <dd><?= $sport->id; ?></dd>
    <br>
    <dt>Sport name</dt>
    <dd><?= $sport->sport_name; ?></dd>
    <br>
</dl>

<div class="btn-group">
    <?= Html::anchor('admin/sport/edit/'.$sport->id, 'Edit', ['class' => 'btn btn-warning']); ?>
    <?= Html::anchor('admin/sport', 'Back', ['class' => 'btn btn-default']); ?>
</div>
