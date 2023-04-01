<h2>Listing Users_roles</h2>
<br>

<?php if ($users_roles): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Filter</th>
					<th>User id</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($users_roles as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->name; ?></td>
						<td><?php echo $item->filter; ?></td>
						<td><?php echo $item->user_id; ?></td>

						<td>
							<?php echo Html::anchor('admin/users/role/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/users/role/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/users/role/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Users_roles.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/users/role/create', 'Add new Users role', array('class' => 'btn btn-success')); ?>
</p>
