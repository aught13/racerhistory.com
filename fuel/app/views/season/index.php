<h2>Listing <span class='muted'>Seasons</span></h2>
<br>
<?php if ($seasons): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Start</th>
			<th>End</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($seasons as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->start; ?></td>
			<td><?php echo $item->end; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('season/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('season/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('season/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Seasons.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('season/create', 'Add new Season', array('class' => 'btn btn-success')); ?>

</p>
