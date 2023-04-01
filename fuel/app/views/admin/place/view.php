<h2>Viewing #<?= $place->id; ?></h2>
<br>

<dl class="dl-horizontal">
    <dt>Id</dt>
    <dd><?= $place->id; ?></dd>
    <br>
    <dt>Place name</dt>
    <dd><?= $place->place_name; ?></dd>
    <br>
    <dt>Place state</dt>
    <dd><?= $place->place_state; ?></dd>
    <br>
</dl>

<div class="btn-group">
    <?= Html::anchor('admin/place/edit/' . $place->id, 'Edit', array('class' => 'btn btn-warning')); ?>
    <?= Html::anchor('admin/place', 'Back', array('class' => 'btn btn-default')); ?>
</div>
<!-- Sites -->
<h2>Listing Sites</h2>
<br>

<?php if ($place->sites): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Site name</th>
                    <th>Capacity</th>
                    <th>Site image</th>
                    <th>Site info</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($place->sites as $item): ?>
                    <tr>
                        <td><?= $item->site_name; ?></td>
                        <td><?= $item->capacity; ?></td>
                        <td><?= $item->site_image; ?></td>
                        <td><?= $item->site_info; ?></td>

                        <td>
                            <?= Html::anchor('admin/site/view/' . $item->id, 'View'); ?> |
                            <?= Html::anchor('admin/site/edit/' . $item->id, 'Edit'); ?> |
                            <?= Html::anchor('admin/site/delete/' . $item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php else: ?>
    <p>No Sites.</p>
<?php endif; ?>

<p>
    <?= Html::anchor('admin/site/create', 'Add new Site', array('class' => 'btn btn-success')); ?>
</p>