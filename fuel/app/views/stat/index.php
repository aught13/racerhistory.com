<h2>Listing <span class='muted'>Stats</span></h2>
<br>
<?php if ($stats): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Sport id</th>
			<th>Stat name</th>
			<th>Stat table</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($stats as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->sport_id; ?></td>
			<td><?php echo $item->stat_name; ?></td>
			<td><?php echo $item->stat_table; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('stat/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('stat/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('stat/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Stats.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('stat/create', 'Add new Stat', array('class' => 'btn btn-success')); ?>

</p>
