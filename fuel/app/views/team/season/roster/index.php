<h2>Listing <span class='muted'>Team_season_rosters</span></h2>
<br>
<?php if ($team_season_rosters): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Team season id</th>
			<th>Person id</th>
			<th>Roster year</th>
			<th>Roster number</th>
			<th>Roster position</th>
			<th>Roster height</th>
			<th>Roster weight</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($team_season_rosters as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->team_season_id; ?></td>
			<td><?php echo $item->person_id; ?></td>
			<td><?php echo $item->roster_year; ?></td>
			<td><?php echo $item->roster_number; ?></td>
			<td><?php echo $item->roster_position; ?></td>
			<td><?php echo $item->roster_height; ?></td>
			<td><?php echo $item->roster_weight; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('team/season/roster/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('team/season/roster/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('team/season/roster/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Team_season_rosters.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('team/season/roster/create', 'Add new Team season roster', array('class' => 'btn btn-success')); ?>

</p>
