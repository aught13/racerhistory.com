<h2>Listing <span class='muted'>Stat_basket_game_people</span></h2>
<br>
<?php if ($stat_basket_game_people): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Team season roster id</th>
			<th>Game id</th>
			<th>Period</th>
			<th>GP</th>
			<th>GS</th>
			<th>MIN</th>
			<th>FGM</th>
			<th>FGA</th>
			<th>TPM</th>
			<th>TPA</th>
			<th>FTM</th>
			<th>FTA</th>
			<th>ORB</th>
			<th>DRB</th>
			<th>RB</th>
			<th>AST</th>
			<th>STL</th>
			<th>BS</th>
			<th>BD</th>
			<th>TRN</th>
			<th>PF</th>
			<th>TF</th>
			<th>FD</th>
			<th>PTS</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($stat_basket_game_people as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->team_season_roster_id; ?></td>
			<td><?php echo $item->game_id; ?></td>
			<td><?php echo $item->period; ?></td>
			<td><?php echo $item->GP; ?></td>
			<td><?php echo $item->GS; ?></td>
			<td><?php echo $item->MIN; ?></td>
			<td><?php echo $item->FGM; ?></td>
			<td><?php echo $item->FGA; ?></td>
			<td><?php echo $item->TPM; ?></td>
			<td><?php echo $item->TPA; ?></td>
			<td><?php echo $item->FTM; ?></td>
			<td><?php echo $item->FTA; ?></td>
			<td><?php echo $item->ORB; ?></td>
			<td><?php echo $item->DRB; ?></td>
			<td><?php echo $item->RB; ?></td>
			<td><?php echo $item->AST; ?></td>
			<td><?php echo $item->STL; ?></td>
			<td><?php echo $item->BS; ?></td>
			<td><?php echo $item->BD; ?></td>
			<td><?php echo $item->TRN; ?></td>
			<td><?php echo $item->PF; ?></td>
			<td><?php echo $item->TF; ?></td>
			<td><?php echo $item->FD; ?></td>
			<td><?php echo $item->PTS; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('stat/basket/game/person/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('stat/basket/game/person/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('stat/basket/game/person/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Stat_basket_game_people.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('stat/basket/game/person/create', 'Add new Stat basket game person', array('class' => 'btn btn-success')); ?>

</p>
