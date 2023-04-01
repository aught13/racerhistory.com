
<?php if ($users): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>User Id</th>
					<th>Username</th>
                                        <th>Full Name</th>
					<th>Group</th>
					<th>Email</th>
					<th>Last login</th>
					<th>Previous login</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($users as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->username; ?></td>
                                                <td><?php echo isset($item->fullname) ? $item->fullname : ''; ?></td>
						<td><?php echo $item->group_id; ?> - <?php echo $item->group->name ?></td>
						<td><?php echo $item->email; ?></td>
						<td><?php echo $item->last_login; ?></td>
						<td><?php echo $item->previous_login; ?></td>

						<td>
							<?php echo Html::anchor('admin/user/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/user/edit/'.$item->id, 'Edit'); ?> |
                                                        <?php echo Html::anchor('admin/user/password/'.$item->id, 'Change Password'); ?> |
							<?php echo Html::anchor('admin/user/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Users.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/user/register', 'Add new User', array('class' => 'btn btn-success')); ?>
</p>
