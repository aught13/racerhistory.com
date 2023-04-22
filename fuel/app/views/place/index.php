<h2>Listing <span class='muted'>Places</span></h2>
<br>
<?php if ($places): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Place name</th>
			<th>Place state</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($places as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->place_name; ?></td>
			<td><?php echo $item->place_state; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('place/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('place/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('place/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Places.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('place/create', 'Add new Place', array('class' => 'btn btn-success')); ?>

</p>
