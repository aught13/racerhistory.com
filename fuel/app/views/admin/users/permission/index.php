<h2>Listing Users_permissions</h2>
<br>

<?php if ($users_permissions): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Area</th>
					<th>Permission</th>
					<th>Description</th>
					<th>Actions</th>
					<th>User id</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($users_permissions as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->area; ?></td>
						<td><?php echo $item->permission; ?></td>
						<td><?php echo $item->description; ?></td>
						<td><?php echo $item->actions; ?></td>
						<td><?php echo $item->user_id; ?></td>

						<td>
							<?php echo Html::anchor('admin/users/permission/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/users/permission/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/users/permission/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Users_permissions.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/users/permission/create', 'Add new Users permission', array('class' => 'btn btn-success')); ?>
</p>
