<h2>Listing <span class='muted'>Team_seasons</span></h2>
<br>
<?php if ($team_seasons): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Team id</th>
			<th>Season id</th>
			<th>Semester</th>
			<th>League finish</th>
			<th>League torunament finish</th>
			<th>Last post game</th>
			<th>Team season notes</th>
			<th>Team season image</th>
			<th>Team season preview</th>
			<th>Team season recap</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($team_seasons as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->team_id; ?></td>
			<td><?php echo $item->season_id; ?></td>
			<td><?php echo $item->semester; ?></td>
			<td><?php echo $item->league_finish; ?></td>
			<td><?php echo $item->league_torunament_finish; ?></td>
			<td><?php echo $item->last_post_game; ?></td>
			<td><?php echo $item->team_season_notes; ?></td>
			<td><?php echo $item->team_season_image; ?></td>
			<td><?php echo $item->team_season_preview; ?></td>
			<td><?php echo $item->team_season_recap; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('team/season/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('team/season/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('team/season/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Team_seasons.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('team/season/create', 'Add new Team season', array('class' => 'btn btn-success')); ?>

</p>
