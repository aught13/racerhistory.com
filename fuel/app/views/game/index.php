<h2>Listing <span class='muted'>Games</span></h2>
<br>
<?php if ($games): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Team season id</th>
			<th>Game date</th>
			<th>Game time</th>
			<th>Game duration</th>
			<th>Game type id</th>
			<th>Opponent id</th>
			<th>Place id</th>
			<th>Site id</th>
			<th>Hrn</th>
			<th>Post</th>
			<th>W</th>
			<th>L</th>
			<th>Pts mur</th>
			<th>Pts opp</th>
			<th>Mur rk</th>
			<th>Opp rk</th>
			<th>Periods</th>
			<th>Ot</th>
			<th>Attendance</th>
			<th>Game preview</th>
			<th>Game recap</th>
			<th>Game notes</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($games as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->team_season_id; ?></td>
			<td><?php echo $item->game_date; ?></td>
			<td><?php echo $item->game_time; ?></td>
			<td><?php echo $item->game_duration; ?></td>
			<td><?php echo $item->game_type_id; ?></td>
			<td><?php echo $item->opponent_id; ?></td>
			<td><?php echo $item->place_id; ?></td>
			<td><?php echo $item->site_id; ?></td>
			<td><?php echo $item->hrn; ?></td>
			<td><?php echo $item->post; ?></td>
			<td><?php echo $item->w; ?></td>
			<td><?php echo $item->l; ?></td>
			<td><?php echo $item->pts_mur; ?></td>
			<td><?php echo $item->pts_opp; ?></td>
			<td><?php echo $item->mur_rk; ?></td>
			<td><?php echo $item->opp_rk; ?></td>
			<td><?php echo $item->periods; ?></td>
			<td><?php echo $item->ot; ?></td>
			<td><?php echo $item->attendance; ?></td>
			<td><?php echo $item->game_preview; ?></td>
			<td><?php echo $item->game_recap; ?></td>
			<td><?php echo $item->game_notes; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('game/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('game/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('game/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Games.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('game/create', 'Add new Game', array('class' => 'btn btn-success')); ?>

</p>
