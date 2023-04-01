<h2>Listing Users_sessions</h2>
<br>

<?php if ($users_sessions): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Client id</th>
					<th>Redirect uri</th>
					<th>Type id</th>
					<th>Type</th>
					<th>Code</th>
					<th>Access token</th>
					<th>Stage</th>
					<th>First requested</th>
					<th>Last updated</th>
					<th>Limited access</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($users_sessions as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->client_id; ?></td>
						<td><?php echo $item->redirect_uri; ?></td>
						<td><?php echo $item->type_id; ?></td>
						<td><?php echo $item->type; ?></td>
						<td><?php echo $item->code; ?></td>
						<td><?php echo $item->access_token; ?></td>
						<td><?php echo $item->stage; ?></td>
						<td><?php echo $item->first_requested; ?></td>
						<td><?php echo $item->last_updated; ?></td>
						<td><?php echo $item->limited_access; ?></td>

						<td>
							<?php echo Html::anchor('admin/users/session/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/users/session/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/users/session/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Users_sessions.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/users/session/create', 'Add new Users session', array('class' => 'btn btn-success')); ?>
</p>
