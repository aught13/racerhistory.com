<h2>Viewing <span class='muted'>#<?php echo $stat_basket_game_box->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $stat_basket_game_box->id; ?></p>
<p>
	<strong>Game id:</strong>
	<?php echo $stat_basket_game_box->game_id; ?></p>
<p>
	<strong>Opponent id:</strong>
	<?php echo $stat_basket_game_box->opponent_id; ?></p>
<p>
	<strong>Period:</strong>
	<?php echo $stat_basket_game_box->period; ?></p>
<p>
	<strong>FGM:</strong>
	<?php echo $stat_basket_game_box->FGM; ?></p>
<p>
	<strong>FGA:</strong>
	<?php echo $stat_basket_game_box->FGA; ?></p>
<p>
	<strong>TPM:</strong>
	<?php echo $stat_basket_game_box->TPM; ?></p>
<p>
	<strong>TPA:</strong>
	<?php echo $stat_basket_game_box->TPA; ?></p>
<p>
	<strong>FTM:</strong>
	<?php echo $stat_basket_game_box->FTM; ?></p>
<p>
	<strong>FTA:</strong>
	<?php echo $stat_basket_game_box->FTA; ?></p>
<p>
	<strong>ORB:</strong>
	<?php echo $stat_basket_game_box->ORB; ?></p>
<p>
	<strong>DRB:</strong>
	<?php echo $stat_basket_game_box->DRB; ?></p>
<p>
	<strong>RB:</strong>
	<?php echo $stat_basket_game_box->RB; ?></p>
<p>
	<strong>AST:</strong>
	<?php echo $stat_basket_game_box->AST; ?></p>
<p>
	<strong>STL:</strong>
	<?php echo $stat_basket_game_box->STL; ?></p>
<p>
	<strong>BS:</strong>
	<?php echo $stat_basket_game_box->BS; ?></p>
<p>
	<strong>TRN:</strong>
	<?php echo $stat_basket_game_box->TRN; ?></p>
<p>
	<strong>PF:</strong>
	<?php echo $stat_basket_game_box->PF; ?></p>
<p>
	<strong>TF:</strong>
	<?php echo $stat_basket_game_box->TF; ?></p>
<p>
	<strong>PTS:</strong>
	<?php echo $stat_basket_game_box->PTS; ?></p>
<p>
	<strong>PNT:</strong>
	<?php echo $stat_basket_game_box->PNT; ?></p>
<p>
	<strong>OTO:</strong>
	<?php echo $stat_basket_game_box->OTO; ?></p>
<p>
	<strong>SND:</strong>
	<?php echo $stat_basket_game_box->SND; ?></p>
<p>
	<strong>FB:</strong>
	<?php echo $stat_basket_game_box->FB; ?></p>
<p>
	<strong>BN:</strong>
	<?php echo $stat_basket_game_box->BN; ?></p>
<p>
	<strong>TIED:</strong>
	<?php echo $stat_basket_game_box->TIED; ?></p>
<p>
	<strong>LC:</strong>
	<?php echo $stat_basket_game_box->LC; ?></p>

<?php echo Html::anchor('stat/basket/game/box/edit/'.$stat_basket_game_box->id, 'Edit'); ?> |
<?php echo Html::anchor('stat/basket/game/box', 'Back'); ?>