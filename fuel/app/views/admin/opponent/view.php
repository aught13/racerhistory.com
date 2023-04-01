<h2>Viewing <?= $opponent->opponent_name; ?></h2>
<br>

<dl class="dl-horizontal">
    <dt>Place</dt>
    <dd><?= $opponent->places->place_name.', '.$opponent->places->place_state; ?></dd>
    <br>
    <dt>Full Name</dt>
    <dd><?= $opponent->opponent_name; ?></dd>
    <br>
    <dt>Mascot</dt>
    <dd><?= $opponent->opponent_mascot; ?></dd>
    <br>
    <dt>Current Name</dt>
    <dd><?= $opponent->opponent_current; ?></dd>
    <br>
    <dt>Short Name</dt>
    <dd><?= $opponent->opponent_short; ?></dd>
    <br>
    <dt>Abbr</dt>
    <dd><?= $opponent->opponent_abbr; ?></dd>
    <br>
</dl>

<div class="btn-group">
    <?= Html::anchor('admin/opponent/edit/' . $opponent->id, 'Edit', array('class' => 'btn btn-warning')); ?>
    <?= Html::anchor('admin/opponent', 'Back', array('class' => 'btn btn-default')); ?>
</div>
