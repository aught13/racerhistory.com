<h2>Listing Users_metadata</h2>
<br>

<?php if ($users_metadata): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Parent id</th>
					<th>Key</th>
					<th>Value</th>
					<th>User id</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($users_metadata as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->parent_id; ?></td>
						<td><?php echo $item->key; ?></td>
						<td><?php echo $item->value; ?></td>
						<td><?php echo $item->user_id; ?></td>

						<td>
							<?php echo Html::anchor('admin/users/metadatum/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/users/metadatum/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/users/metadatum/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Users_metadata.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/users/metadatum/create', 'Add new Users metadatum', array('class' => 'btn btn-success')); ?>
</p>
