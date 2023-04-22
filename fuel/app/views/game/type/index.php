<h2>Listing <span class='muted'>Game_types</span></h2>
<br>
<?php if ($game_types): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Game type name</th>
			<th>Post</th>
			<th>Conf</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($game_types as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->game_type_name; ?></td>
			<td><?php echo $item->post; ?></td>
			<td><?php echo $item->conf; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('game/type/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('game/type/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('game/type/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Game_types.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('game/type/create', 'Add new Game type', array('class' => 'btn btn-success')); ?>

</p>
