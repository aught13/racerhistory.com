<h2>Listing Seasons</h2>
<br>

<?php if ($seasons): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Start</th>
					<th>End</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($seasons as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->start; ?></td>
						<td><?php echo $item->end; ?></td>

						<td>
							<?php echo Html::anchor('admin/season/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/season/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/season/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Seasons.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/season/create', 'Add new Season', array('class' => 'btn btn-success')); ?>
</p>
