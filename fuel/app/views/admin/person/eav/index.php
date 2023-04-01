<h2>Listing Person_eavs</h2>
<br>

<?php if ($person_eavs): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Parent id</th>
					<th>Key</th>
					<th>Value</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($person_eavs as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->parent_id; ?></td>
						<td><?php echo $item->key; ?></td>
						<td><?php echo $item->value; ?></td>

						<td>
							<?php echo Html::anchor('admin/person/eav/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/person/eav/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/person/eav/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Person_eavs.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/person/eav/create', 'Add new Person eav', array('class' => 'btn btn-success')); ?>
</p>
