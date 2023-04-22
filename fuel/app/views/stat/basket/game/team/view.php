<h2>Viewing <span class='muted'>#<?php echo $stat_basket_game_team->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $stat_basket_game_team->id; ?></p>
<p>
	<strong>Game id:</strong>
	<?php echo $stat_basket_game_team->game_id; ?></p>
<p>
	<strong>Opp:</strong>
	<?php echo $stat_basket_game_team->opp; ?></p>
<p>
	<strong>ORB:</strong>
	<?php echo $stat_basket_game_team->ORB; ?></p>
<p>
	<strong>DRB:</strong>
	<?php echo $stat_basket_game_team->DRB; ?></p>
<p>
	<strong>RB:</strong>
	<?php echo $stat_basket_game_team->RB; ?></p>
<p>
	<strong>TRN:</strong>
	<?php echo $stat_basket_game_team->TRN; ?></p>
<p>
	<strong>TF:</strong>
	<?php echo $stat_basket_game_team->TF; ?></p>
<p>
	<strong>PTS:</strong>
	<?php echo $stat_basket_game_team->PTS; ?></p>

<?php echo Html::anchor('stat/basket/game/team/edit/'.$stat_basket_game_team->id, 'Edit'); ?> |
<?php echo Html::anchor('stat/basket/game/team', 'Back'); ?>