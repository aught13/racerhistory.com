<h2>Viewing <span class='muted'>#<?php echo $game->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $game->id; ?></p>
<p>
	<strong>Team season id:</strong>
	<?php echo $game->team_season_id; ?></p>
<p>
	<strong>Game date:</strong>
	<?php echo $game->game_date; ?></p>
<p>
	<strong>Game time:</strong>
	<?php echo $game->game_time; ?></p>
<p>
	<strong>Game duration:</strong>
	<?php echo $game->game_duration; ?></p>
<p>
	<strong>Game type id:</strong>
	<?php echo $game->game_type_id; ?></p>
<p>
	<strong>Opponent id:</strong>
	<?php echo $game->opponent_id; ?></p>
<p>
	<strong>Place id:</strong>
	<?php echo $game->place_id; ?></p>
<p>
	<strong>Site id:</strong>
	<?php echo $game->site_id; ?></p>
<p>
	<strong>Hrn:</strong>
	<?php echo $game->hrn; ?></p>
<p>
	<strong>Post:</strong>
	<?php echo $game->post; ?></p>
<p>
	<strong>W:</strong>
	<?php echo $game->w; ?></p>
<p>
	<strong>L:</strong>
	<?php echo $game->l; ?></p>
<p>
	<strong>Pts mur:</strong>
	<?php echo $game->pts_mur; ?></p>
<p>
	<strong>Pts opp:</strong>
	<?php echo $game->pts_opp; ?></p>
<p>
	<strong>Mur rk:</strong>
	<?php echo $game->mur_rk; ?></p>
<p>
	<strong>Opp rk:</strong>
	<?php echo $game->opp_rk; ?></p>
<p>
	<strong>Periods:</strong>
	<?php echo $game->periods; ?></p>
<p>
	<strong>Ot:</strong>
	<?php echo $game->ot; ?></p>
<p>
	<strong>Attendance:</strong>
	<?php echo $game->attendance; ?></p>
<p>
	<strong>Game preview:</strong>
	<?php echo $game->game_preview; ?></p>
<p>
	<strong>Game recap:</strong>
	<?php echo $game->game_recap; ?></p>
<p>
	<strong>Game notes:</strong>
	<?php echo $game->game_notes; ?></p>

<?php echo Html::anchor('game/edit/'.$game->id, 'Edit'); ?> |
<?php echo Html::anchor('game', 'Back'); ?>