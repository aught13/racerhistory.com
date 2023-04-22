<h2>Listing <span class='muted'>Stat_basket_game_teams</span></h2>
<br>
<?php if ($stat_basket_game_teams): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Game id</th>
			<th>Opp</th>
			<th>ORB</th>
			<th>DRB</th>
			<th>RB</th>
			<th>TRN</th>
			<th>TF</th>
			<th>PTS</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($stat_basket_game_teams as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->game_id; ?></td>
			<td><?php echo $item->opp; ?></td>
			<td><?php echo $item->ORB; ?></td>
			<td><?php echo $item->DRB; ?></td>
			<td><?php echo $item->RB; ?></td>
			<td><?php echo $item->TRN; ?></td>
			<td><?php echo $item->TF; ?></td>
			<td><?php echo $item->PTS; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('stat/basket/game/team/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('stat/basket/game/team/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('stat/basket/game/team/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Stat_basket_game_teams.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('stat/basket/game/team/create', 'Add new Stat basket game team', array('class' => 'btn btn-success')); ?>

</p>
