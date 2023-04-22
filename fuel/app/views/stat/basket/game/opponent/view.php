<h2>Viewing <span class='muted'>#<?php echo $stat_basket_game_opponent->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $stat_basket_game_opponent->id; ?></p>
<p>
	<strong>Game id:</strong>
	<?php echo $stat_basket_game_opponent->game_id; ?></p>
<p>
	<strong>Period:</strong>
	<?php echo $stat_basket_game_opponent->period; ?></p>
<p>
	<strong>Name:</strong>
	<?php echo $stat_basket_game_opponent->name; ?></p>
<p>
	<strong>Jersey:</strong>
	<?php echo $stat_basket_game_opponent->jersey; ?></p>
<p>
	<strong>Position:</strong>
	<?php echo $stat_basket_game_opponent->position; ?></p>
<p>
	<strong>GP:</strong>
	<?php echo $stat_basket_game_opponent->GP; ?></p>
<p>
	<strong>GS:</strong>
	<?php echo $stat_basket_game_opponent->GS; ?></p>
<p>
	<strong>MIN:</strong>
	<?php echo $stat_basket_game_opponent->MIN; ?></p>
<p>
	<strong>FGM:</strong>
	<?php echo $stat_basket_game_opponent->FGM; ?></p>
<p>
	<strong>FGA:</strong>
	<?php echo $stat_basket_game_opponent->FGA; ?></p>
<p>
	<strong>TPM:</strong>
	<?php echo $stat_basket_game_opponent->TPM; ?></p>
<p>
	<strong>TPA:</strong>
	<?php echo $stat_basket_game_opponent->TPA; ?></p>
<p>
	<strong>FTM:</strong>
	<?php echo $stat_basket_game_opponent->FTM; ?></p>
<p>
	<strong>FTA:</strong>
	<?php echo $stat_basket_game_opponent->FTA; ?></p>
<p>
	<strong>ORB:</strong>
	<?php echo $stat_basket_game_opponent->ORB; ?></p>
<p>
	<strong>DRB:</strong>
	<?php echo $stat_basket_game_opponent->DRB; ?></p>
<p>
	<strong>RB:</strong>
	<?php echo $stat_basket_game_opponent->RB; ?></p>
<p>
	<strong>AST:</strong>
	<?php echo $stat_basket_game_opponent->AST; ?></p>
<p>
	<strong>STL:</strong>
	<?php echo $stat_basket_game_opponent->STL; ?></p>
<p>
	<strong>BS:</strong>
	<?php echo $stat_basket_game_opponent->BS; ?></p>
<p>
	<strong>BD:</strong>
	<?php echo $stat_basket_game_opponent->BD; ?></p>
<p>
	<strong>TRN:</strong>
	<?php echo $stat_basket_game_opponent->TRN; ?></p>
<p>
	<strong>PF:</strong>
	<?php echo $stat_basket_game_opponent->PF; ?></p>
<p>
	<strong>TF:</strong>
	<?php echo $stat_basket_game_opponent->TF; ?></p>
<p>
	<strong>FD:</strong>
	<?php echo $stat_basket_game_opponent->FD; ?></p>
<p>
	<strong>PTS:</strong>
	<?php echo $stat_basket_game_opponent->PTS; ?></p>

<?php echo Html::anchor('stat/basket/game/opponent/edit/'.$stat_basket_game_opponent->id, 'Edit'); ?> |
<?php echo Html::anchor('stat/basket/game/opponent', 'Back'); ?>