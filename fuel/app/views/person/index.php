<h2>People</h2>
<?php if ($people): ?>
<div class="table_container">
    <div class="table-responsive">
        <table id="people" class="table table-striped table-bordered compact table-hover spinner-border">
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
                        <td><?= implode(', ', $teams[$item->id]['teams']); ?></td>
                        <td><?= implode(', ', $teams[$item->id]['years']); ?></td>
                    </tr>
                <?php endforeach; ?>	</tbody>
        </table>
    </div>
</div>
<script>
$(document).ready(function() {
    var h = $('#people').removeClass('spinner-border');
    var t = $('#people').DataTable({
        order: [[2, 'desc']],
        pageLength : 50,
        fixedHeader : {
            headerOffset: 42
           
            },
        buttons: [
            {
                extend: 'searchBuilder',
                text: 'Filter Results'
            }
        ],
        dom: 'RBl<t>p',
   });

    h.className += " spinner-border";
    h.className = h.className.replace(" spinner-border", "");
});
</script>
<?php else: ?>
    <p>No People.</p>

<?php endif; ?>
