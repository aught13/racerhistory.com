<?php
/**
 * /app/views/admin/team/season/index
 * 
 * Team season list
 *
 */
?>
<h2>Seasons</h2>
<p>
    <?= Html::anchor('admin/team/season/create', 'Add new Team season', ['class' => 'btn btn-success']); ?>
</p>
<?php if ($team_seasons): ?>
    <div class="table_container">
        <div class="table-responsive">
            <table id="seasons" class="table table-striped table-bordered compact table-hover nowrap spinner-border">
                <thead>
                    <tr>
                        <th rowspan="2"></th>
                        <th rowspan="2">Team</th>
                        <th rowspan="2">Season</th>
                        <th rowspan="2">Conf</th>                        
                        <th colspan="3" rowspan="1">Overall</th>
                        <th colspan="3" rowspan="1">Conference</th>
                        <th rowspan="2">Conf finish</th>
                        <th rowspan="2">Conf Tourn finish</th>
                        <th rowspan="2">Postseason</th>
                        <th rowspan="2"></th>
                    </tr>
                    <tr>
                        <th>W</th>
                        <th>L</th>
                        <th>W-L%</th>
                        <th>W</th>
                        <th>L</th>
                        <th>W-L%</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($team_seasons as $item): ?>
                        <tr>
                            <td></td>
                            <td><?= $item->teams->team_name; ?></td>
                            <td>
                                <?=
                                Html::anchor(
                                    'admin/team/season/view/' . $item->id,
                                    $item->semester == 1 ?
                                        $item->seasons->start : ($item->semester
                                        == 2 ?
                                            $item->seasons->start . '-' .
                                            date_format(
                                                DateTime::createFromFormat(
                                                    'Y', $item->seasons->end
                                                ), 'y'
                                            ) : $item->seasons->end)
                                );
                                ?>
                            </td>
                            <td><?= $item->league_abbr ?? ''; ?></td>
                            <td><?= $records[$item->id]['w']; ?></td>
                            <td><?= $records[$item->id]['l']; ?></td>
                            <td>
                                <?=
                                intval($records[$item->id]['w']) +
                                intval($records[$item->id]['l']) == 0 ?
                                    '' : number_format(
                                        (float)
                                        (intval($records[$item->id]['w']) /
                                        (intval($records[$item->id]['w']) +
                                        intval($records[$item->id]['l'])))
                                        , 3
                                );
                                ?>
                            </td>
                            <td><?= $records[$item->id]['cw']; ?></td>
                            <td><?= $records[$item->id]['cl']; ?></td>
                            <td>
                                <?=
                                intval($records[$item->id]['cw']) +
                                intval($records[$item->id]['cl']) == 0 ?
                                    '' : number_format(
                                        (float)
                                        (intval($records[$item->id]['cw']) /
                                        (intval($records[$item->id]['cw']) +
                                        intval($records[$item->id]['cl'])))
                                        , 3
                                );
                                ?></td>
                            <td><?= $item->league_finish; ?></td>
                            <td><?= $item->league_torunament_finish; ?></td>
                            <td><?= $item->last_post_game; ?></td>
                            <td>
                                <?= Html::anchor('admin/team/season/view/' . $item->id, 'View'); ?> |
                                <?= Html::anchor('admin/team/season/edit/' . $item->id, 'Edit'); ?> |
                                <?= Html::anchor('admin/team/season/delete/' . $item->id, 'Delete', ['onclick' => "return confirm('Are you sure?')"]); ?>
                            </td>
                        </tr>
    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
    <p>No Team Seasons.</p>
<?php endif; ?>
<script>
$(document).ready(function() {
    var h = $('#seasons').removeClass('spinner-border');
    var t = $('#seasons').DataTable({
        paging: false,
        fixedHeader : {
            headerOffset: 42
           
            },
        buttons: [
            {
                extend: 'searchBuilder',
                text: 'Filter Results'
            }
        ],
        dom: 'RB<t>',
   });
    t.on('order.dt search.dt', function() {
        t.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    h.className += " spinner-border";
    h.className = h.className.replace(" spinner-border", "");
});
</script>
