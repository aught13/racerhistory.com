<h2>Viewing <span class='muted'>#<?php echo $site->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $site->id; ?></p>
<p>
	<strong>Place id:</strong>
	<?php echo $site->place_id; ?></p>
<p>
	<strong>Site name:</strong>
	<?php echo $site->site_name; ?></p>
<p>
	<strong>Capacity:</strong>
	<?php echo $site->capacity; ?></p>
<p>
	<strong>Site image:</strong>
	<?php echo $site->site_image; ?></p>
<p>
	<strong>Site info:</strong>
	<?php echo $site->site_info; ?></p>

<?php echo Html::anchor('site/edit/'.$site->id, 'Edit'); ?> |
<?php echo Html::anchor('site', 'Back'); ?>