<h2>Viewing #<?= $site->id; ?></h2>
<br>

<dl class="dl-horizontal">
    <dt>Id</dt>
    <dd><?= $site->id; ?></dd>
    <br>
    <dt>Place id</dt>
    <dd><?= $site->places->place_name.', '.$site->places->place_state; ?></dd>
    <br>
    <dt>Site name</dt>
    <dd><?= $site->site_name; ?></dd>
    <br>
    <dt>Capacity</dt>
    <dd><?= $site->capacity; ?></dd>
    <br>
    <dt>Site image</dt>
    <dd><?= $site->site_image; ?></dd>
    <br>
    <dt>Site info</dt>
    <dd><?= $site->site_info; ?></dd>
    <br>
</dl>

<div class="btn-group">
    <?= Html::anchor('admin/site/edit/' . $site->id, 'Edit', array('class' => 'btn btn-warning')); ?>
    <?= Html::anchor('admin/site', 'Back', array('class' => 'btn btn-default')); ?>
</div>
