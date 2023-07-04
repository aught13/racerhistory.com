<h2>Listing <span class='muted'>People</span></h2>
<br>
<?php if ($people): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Teams</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($people as $item): ?>		
                <tr>
                    <td><?= Html::anchor('person/view/' . $item->id, $item->display); ?></td>
                    <td><?= implode(',', $teams[$item->id]['teams']); ?></td>
                    <td><?= $teams[$item->id]['seasons']; ?></td>
                </tr>
            <?php endforeach; ?>	</tbody>
    </table>

<?php else: ?>
    <p>No People.</p>

<?php endif; ?>
