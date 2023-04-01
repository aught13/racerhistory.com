<h2>Listing Users_groups</h2>
<br>

<?php if ($users_groups): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>User id</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($users_groups as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->name; ?></td>
						<td><?php echo $item->user_id; ?></td>

						<td>
							<?php echo Html::anchor('admin/users/group/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/users/group/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/users/group/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Users_groups.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/users/group/create', 'Add new Users group', array('class' => 'btn btn-success')); ?>
</p>
