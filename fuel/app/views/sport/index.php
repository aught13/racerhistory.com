<h2>Listing <span class='muted'>Sports</span></h2>
<br>
<?php if ($sports): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Sport name</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($sports as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->sport_name; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('sport/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('sport/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('sport/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Sports.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('sport/create', 'Add new Sport', array('class' => 'btn btn-success')); ?>

</p>
