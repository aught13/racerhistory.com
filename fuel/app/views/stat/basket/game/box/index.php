<h2>Listing <span class='muted'>Stat_basket_game_boxes</span></h2>
<br>
<?php if ($stat_basket_game_boxes): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Game id</th>
			<th>Opponent id</th>
			<th>Period</th>
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
			<th>PNT</th>
			<th>OTO</th>
			<th>SND</th>
			<th>FB</th>
			<th>BN</th>
			<th>TIED</th>
			<th>LC</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($stat_basket_game_boxes as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->game_id; ?></td>
			<td><?php echo $item->opponent_id; ?></td>
			<td><?php echo $item->period; ?></td>
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
			<td><?php echo $item->PNT; ?></td>
			<td><?php echo $item->OTO; ?></td>
			<td><?php echo $item->SND; ?></td>
			<td><?php echo $item->FB; ?></td>
			<td><?php echo $item->BN; ?></td>
			<td><?php echo $item->TIED; ?></td>
			<td><?php echo $item->LC; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('stat/basket/game/box/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('stat/basket/game/box/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('stat/basket/game/box/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Stat_basket_game_boxes.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('stat/basket/game/box/create', 'Add new Stat basket game box', array('class' => 'btn btn-success')); ?>

</p>
