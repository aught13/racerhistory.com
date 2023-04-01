<h2>Listing Users_group_roles</h2>
<br>

<?php if ($users_group_roles): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Group id</th>
					<th>Role id</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($users_group_roles as $item): ?>
					<tr>
						<td><?php echo $item->group_id; ?></td>
						<td><?php echo $item->role_id; ?></td>

						<td>
							<?php echo Html::anchor('admin/users/group/role/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/users/group/role/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/users/group/role/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Users_group_roles.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/users/group/role/create', 'Add new Users group role', array('class' => 'btn btn-success')); ?>
</p>
