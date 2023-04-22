<h2>Listing <span class='muted'>Opponents</span></h2>
<br>
<?php if ($opponents): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Opponent name</th>
			<th>Opponent mascot</th>
			<th>Opponent current</th>
			<th>Opponent short</th>
			<th>Opponent abbr</th>
			<th>Place id</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($opponents as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->opponent_name; ?></td>
			<td><?php echo $item->opponent_mascot; ?></td>
			<td><?php echo $item->opponent_current; ?></td>
			<td><?php echo $item->opponent_short; ?></td>
			<td><?php echo $item->opponent_abbr; ?></td>
			<td><?php echo $item->place_id; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('opponent/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('opponent/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('opponent/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Opponents.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('opponent/create', 'Add new Opponent', array('class' => 'btn btn-success')); ?>

</p>
