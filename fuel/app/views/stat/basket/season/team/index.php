<h2>Listing <span class='muted'>Stat_basket_season_teams</span></h2>
<br>
<?php if ($stat_basket_season_teams): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Team season id</th>
			<th>GP</th>
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
			<th>TRN</th>
			<th>PF</th>
			<th>TF</th>
			<th>PTS</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($stat_basket_season_teams as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->team_season_id; ?></td>
			<td><?php echo $item->GP; ?></td>
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
			<td><?php echo $item->TRN; ?></td>
			<td><?php echo $item->PF; ?></td>
			<td><?php echo $item->TF; ?></td>
			<td><?php echo $item->PTS; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('stat/basket/season/team/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('stat/basket/season/team/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('stat/basket/season/team/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Stat_basket_season_teams.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('stat/basket/season/team/create', 'Add new Stat basket season team', array('class' => 'btn btn-success')); ?>

</p>
