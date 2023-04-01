<h2>Listing Users_user_roles</h2>
<br>

<?php if ($users_user_roles): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>User id</th>
					<th>Role id</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($users_user_roles as $item): ?>
					<tr>
						<td><?php echo $item->user_id; ?></td>
						<td><?php echo $item->role_id; ?></td>

						<td>
							<?php echo Html::anchor('admin/users/user/role/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/users/user/role/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/users/user/role/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Users_user_roles.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/users/user/role/create', 'Add new Users user role', array('class' => 'btn btn-success')); ?>
</p>
