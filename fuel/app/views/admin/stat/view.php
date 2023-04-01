<h2>Viewing #<?= $stat->id; ?></h2>
<br>

<dl class="dl-horizontal">
  
    <dt>Sport</dt>
    <dd><?= $stat->sport->sport_name; ?></dd>
    <br>
    <dt>Stat name</dt>
    <dd><?= $stat->stat_name; ?></dd>
    <br>
    <dt>Stat route</dt>
    <dd><?= $stat->stat_table; ?></dd>
    <br>
</dl>

<div class="btn-group">
    <?= Html::anchor('admin/stat/edit/'.$stat->id, 'Edit', ['class' => 'btn btn-warning']); ?>
    <?= Html::anchor('admin/stat', 'Back', ['class' => 'btn btn-default']); ?>
</div>
