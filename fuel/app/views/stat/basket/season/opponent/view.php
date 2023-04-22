<h2>Viewing <span class='muted'>#<?php echo $stat_basket_season_opponent->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $stat_basket_season_opponent->id; ?></p>
<p>
	<strong>Team season id:</strong>
	<?php echo $stat_basket_season_opponent->team_season_id; ?></p>
<p>
	<strong>GP:</strong>
	<?php echo $stat_basket_season_opponent->GP; ?></p>
<p>
	<strong>MIN:</strong>
	<?php echo $stat_basket_season_opponent->MIN; ?></p>
<p>
	<strong>FGM:</strong>
	<?php echo $stat_basket_season_opponent->FGM; ?></p>
<p>
	<strong>FGA:</strong>
	<?php echo $stat_basket_season_opponent->FGA; ?></p>
<p>
	<strong>TPM:</strong>
	<?php echo $stat_basket_season_opponent->TPM; ?></p>
<p>
	<strong>TPA:</strong>
	<?php echo $stat_basket_season_opponent->TPA; ?></p>
<p>
	<strong>FTM:</strong>
	<?php echo $stat_basket_season_opponent->FTM; ?></p>
<p>
	<strong>FTA:</strong>
	<?php echo $stat_basket_season_opponent->FTA; ?></p>
<p>
	<strong>ORB:</strong>
	<?php echo $stat_basket_season_opponent->ORB; ?></p>
<p>
	<strong>DRB:</strong>
	<?php echo $stat_basket_season_opponent->DRB; ?></p>
<p>
	<strong>RB:</strong>
	<?php echo $stat_basket_season_opponent->RB; ?></p>
<p>
	<strong>AST:</strong>
	<?php echo $stat_basket_season_opponent->AST; ?></p>
<p>
	<strong>STL:</strong>
	<?php echo $stat_basket_season_opponent->STL; ?></p>
<p>
	<strong>BS:</strong>
	<?php echo $stat_basket_season_opponent->BS; ?></p>
<p>
	<strong>TRN:</strong>
	<?php echo $stat_basket_season_opponent->TRN; ?></p>
<p>
	<strong>PF:</strong>
	<?php echo $stat_basket_season_opponent->PF; ?></p>
<p>
	<strong>TF:</strong>
	<?php echo $stat_basket_season_opponent->TF; ?></p>
<p>
	<strong>PTS:</strong>
	<?php echo $stat_basket_season_opponent->PTS; ?></p>

<?php echo Html::anchor('stat/basket/season/opponent/edit/'.$stat_basket_season_opponent->id, 'Edit'); ?> |
<?php echo Html::anchor('stat/basket/season/opponent', 'Back'); ?>