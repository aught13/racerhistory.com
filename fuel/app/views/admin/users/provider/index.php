<h2>Listing Users_providers</h2>
<br>

<?php if ($users_providers): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Parent id</th>
					<th>Provider</th>
					<th>Uid</th>
					<th>Secret</th>
					<th>Access token</th>
					<th>Expires</th>
					<th>Refresh token</th>
					<th>User id</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($users_providers as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->parent_id; ?></td>
						<td><?php echo $item->provider; ?></td>
						<td><?php echo $item->uid; ?></td>
						<td><?php echo $item->secret; ?></td>
						<td><?php echo $item->access_token; ?></td>
						<td><?php echo $item->expires; ?></td>
						<td><?php echo $item->refresh_token; ?></td>
						<td><?php echo $item->user_id; ?></td>

						<td>
							<?php echo Html::anchor('admin/users/provider/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/users/provider/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/users/provider/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Users_providers.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/users/provider/create', 'Add new Users provider', array('class' => 'btn btn-success')); ?>
</p>
