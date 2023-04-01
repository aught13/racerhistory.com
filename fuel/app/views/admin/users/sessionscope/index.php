<h2>Listing Users_sessionscopes</h2>
<br>

<?php if ($users_sessionscopes): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Session id</th>
					<th>Access token</th>
					<th>Scope</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($users_sessionscopes as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->session_id; ?></td>
						<td><?php echo $item->access_token; ?></td>
						<td><?php echo $item->scope; ?></td>

						<td>
							<?php echo Html::anchor('admin/users/sessionscope/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/users/sessionscope/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/users/sessionscope/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Users_sessionscopes.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/users/sessionscope/create', 'Add new Users sessionscope', array('class' => 'btn btn-success')); ?>
</p>
