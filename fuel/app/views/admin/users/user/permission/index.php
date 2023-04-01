<h2>Listing Users_user_permissions</h2>
<br>

<?php if ($users_user_permissions): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>User id</th>
					<th>Perms id</th>
					<th>Actions</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($users_user_permissions as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->user_id; ?></td>
						<td><?php echo $item->perms_id; ?></td>
						<td><?php echo $item->actions; ?></td>

						<td>
							<?php echo Html::anchor('admin/users/user/permission/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/users/user/permission/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/users/user/permission/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Users_user_permissions.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/users/user/permission/create', 'Add new Users user permission', array('class' => 'btn btn-success')); ?>
</p>
