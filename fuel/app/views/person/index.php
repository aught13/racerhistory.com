<h2>Listing <span class='muted'>People</span></h2>
<br>
<?php if ($people): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>First</th>
			<th>Last</th>
			<th>Full</th>
			<th>Display</th>
			<th>Birth</th>
			<th>Death</th>
			<th>Person image</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($people as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->first; ?></td>
			<td><?php echo $item->last; ?></td>
			<td><?php echo $item->full; ?></td>
			<td><?php echo $item->display; ?></td>
			<td><?php echo $item->birth; ?></td>
			<td><?php echo $item->death; ?></td>
			<td><?php echo $item->person_image; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('person/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('person/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('person/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No People.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('person/create', 'Add new Person', array('class' => 'btn btn-success')); ?>

</p>
