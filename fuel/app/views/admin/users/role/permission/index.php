<h2>Listing Users_role_permissions</h2>
<br>

<?php if ($users_role_permissions): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Role id</th>
					<th>Perms id</th>
					<th>Actions</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($users_role_permissions as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->role_id; ?></td>
						<td><?php echo $item->perms_id; ?></td>
						<td><?php echo $item->actions; ?></td>

						<td>
							<?php echo Html::anchor('admin/users/role/permission/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/users/role/permission/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/users/role/permission/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Users_role_permissions.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/users/role/permission/create', 'Add new Users role permission', array('class' => 'btn btn-success')); ?>
</p>
