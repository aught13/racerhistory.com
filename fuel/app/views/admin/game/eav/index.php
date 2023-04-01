<h2>Listing Game_eavs</h2>
<br>

<?php if ($game_eavs): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Game id</th>
					<th>Key</th>
					<th>Value</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($game_eavs as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->game_id; ?></td>
						<td><?php echo $item->key; ?></td>
						<td><?php echo $item->value; ?></td>

						<td>
							<?php echo Html::anchor('admin/game/eav/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/game/eav/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/game/eav/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Game_eavs.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/game/eav/create', 'Add new Game eav', array('class' => 'btn btn-success')); ?>
</p>
