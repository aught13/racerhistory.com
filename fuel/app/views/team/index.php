<h2>Listing <span class='muted'>Teams</span></h2>
<br>
<?php if ($teams): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Sport id</th>
			<th>Team name</th>
			<th>Team description</th>
			<th>Abbr</th>
			<th>Gender</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($teams as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->sport_id; ?></td>
			<td><?php echo $item->team_name; ?></td>
			<td><?php echo $item->team_description; ?></td>
			<td><?php echo $item->abbr; ?></td>
			<td><?php echo $item->gender; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('team/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('team/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('team/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Teams.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('team/create', 'Add new Team', array('class' => 'btn btn-success')); ?>

</p>
