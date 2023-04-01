<h2>Listing Teams</h2>
<br>

<?php if ($teams): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
                                        <th>Sport</th>
					<th>Team name</th>
					<th>Team description</th>
					<th>Abbr</th>
					<th>Gender</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($teams as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
                                                <td><?php echo $item->sports->sport_name; ?></td>
						<td><?php echo $item->team_name; ?></td>
						<td><?php echo $item->team_description; ?></td>
						<td><?php echo $item->abbr; ?></td>
						<td><?php echo $item->gender; ?></td>

						<td>
							<?php echo Html::anchor('admin/team/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/team/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/team/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Teams.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/team/create', 'Add new Team', array('class' => 'btn btn-success')); ?>
</p>
