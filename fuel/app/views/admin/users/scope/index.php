<h2>Listing Users_scopes</h2>
<br>

<?php if ($users_scopes): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Scope</th>
					<th>Name</th>
					<th>Description</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($users_scopes as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->scope; ?></td>
						<td><?php echo $item->name; ?></td>
						<td><?php echo $item->description; ?></td>

						<td>
							<?php echo Html::anchor('admin/users/scope/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/users/scope/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/users/scope/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Users_scopes.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/users/scope/create', 'Add new Users scope', array('class' => 'btn btn-success')); ?>
</p>
